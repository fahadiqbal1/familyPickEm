<?php

class TeamController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$team = Teams::all();
		return Response::json(array(
			'error' => false,
			'data' => $team),
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
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$team = Teams::where('abbr',$id)->take(1)->get();
		return Response::json(array(
			'error' => false,
			'data' => $team),
			200
		);
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
		$team = Teams::where('abbr',$id)->first();

		if ( Request::get('action') == 'win' ) {
			$current = $team->wins;
			$new = $current + 1;
			$team->wins = $new;
		}
		if ( Request::get('action') == 'loss' ) {
			$current = $team->losses;
			$new = $current + 1;
			$team->losses = $new;
		}
		if ( Request::get('action') == 'tie' ) {
			$current = $team->ties;
			$new = $current + 1;
			$team->ties = $new;
		}

		$team->save();

		return Response::json(array(
			'error' => false,
			'data' => $team),
			200
		);
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
