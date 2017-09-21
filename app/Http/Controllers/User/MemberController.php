<?php

namespace App\Http\Controllers\User;

use View;
use Auth;
use Redirect;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	public function index()
	{
		$currentId = User::whereId(\Auth::id())->get();
		return View::make('user.index',[
				'idaaaaaaaaaaaa'=>$currentId,
			]);
	}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
	    return View::make('user.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
	public function update(Request $request, $id)
	{
		$this->validate($request, [
			'name' => 'required|string|max:30',
			'oldpassword' => 'string',
			'password' => 'string|confirmed',

		]);

		$getOne = User::findOrFail($id);
		$getOne->name = $request->input('name');
		/*$getOne->oldpassword = $request->input('oldpassword');
		$getOne->password = $request->input('password');*/
		if ($request->has('oldpassword') && Auth::attempt(['password'=>$request->input('oldpassword')])) {
			$getOne->password = bcrypt($request->input('password'));
		}else{
			return Redirect::route('setting.index')->withErrors(['oldpassword'=>'Password Doesnt Match!']);
		}
		$getOne->save();
		return redirect()->route('product.index');
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
