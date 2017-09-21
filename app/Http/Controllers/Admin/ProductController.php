<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use View;

;


class ProductController extends Controller
{
	public function __construct()
	{
		//$this->middleware('auth');
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$getAll = Product::all();
		return view::make('product/index', [
			'books' => $getAll,
		]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return View::make('product.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * @param  \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, [
			'name' => 'required|string|max:30',
			'price' => 'required|string|max:5',
			'release_date' => 'required|date',
			'auther' => 'required|string',
			'retailer' => 'required|string',
			'desc' => 'required|string',
			'ISBN' => 'required|numeric',
			'file' => 'file|image',

		]);
		if ($request->hasFile('file')) {
			if ($request->file('file')->isValid()) {
				$uploadHelper = $request->file('file');
				$path = $uploadHelper->storeAs('public/books', $request->file('file')->hashName());
			}
		} else {
			$path = null;
		}

		Product::create([
			'name' => $request->input('name'),
			'price' => $request->input('price'),
			'release_date' => $request->input('release_date'),
			'auther' => $request->input('auther'),
			'retailer' => $request->input('retailer'),
			'desc' => $request->input('desc'),
			'ISBN' => $request->input('ISBN'),
			'pic_path' => $path,
		]);
		return redirect()->route('product.index');
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
		$getOne = Product::findOrFail($id);
		return View::make('product.edit', [
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
	public function update(Request $request, $id)
	{
		$this->validate($request, [
			'name' => 'required|string|max:30',
			'price' => 'required|string|max:5',
			'release_date' => 'required|date',
			'auther' => 'required|string',
			'retailer' => 'required|string',
			'desc' => 'required|string',
			'ISBN' => 'required|numeric',
			'file' => 'file|image',

		]);

		$getOne = Product::findOrFail($id);

		$getOne->name = $request->input('name');
		$getOne->price = $request->input('price');
		$getOne->release_date = $request->input('release_date');
		$getOne->auther = $request->input('auther');
		$getOne->retailer = $request->input('retailer');
		$getOne->desc = $request->input('desc');
		$getOne->ISBN = $request->input('ISBN');
		if ($request->hasFile('file') && isset($getOne->pic_index)) {
			Storage::delete('public/books/'.$getOne->pic_index);
			$uploadHelper = $request->file('file');
			$path = $uploadHelper->storeAs('public/books', $uploadHelper->hashName());
			$getOne->pic_path = $path;
		}
		$getOne->save();
		return redirect()->route('product.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$deleteTarget = Product::whereId($id);
		$deleteTarget->delete();
		return redirect()->route('product.index');
	}
}
