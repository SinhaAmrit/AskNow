<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mckenziearts\Notify\emotify;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CreateContactRequest;

class ContactController extends Controller
{
	public function store(CreateContactRequest $request)
	{
		$contact = DB::table('contacts')->insert([
			'name' => $request->name,
			'email' => $request->email,
			'data' => $request->comment,
			"created_at" =>  \Carbon\Carbon::now(), # new \Datetime()
            "updated_at" => \Carbon\Carbon::now()  # new \Datetime()
		]);
		if($contact){
            drakify('success');
        }
        else{
            drakify('error');
        }
        return redirect()->back();
	}
}
