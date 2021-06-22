<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{

    public function create()
    {
    	return view('discussion.addcategory');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $status = DB::table('category')->insert([ 
        	'category_name' => $request->category,
        	"created_at" =>  \Carbon\Carbon::now(), # new \Datetime()
            "updated_at" => \Carbon\Carbon::now()  # new \Datetime()
            ]);
        if($status){
            drakify('success');
        }
        else{
            drakify('error');
        }
        return redirect()->back(); 
    }
}
