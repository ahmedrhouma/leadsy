<?php

namespace App\Listeners;

use App\Providers\RouteServiceProvider;

class LoginListener
{
	public function handle($event)
	{


		//TODO Remove when session data is handled the right way
		//start
		session(
			[
				'language' => 'en',
				'account_id' => auth()->user()->account->id ??  null,
				'user_id' => auth()->id(),
				'profile' => auth()->user()->profile
			]
		);
		//end
	}
}
