<?php

namespace App\Console\Commands;

use App\Jobs\SqsEventsJob;
use Carbon\Carbon;
use Illuminate\Console\Command;

class TestSqsJob extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sqs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $job = new SqsEventsJob('workspace.status.deactivated', [
            'context_id' => '7e4ca824-a9c6-11ec-b909-0242ac120002',
            'context' => [
                'type' => 'Workspace',
                'name' => 'Moj worksapce',
            ],
            'data' => [
                'deactivated_at' => Carbon::now()->toString()
            ]
        ]);
        $job->handle();
        return 0;
    }
}
