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
    protected $signature = 'execute:analyser {link}{rand}{reponame}';

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
        $rand = $this->argument('rand');
        $reponame = $this->argument('reponame');

        exec('mkdir /var/www/html/gitchecker/public/report/'.$rand.' && cd /var/www/html/gitchecker/public/report/'.$rand.' && git clone '.$link.' && ../../.././vendor/bin/phpstan analyse '.$reponame.' -l 8 --error-format prettyJson > phpstan.json');     
        exec('cd /var/www/html/gitchecker/public/report/'.$rand.' && php ../../.././vendor/bin/phpcs '.$reponame.' --report=json > phpcs.json');
    }
}
