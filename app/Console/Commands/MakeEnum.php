<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MakeEnum extends BaseMakeFile
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:enum {name}';

    protected $description = 'Make enum';
    protected $folder = "Enums";
    protected $successMessage = "Create service success";

    protected function generateContent(): string
    {
        return "<?php\n\nnamespace App\Enums;\n\nenum {$this->fileName}\n{\n}\n";
    }
}
