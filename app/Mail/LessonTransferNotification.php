<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LessonTransferNotification extends Mailable
{
	use Queueable, SerializesModels;

	public function __construct($fullName, $email, $oldLessonDate, $newLessonDate)
	{
		$this->fullName      = $fullName;
		$this->email         = $email;
		$this->oldLessonDate = $oldLessonDate;
		$this->newLessonDate = $newLessonDate;
	}



	public function build()
	{
		return $this->view('email.lesson_transfer')
			->from('mr.suzuki.11@gmail.com')
			->subject('【ウィズ体操クラブ】振替のお知らせ')
			->with([
				'fullName' => $this->fullName,
				'email' => $this->email,
				'oldLessonDate' => $this->oldLessonDate,
				'newLessonDate' => $this->newLessonDate,
			]);
	}
}
