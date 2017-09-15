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
	public function show()
	{
		$getAll = User::all();
		return view('admin/home',[
			'datas' => $getAll,
		]);
	}
	public function create()
	{
		$getAll = User::all();
		return view('admin/home',[
			'datas' => $getAll,
		]);
	}
	public function edit()
	{
		$getAll = User::all();
		return view('admin/home',[
			'datas' => $getAll,
		]);
	}

	public function destroy($id)
	{
		$deleteTarget = User::where('id' ,"=","$id");
		$deleteTarget -> delete();
		return redirect('/admin/index');
	}
}
