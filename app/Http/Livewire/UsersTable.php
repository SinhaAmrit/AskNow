<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Notifications\notify;
use Livewire\Component;
use Livewire\WithPagination;
use Mckenziearts\Notify\emotify;

class UsersTable extends Component
{
    use WithPagination;

    public $perPage = 10;
    public $search = '';
    public $sortField = 'id';
    public $sortAsc = true;
    public $selected = [];
    
    public function deleteUsers()
    {
        $user = User::withTrashed()->where('id', [$this->selected]);
        $user->forceDelete();
        session()->flash('message', 'User Removed.');
    }

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

    public function render()
    {
        return view('livewire.users-table', [
            'users' => User::search($this->search)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->simplePaginate($this->perPage),
        ]);
    }
}