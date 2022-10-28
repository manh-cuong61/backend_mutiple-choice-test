<?php

namespace App\Console\Commands;

class MakeService extends BaseMakeFile
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service {name}';

    protected $description = 'Make repository';

    protected $folder = 'Services';

    protected $successMessage = 'Create service success';

    protected function generateContent(): string
    {
        return "<?php\n\nnamespace App\\{$this->folder};\n\nclass {$this->fileName}\n{\n}\n";
    }
}
