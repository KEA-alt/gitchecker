<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Artisan;

class ExecuteAudit implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var String
     */
    private $link;

    /**
     * @var String
     */
    private $rand;

    /**
     * @var String
     */
    private $reponame;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(String $link, String $rand, String $reponame)
    {
        $this->link = $link;
        $this->rand = $rand;
        $this->reponame = $reponame;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $exitCode = Artisan::call('execute:analyser', [
            'link' => $this->link,
            'rand' => $this->rand,
            'reponame' => $this->reponame
        ]);
    }
}
