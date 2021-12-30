<?php

namespace App\Http\Classes;

class Bingo{

    protected $players = [];
    protected $min = 1;
    protected $max = 75;
    protected $bingo = false;
    protected $callnumbers = [];

    public function __construct(){
        $this->players = [];
    }

    public function setPlayer(Player $player){
        $this->players[$player->getId()] = $player;
    }
    public function getPlayer(int $id){
        return $this->players[$id];
    }
    public function getPlayers(){
        return $this->players;
    }
    public function removePlayer(Player $player){
        unset($this->players[$player->getId()]);
    }

    public function callNumber(){
        $number = rand($this->min,$this->max);
        while((bool)in_array($number, $this->callnumbers)){
            $number = rand($this->min,$this->max);
        }
        $this->callnumbers[] = $number;

        //ACTUALIZA LA LISTA DE NUMEROS DE LAS TARJETAS DE CADA JUGADOR

        foreach($this->players as $player){
            $player->findNumber($number);
        }

        return $number;
    }



}
