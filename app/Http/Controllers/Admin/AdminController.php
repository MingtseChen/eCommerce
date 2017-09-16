<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Redirect;
use View;
use Illuminate\Http\Request;

class AdminController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$getAll = User::where('id', '!=', '1')->get();
		return view::make('admin/home', [
			'datas' => $getAll,
		])->route('admin/home');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return View::make('admin.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, [
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

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$getOne = User::findOrFail($id);
		return View::make('admin.edit', [
			'data' => $getOne,
		]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function update($id, Request $request)
	{
		$this->validate($request, [
			'name' => 'required|string|max:25',
			'username' => 'required|string|max:25|unique:users',
			'email' => 'required|string|email|max:255|unique:users',
			'password' => 'required|string|min:6|confirmed',
		]);
		$getOne = User::findOrFail($id);
		$getOne->name = $request->input('name');
		$getOne->username = $request->input('username');
		$getOne->email = $request->input('email');
		if (!empty(($request->input('password')))) {
			$getOne->password = bcrypt($request->input('password'));
		}
		//$getOne->create_at->Carbon::now()->toDateTimeString();
		$getOne->save();
		return redirect()->route('admin.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$deleteTarget = User::whereId($id);
		$deleteTarget->delete();
		return redirect()->route('login');
	}
}
