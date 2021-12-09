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
        //se crea un registro con los datos ya validados
        $game = Game::create($data);
        //retorna mensaje de operacion exitosa
        return response()->json(['success'=>'
        successfully created']);
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
        //valido los campos en caso de no pasar los oarametros devuelve error 422
        $request->validate([
            'name'=>'required|string',
            'urlImage'=>'required|url',
            'urlGame'=>'required|url',
            'description'=>'required|string|min:3|max:500',
            'status'=>'required'
        ]);
            //se llena el modelo con los valores obtenidos y posteriormente se guardan
        $game->fill($request->all())->save();
        //retorna que la oferacion se completo con exito
        return response()->json([
            'success'=>'successfully saved'
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
        //se elimina el juego que se paso el id por parametro
        $game->delete();
        return response()->json();
    }
}