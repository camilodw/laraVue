<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Game;
use Illuminate\Http\Request;
class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = Game::paginate(8);
        return response()->json($games);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //valido los campos en caso de no pasar los oarametros devuelve error 422
        $data=$request->validate([
            'name'=>'required|string',
            'urlImage'=>'required|url',
            'urlGame'=>'required|url',
            'description'=>'required|string|min:3|max:500',
            'status'=>'required'
        ]);
        $game = Game::create($data);
        return response()->json([
            'status' => 'success',
            'game'   => $game
        ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        return response()->json($game);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Game $game)
    {
        $request->validate([
            'name'=>'required|string',
            'urlImage'=>'required|url',
            'urlGame'=>'required|url',
            'description'=>'required|string|min:3|max:500',
            'status'=>'required'
        ]);

        $game->fill($request->all())->save();
        return response()->json([            
            'game'=>$game
        ]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        $game->delete();
        return response()->json('Game successfully deleted!');
    }
}