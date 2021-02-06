<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LessonTransferNotification extends Mailable
{
	use Queueable, SerializesModels;

	protected $name;


	public function __construct($name)
	{
		$this->name = $name;
	}


	public function build()
	{
		return $this->view('email.lesson_transfer')
			->subject('これは振替メールの送信テストです')
			->with([
				'name' => $this->name,
			]);
	}
}
