<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Exception;
use Illuminate\Http\Request;

class GamesController extends Controller
{
    public function GetGames()
    {

        $games = Game::paginate(20);

        return response()->json($games, 200);
    }

    public function CreateGame(Request $request)
    {

        try {
            $game = new Game();
            $game->name = $request->name;
            $game->description = $request->description;
            $game->launch_date = $request->launch_date;
            $game->image_hero = $request->image_hero;
            $game->image_header = $request->image_header;
            $game->image_screenshot = $request->image_screenshot;
            $game->link = $request->link;
            $game->platforms = $request->platforms;
            $game->genre = $request->genre;

            $game->save();
            return response()->json(['message'=>'Game created successfully!', 'status' => 201]);
        } catch (Exception $e) {
            return response()->json($e, 500);
        }
    }

    public function EditGame(Request $request, $id)
    {

        try {
            $data = $request->all();
            $game = Game::findOrFail($id);

            $game->update($data);

            return response()->json(['message'=>'Game updated successfully!', 'status' => 201]);
        } catch (Exception $e) {
            return response()->json($e, 500);
        }
    }

    public function DeleteGame($id)
    {
        try {
            $game = Game::findOrFail($id);
            $game->delete();

            return response()->json(['message'=>'Game deleted successfully!', 'status' => 201]);
        } catch (Exception $e) {
            return response()->json($e, 500);
        }
    }
    
    public function GetGame($id){
    
    	try{
    	
    	$game = Game::findOrFail($id);
    	
    	return response()->json($game, 200);
    	
    	}catch(Exception $e){
    		
    	return response()->json($e, 500);
    	
    	}
    
    }
    
    public function searchGame($name){
    	
    	$games = Game::where([
    	['name', 'like', '%' . $name . '%']
    	])->paginate(30);
    	
    	return response()->json($games, 200);
    
    }
}
