<?php

namespace App\Console\Commands;

class MakeTrait extends BaseMakeFile
{
    protected $signature = 'make:trait {name}';

    protected $description = 'Make repository';

    protected $folder = 'Traits';

    protected $successMessage = 'Create trait success';

    protected function generateContent(): string
    {
        return "<?php\n\nnamespace App\\{$this->folder};\n\nTrait {$this->fileName}\n{\n}\n";
    }
}
