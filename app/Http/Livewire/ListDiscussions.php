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
	public $searchTerm;

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
		$searchTerm = '%'. $this->searchTerm . '%';
		// dd($searchTerm);
		return view('livewire.discussion.list-discussions')
		->with(
			'discussions',
			Discussion::orderBy($this->sortOn, $this->sortDirection)
			->where('title', 'LIKE', $searchTerm)
			->limit($this->loadAmount)
			->with('user')
			->with('replies')
			->get( ['id', 'title', 'category', 'summery', 'created_at', 'slug','user_id', 'reply_id'])
		);
	}
}