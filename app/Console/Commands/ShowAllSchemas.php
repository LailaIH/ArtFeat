<?php

namespace App\Console\Commands;
use Illuminate\Support\Facades\Schema;

use Illuminate\Console\Command;

class ShowAllSchemas extends Command
{
    protected $signature = 'schema:show-all';
    protected $description = 'Display schema for all tables';

    public function handle()
    {

    }
}
