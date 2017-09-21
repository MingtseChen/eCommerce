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
	    $getAll = User::where('isAdmin','!=','1')->get();
        /*return view::make('admin/home',[
	        'users' => $getAll,
        ]);*/
        return view('admin.home',[
	        'users' => $getAll,
	        'ctrler' => 'user',
        ]);
    }

	public function create()
	{
		return View::make('admin.create',[
			'ctrler' => 'user',
		]);
	}
	public function store(Request $request)
	{
		$this->validate($request,[
			'name' => 'required|string|max:25',
			'username' => 'required|string|max:25|unique:users,username',
			'email' => 'required|string|email|max:255|unique:users,email',
			'password' => 'required|string|min:6|confirmed',
		]);
		//$newUser = new User();
		User::create([
		'name' => $request->input('username'),
		'username' => $request->input('username'),
		'email' => $request->input('email'),
		'password' => bcrypt($request->input('password')),
		'isAdmin' => 0,
		]);
		return redirect()->route('user.index');
	}

	public function edit($id)
	{
		$getOne = User::findOrFail($id);
		return View::make('admin.edit',[
			'data' => $getOne,
			'ctrler' => 'user',
		]);
	}

	public function update($id,Request $request)
	{
		$this->validate($request,[
			'name' => 'required|string|max:25',
			'username' => 'required|string|max:25|unique:users,username,'.$id,
			'email' => 'required|string|email|max:255|unique:users,email,'.$id,
		]);
		$getOne = User::findOrFail($id);
		$getOne->name = $request->input('name');
		$getOne->username = $request->input('username');
		$getOne->email = $request->input('email');
		$getOne->save();
		return redirect()->route('user.index');
	}

	public function destroy($id)
	{
		$deleteTarget = User::whereId($id);
		$deleteTarget -> delete();
		return redirect()->route('user.index');
	}
}
