<?php

namespace App\Http\Livewire;

use Illuminate\Auth\user;
use Illuminate\Broadcasting\Broadcasters\auth;
use Illuminate\Notifications\markAsRead;
use Illuminate\Notifications\unreadNotifications;
use Livewire\Component;

class NotificationToggle extends Component
{

	public function readNotifications()
	{
		// mark as read
		auth()->user()->unreadNotifications->markAsRead();
	}

	public function render()
	{
		return view('livewire.notification-toggle')
		->with(
			'notifications', auth()->user()->notifications
		);
	}
}
