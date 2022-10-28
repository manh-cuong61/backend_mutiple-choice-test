<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MakeRepository extends BaseMakeFile
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:repository {name}';

    protected $description = 'Make repository';

    protected $folder = 'Repositories';

    protected $fileName = '';

    protected $successMessage = 'Create repository success';
    /**
     * The console command description.
     *
     * @var string
     */

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function setFolderPath(): void
    {
        $this->folderPath = app_path($this->folder) . '/' . $this->fileName;
    }

    protected function makeFile(): bool
    {
        return $this->generateMarkupEloquent() && $this->generateMarkupInterface();
    }

    public function generateMarkupEloquent(): bool
    {
        $fileFullName = "{$this->fileName}Repository.php";
        $filePath = $this->folderPath . '/' . $fileFullName;
        $content = "<?php\n\nnamespace App\Repositories\\{$this->fileName};\n\nuse App\Repositories\RepositoryAbstract;\n\nclass {$this->fileName}Repository extends RepositoryAbstract implements {$this->fileName}RepositoryInterface\n{\n}\n";

        return $this->writeFile($filePath, $content, $fileFullName);
    }

    public function generateMarkupInterface(): bool
    {
        $fileFullName = "{$this->fileName}RepositoryInterface.php";
        $filePath = $this->folderPath . '/' . $fileFullName;
        $content = "<?php\n\nnamespace App\Repositories\\{$this->fileName};\n\nuse App\Repositories\RepositoryInterface;\n\ninterface {$this->fileName}RepositoryInterface extends RepositoryInterface\n{\n}\n";

        return $this->writeFile($filePath, $content, $fileFullName);
    }

    public function addRepositoryToProvider(): void
    {
        $repoServiceProviderPath = app_path('Providers/RepositoryServiceProvider.php');
        $fileContent = file_get_contents($repoServiceProviderPath);

        $keyword = 'protected $repositories = [';
        $preIndex = strpos($fileContent, $keyword);

        $postIndex = strpos($fileContent, ']', $preIndex);
        $postFixLength = 1;

        if ($postIndex - $preIndex == strlen($keyword)) {
            $content = "\n\t\t'{$this->fileName}'\n\t]";
        } else {
            $postIndex -= 2;
            $postFixLength += 2;
            $content = ",\n\t\t'{$this->fileName}'\n\t]";
        }
        $newFileContent = substr_replace($fileContent, $content, $postIndex, $postFixLength);

        file_put_contents($repoServiceProviderPath, $newFileContent);
    }
}
