<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Redirect;
use View;
use Illuminate\Http\Request;


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
        return view::make('admin/home',[
	        'datas' => $getAll,
        ]);
    }

	public function create()
	{
		return View::make('admin.create');
	}
	public function store(Request $request)
	{
		//$newUser = new User();
		User()::create([
		'name' => $request->input('username'),
		'username' => $request->input('username'),
		'email' => $request->input('email'),
		'password' => bcrypt($request->input('password')),
		'isAdmin' => 0,
		]);
		return Redirect::route('admin.index');
	}

	public function edit($id)
	{
		$getOne = User::findOrFail($id);
		return View::make('admin.edit',[
			'data' => $getOne,
		]);
	}

	public function update($id,Request $request)
	{
		$getOne = User::findOrFail($id);
		$getOne->name = $request->input('name');
		$getOne->username = $request->input('username');
		$getOne->email = $request->input('email');
		//$getOne->create_at->Carbon::now()->toDateTimeString();
		$getOne->save();
		return Redirect::route('admin.index');
	}

	public function destroy($id)
	{
		$deleteTarget = User::whereId($id);
		$deleteTarget -> delete();
		return Redirect::route('admin.index');
	}
}
