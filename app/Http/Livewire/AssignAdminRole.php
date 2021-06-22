<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Mckenziearts\Notify\emotify;

class AssignAdminRole extends Component
{
	use WithPagination;

	public $perPage = 10;
	public $search = '';
	public $sortField = 'id';
	public $sortAsc = true;
	public $selected = [];

	public function permitUsers()
	{
		$user = User::withTrashed()->where('id', [$this->selected]);
		$user->restore();
		session()->flash('message', 'User Permitted!');
	}

	public function suspendUsers()
	{
		User::destroy($this->selected);
		session()->flash('message', 'User Suspended');
	}

	public function assignAdminRole()
	{
		if(User::find($this->selected)->role != "ADMIN")
		{
			User::find($this->selected)->update([
				'role' => 'ADMIN'
			]);
			session()->flash('message', 'Assigned Admin Role.');
		}
		elseif (User::find($this->selected)->role === "ADMIN") {
			User::find($this->selected)->update([
				'role' => 'USER'
			]);
			session()->flash('message', 'Admin Role Revoked.');
		}
	}

	public function render()
	{
		return view('livewire.assign-admin-role', [
			'users' => User::search($this->search)
			->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
			->simplePaginate($this->perPage),
		]);
	}
}
