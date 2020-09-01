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
        if(substr($link, -4) == ".git"){
            $link = substr($link, 0, -4);
        }
        //recuperation des variables
        $part = explode("/", $link);
        $username = $part[3];
        $reponame = $part[4];
        $randInt = bin2hex(random_bytes(4));
        $rand = str_shuffle(str_replace(".", "",$reponame.$username.$randInt));
        echo 'username = '.$username.'<br>';
        echo 'reponame = '.$reponame.'<br>';
        echo 'link = '.$link.'<br>';
        echo 'rand = '.$rand.'<br>';
        echo '<br><br><br>';


        // execute command
        exec('mkdir /var/www/html/gitchecker/public/report/'.$rand.' && cd /var/www/html/gitchecker/public/report/'.$rand.' && git clone '.$link.' && ../../.././vendor/bin/phpstan analyse '.$reponame.' -l 8 --e$        exec('cd /var/www/html/gitchecker/public/report/'.$rand.' && php ../../.././vendor/bin/phpcs '.$reponame.' --report=json > phpcs.json');
        //echo exec('git clone '.$link);
        //exec('./vendor/bin/phpstan analyse '.$username.'/'.$reponame);
        //print output from command
        //$this->comment( implode( PHP_EOL, $output ) );
    }
}
