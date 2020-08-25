<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ExecAnalyser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'execute:analyser {link}';

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
        $link = $this->argument('link');
        // execute command
        exec("sh exakat.sh ".$link, $output);
        // print output from command
        $this->comment( implode( PHP_EOL, $output ) );
    }
}
