<?php

namespace App\Http\Controllers\User;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		//
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
	 * @param  \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		if (Cart::whereUserId($request->input('user_id'))->exists()) {
			//$getOne = Cart::findOrFail($id);
			$prd = Cart::whereProductId($request->input('product_id'));
			if ($prd->exists()) {
				$value = Cart::whereUserId($request->input('user_id'))->
				$prd->update(['quantity' => $value]);// = $prd->product_id++;
			}
		}else{
			Cart::create([
				'product_id' => $request->input('product_id'),
				'quantity' => $request->input('quantity'),
				'user_id' => $request->input('user_id'),
			]);
		}

		return redirect()->route('index');
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
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		$getOne = Cart::findOrFail($id);
		if (Cart::where('product', '=', $request->input('product_id'))->exists()) {
			$getOne->product_id = $getOne++;
		} else {
			$getOne->product_id = $request->input('product_id');
			$getOne->quantity = $request->input('quantity');
			$getOne->user_id = $request->input('user_id');
		}

		$getOne->save();
		return redirect()->route('index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//
	}
}
