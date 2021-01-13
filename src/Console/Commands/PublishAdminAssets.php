<?php

namespace Resto2web\Core\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class PublishAdminAssets extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'resto2web:publish-admin-assets';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publishes the admin assets (js + css)';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Publishing the assets');
        $this->call('vendor:publish',
            [
                '--provider'=>"Resto2web\Core\CoreServiceProvider",
                '--tag'=>"assets",
                '--force'=>"true"
            ]
        );
        return 0;
    }
}
