<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $getAll = User::all();
        return view('admin/home',[
	        'datas' => $getAll,
        ]);
    }
	public function Create()
	{
		$getAll = User::all();
		return view('admin/home',[
			'datas' => $getAll,
		]);
	}
	public function Edit()
	{
		$getAll = User::all();
		return view('admin/home',[
			'datas' => $getAll,
		]);
	}

	public function Delete($id)
	{
		$deleteTarget = User::where('id' ,"=","$id");
		$deleteTarget -> delete();
		return redirect('admin/index');
	}
}
