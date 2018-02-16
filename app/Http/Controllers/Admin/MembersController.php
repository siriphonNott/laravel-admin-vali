<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Member;

class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //get all
			$obj = Member::all();
			$data['members'] = $obj;
			return view('site.member',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      //load view create
			return view('site.create-member');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
			$obj = new Member();
			$obj->firstname  = $request['firstname'];
			$obj->lastname   = $request['lastname'];
			$obj->position   = $request['position'];
			$obj->office     = $request['office'];
			$obj->age        = $request['age'];
			$obj->start_date = $request['start_date'];
			$obj->salary     = $request['salary'];
			$obj->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

      	$obj = Member::find($id);
				// dd($obj);
				return json_encode($obj);
				//load view to show
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
			$obj = Member::find($id);
			//load view to edit
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
			$obj = Member::find($id);
			$obj->firstname  = $request['firstname'];
			$obj->lastname   = $request['lastname'];
			$obj->position   = $request['position'];
			$obj->office     = $request['office'];
			$obj->age        = $request['age'];
			$obj->start_date = $request['start_date'];
			$obj->salary     = $request['salary'];
			$obj->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
			$obj = Member::find($id);
			$obj->delete();
    }
}
