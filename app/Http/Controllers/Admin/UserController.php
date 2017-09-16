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
	    $getAll = User::where('id','!=','1')->get();
        return view::make('admin/home',[
	        'users' => $getAll,
        ]);
    }

	public function create()
	{
		return View::make('admin.create');
	}
	public function store(Request $request)
	{
		$this->validate($request,[
			'name' => 'required|string|max:25',
			'username' => 'required|string|max:25|unique:users',
			'email' => 'required|string|email|max:255|unique:users',
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
		return redirect()->route('admin.index');
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
		$this->validate($request,[
			'name' => 'required|string|max:25',
			'username' => 'required|string|max:25|unique:users,username,'.$id,
			'email' => 'required|string|email|max:255|unique:users,email,'.$id,
		]);
		$getOne = User::findOrFail($id);
		$getOne->name = $request->input('name');
		$getOne->username = $request->input('username');
		$getOne->email = $request->input('email');
		/*if(!empty(($request->input('password')))){
			$getOne->password = bcrypt($request->input('password'));
		}*/
		//$getOne->create_at->Carbon::now()->toDateTimeString();
		$getOne->save();
		return redirect()->route('admin.index');
	}

	public function destroy($id)
	{
		$deleteTarget = User::whereId($id);
		$deleteTarget -> delete();
		return redirect()->route('admin.index');
	}
}
