<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

abstract class BaseMakeFile extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:-';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make command for admin folder';

    protected $folder = '';

    protected $folderPath = '';

    protected $filePath = '';

    protected $successMessage = '';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->files = new Filesystem();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
            $this->fileName = $this->getFileName();
            $this->setFolderPath();
            $this->makeDirIfNotExists();
            $this->makeFile();
        } catch (\Throwable $th) {
            $this->info($th->getMessage());
        }
    }

    public function setFolderPath(): void
    {
        $this->folderPath = app_path($this->folder);
    }

    protected function makeDirIfNotExists(): void
    {
        if (! is_dir($this->folderPath)) {
            mkdir($this->folderPath);
        }
    }

    protected function getFileName(): string
    {
        return ucfirst($this->argument('name'));
    }

    protected function makeFile(): bool
    {
        return $this->generateMarkup();
    }

    protected function generateMarkup(): bool
    {
        $fileFullName = "{$this->fileName}.php";
        $filePath = $this->folderPath.'/'.$fileFullName;
        $content = $this->generateContent();

        return $this->writeFile($filePath, $content, $fileFullName);
    }

    protected function generateContent(): string
    {
        return '';
    }

    protected function writeFile(string $filePath, string $content, string $fileFullName): bool
    {
        if (file_exists($filePath)) {
            $this->error('File exists');

            return false;
        }

        $isSuccess = $this->files->put($filePath, $content);
        if ($isSuccess) {
            $this->info($this->successMessage.': '.$fileFullName);
        }

        return $isSuccess;
    }
}
