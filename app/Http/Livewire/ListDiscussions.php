<?php

namespace App\Http\Livewire;

use App\Models\Discussion;
use Livewire\Component;

class ListDiscussions extends Component
{

	public $totalRecords;
	public $loadAmount = 12;
	public $sortOn = "created_at";
	public $sortDirection = 'desc';

	public function loadMore()
	{
		$this->loadAmount += 12;
	}

	public function sortOn($field)
	{
		if($this->sortDirection == 'asc')
		{
			$this->sortDirection = "desc";
		}
		else
		{
			$this->sortDirection = 'asc';
		}
		return $this->sortOn = $field;
	}

	public function mount()
	{
		$this->totalRecords = Discussion::count();
	}

	public function render()
	{
		return view('livewire.discussion.list-discussions')
		->with(
			'discussions',
			Discussion::orderBy($this->sortOn, $this->sortDirection)
			->limit($this->loadAmount)
			->get()
		);
	}
}



// class ListDiscussions extends Component
// {

// 	public $page;
// 	public $perPage;

// 	public function mount($page = null, $perPage = null)
// 	{
// 		$this->page = $page ?? 1;
// 		$this->perPage = $perPage ?? 12;
// 	}

//     public function render()
//     {
//     	$discussions = Discussion::orderBy('created_at','desc')->paginate($this->perPage, ['*'], null, $this->page);
//         return view('livewire.discussion.list-discussions', [
//         	'discussions' => $discussions
//         ]);
//     }
// }
