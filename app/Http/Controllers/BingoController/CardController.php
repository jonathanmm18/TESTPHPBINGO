<?php

namespace App\Http\Controllers\BingoController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Classes\Player;
use App\Http\Classes\Bingo;

class CardController extends Controller
{
    protected $bingo = null;

    public function getBingo($request){
        if ($request->session()->has('bingo')) {
            $this->bingo = $request->session()->get('bingo');
        } else {
            $this->bingo = new Bingo();
            $request->session()->put('bingo',$this->bingo);
        }
    }


    //
    public function createPlayer(Request $request)
    {

        $this->getBingo($request);
        // CREAMOS UN NUEVO JUGADOR
        $player = new Player($request->id);
        // GENERAMOS SU CARTILLA
        $card = $player->getCard();
        // GUARMOS EL JUGADOR EN LLA SESSION, TAMBIEN PODRIA GUARDARSE EN UNA BD
        $this->bingo->setPlayer($player);
        return response()->json($player);
    }

    public function getCard(Request $request){
        $this->getBingo($request);
        $player = $this->bingo->getPlayer($request->id);
        return response()->json($player);
    }

    public function getAllPlayers(Request $request){
        $this->getBingo($request);
        $players = $this->bingo->getPlayers();
        return response()->json($players);
    }

    public function removeAllPlayers(){
        session()->flush();
    }

    public function callNumber(Request $request){
        $this->getBingo($request);
        return $this->bingo->callNumber();
    }
}
