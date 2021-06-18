<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use App\Models\Discussion;
use Illuminate\Http\Request;
use Mckenziearts\Notify\emotify;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\CreateDiscussionRequest;

class DiscussionController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'isEmailVerified'])->only('store', 'create');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('discussions');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('discussion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateDiscussionRequest $request)
    {
        $status = auth()->user()->discussions()->create([
            'title' => $request->title,
            'category' => $request->category,
            'summery' => $request->summery,
            'description' => $request->description,
            'slug' => $request->title
        ]);
        if($status){
            drakify('success');
        }
        else{
            drakify('error');
        }
        return redirect()->back(); 
    }

    public function reply(Discussion $discussion, Reply $reply)
    {
        $discussion->forceFill([
            'reply_id' => $reply->id,
        ])->save();
        drakify('success');
        return redirect()->back();
    }
}
