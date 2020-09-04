<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Mail;

class SendMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var String
     */
    private $view;

    /**
     * @var String
     */
    private $title;

    /**
     * @var String
     */
    private $content;

    /**
     * @var array
     */
    private $data;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(String $view, String $title, String $content, array $data)
    {
        $this->view = $view;
        $this->title = $title;
        $this->content = $content;
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $view = $this->view;
        $title = $this->title;
        $content = $this->content;
        $data = $this->data;
        Mail::send($view, ['title' => $title, 'content' => $content], function ($m) use ($data)
        {
            $m->from($data['fromMail'], $data['fromName']);

            $m->subject($data['subject']);

            $m->to($data['toMail']);
        });
    }
}
