<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MembersController extends Controller
{
    function index() {
    	  return view('site.member');
    }

		function create() {
    	  return view('site.create-member');
    }
}
