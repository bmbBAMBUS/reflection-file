<?php

namespace App\Console\Commands;

use Rawaby88\Portal\Portal;
use Illuminate\Console\Command;

class GenerateServiceTokenCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'auth:generate-service-token {service}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info(Portal::service($this->argument('service')));
    }
}
