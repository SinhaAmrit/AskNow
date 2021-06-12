<?php

namespace App\Http\Livewire;

use App\Models\Discussion;
use Livewire\Component;

class LoadMoreDiscussions extends Component
{

	public $page;
	public $perPage;
	public $isMore = false;

	public function mount($page = null, $perPage = null)
	{
		$this->page = $page ?? 1;
		$this->perPage = $perPage ?? 12;
	}

	public function loadMore()
	{
		$this->page++;
		$this->isMore = true;
	}

	public function render()
	{
		if($this->isMore)
		{
			$discussions = Discussion::paginate($this->perPage, ['*'], null, $this->page);
			return view('livewire.discussion.list-discussions', [
				'discussions' => $discussions
			]);
		}
		return view('livewire.discussion.load-more-discussions');
	}
}
