<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StudentRegister extends Mailable
{
	use Queueable, SerializesModels;

	/**
	 * Create a new message instance.
	 *
	 * @return void
	 */
	public function __construct($fullName, $email, $password, $loginUrl)
	{
		$this->fullName = $fullName;
		$this->email = $email;
		$this->password = $password;
		$this->loginUrl = $loginUrl;
	}

	/**
	 * Build the message.
	 *
	 * @return $this
	 */
	public function build()
	{

		return $this->view('email.student_register')
			->from('mr.suzuki.11@gmail.com')
			->subject('【ウィズ体操クラブ】登録完了のお知らせ')
			->with([
				'fullName' => $this->fullName,
				'email' => $this->email,
				'password' => $this->password,
				'loginUrl' => $this->loginUrl,
			]);
	}
}
