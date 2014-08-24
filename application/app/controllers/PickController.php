<?php

class PickController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$picks = Picks::all();
		return Response::json(array(
			'error' => false,
			'data' => $picks),
			200
		);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		foreach (Request::all() as $key => $value) {
			if (is_int($key)) {
				$pick = new Picks;
				$pick->user_id = Auth::user()->id;
				$pick->match_id = $key;
				$pick->pick = $value;
				$pick->save();
			}
		}
		return Redirect::to('/app/welcome')->with('message', 'Picks saved! Good Luck :)')->with('msg_lvl', 'success');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
