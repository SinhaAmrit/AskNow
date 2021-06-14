<?php

namespace App\Http\Livewire;

use App\Models\Discussion;
use Livewire\Component;

class SearchDiscussion extends Component
{

	public $query;
	public $discussions;
	public $highligtIndex;

	public function resetValues()
	{
		$this->query = "";
		$this->discussions = [];
		$this->highligtIndex = 0;
	}

	public function mount()
	{
		$this->query = "";
		$this->discussions = [];
		$this->highligtIndex = 0;
	}

	public function incrementHighlight()
	{
		if($this->highligtIndex === count($this->discussions) - 1)
		{
			$this->highligtIndex = 0;
			return;
		}
		$this->highligtIndex++;
	}

	public function decrementHighlight()
	{
		if($this->highligtIndex === 0)
		{
			$this->highligtIndex = count($this->discussions) - 1;
			return;
		}
		$this->highligtIndex--;
	}

	public function selectDiscussion()
	{
		$discussion = $this->discussions[$this->highligtIndex] ?? null;
		if($discussion)
		{
			$this->redirect(route('show-discussion', $discussion['slug']));
		}
	}

	public function updatedQuery()
	{
		$this->discussions = Discussion::where('title', 'like', '%' . $this->query . '%')
		->get()->toArray();
	}

    public function render()
    {
        return view('livewire.discussion.search-discussion');
    }
}
// {{-- href="{{ route('show-discussion', $discussion['slug']) }}" --}} 