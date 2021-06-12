<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Discussion;

class CreateDiscussion extends Component
{
	public $state = [];
	// public $title;
	// public $category;
	// public $description;

	public function resetInputFields()
	{
		// $this->title = '';
		// $this->category = '';
		// $this->description = '';
		$this->state = [];
	}

	public function store()
	{
		// $validateData = $this->validate([
		// 	'title' => 'required|min:5|max:50',
		// 	'category' => 'required',
		// 	'description' => 'required|max:191'
		// ]);
		// Discussion::create($validateData);
		dd($this->state);
		session()->flash('feedback','Query Raised Seccessfully.');
		$this->resetInputFields();
	}

	public function render()
	{
		return view('livewire.discussion.create-discussion');
	}

}
