<?php

namespace App\Console\Commands;

use App\Jobs\CsvHandlingJob;
use Illuminate\Console\Command;

class OnlineShopUpdateDBCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'shop:update-db';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Starts a job, inserts csv data to database';

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
        CsvHandlingJob::dispatch();
        return 0;
    }
}
