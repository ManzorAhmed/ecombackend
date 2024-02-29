<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
class MakeContract extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:contract {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make a new Command interface';

    /**
     * Execute the console command.
     */
    public function handle()
    {
    $name = $this->argument('name');

    $contractPath = app_path('Contracts/' . $name . '.php');

    if (File::exists($contractPath)) {
        $this->error('Contract already exists!');
        return;
    }
        File::put($contractPath, '<?php

namespace App\Contracts;

interface ' . $name . '
{
    //
}
');

        $this->info('Contract created successfully: ' . $contractPath);
    }
}
