<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateReplyRequest;
use App\Models\Discussion;
use App\Notifications\NewReplyAdded;
use Illuminate\Http\Request;
use Mckenziearts\Notify\emotify;

class RepliesController extends Controller
{

     /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'isEmailVerified']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateReplyRequest $request, Discussion $discussion)
    {
        auth()->user()->replies()->create([
            'discussion_id' => $discussion->id,
            'content' => $request->content,
        ]);
        $discussion->user->notify(new NewReplyAdded($discussion));
        drakify('success');
        return redirect()->back();
    }

}
