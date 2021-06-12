<?php

namespace App\Http\Livewire;

use App\Models\Discussion;
use Livewire\Component;

class ListDiscussions extends Component
{

	public $page;
	public $perPage;

	public function mount($page = null, $perPage = null)
	{
		$this->page = $page ?? 1;
		$this->perPage = $perPage ?? 12;
	}

    public function render()
    {
    	$discussions = Discussion::orderBy('created_at','desc')->paginate($this->perPage, ['*'], null, $this->page);
        return view('livewire.discussion.list-discussions', [
        	'discussions' => $discussions
        ]);
    }
}
