<?php

namespace App\Http\Classes;

class Player{

    public $id;
    public $card;
    public $bingo = false;

    public function __construct($id){
        $this->id = $id;
        $this->card = new Card();
        $this->card->generateCard();
    }

    public function getId(){
        return $this->id;
    }

    public function getCard(){
        return $this->card;
    }

    public function findNumber(int $number){
        $this->card->findNumber($number);
    }



}
