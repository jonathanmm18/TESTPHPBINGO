<?php

namespace App\Http\Classes;

class Card{
    protected $x_dim;
    protected $y_dim;
    public $card;
    protected $card_interval;

    public function __construct(){
        $this->x_dim = 5;
        $this->y_dim = 5;
        $this->card_interval = [ [1,15],[16,30],[31,45],[46,60],[61,75] ];
        for($i = 0; $i < $this->x_dim; $i++){
            for($j = 0; $j < $this->y_dim; $j++){
                $this->card[$i][$j] = [0,false];
            }
        }
    }

    public function generateCard(){

        for($i = 0; $i < $this->x_dim; $i++){
            for($j = 0; $j < $this->y_dim; $j++){
                $val = rand( $this->card_interval[$i][0] , $this->card_interval[$i][1] );
                while((bool)in_array($val, $this->card[$i])){
                    $val = rand( $this->card_interval[$i][0] , $this->card_interval[$i][1] );
                }
                $this->card[$i][$j] = [$val,false];

            }
        }
        $this->card[2][2] = ' ';
    }

    public function findNumber(int $number){
        for($i = 0; $i < $this->x_dim; $i++){
            for($j = 0; $j < $this->y_dim; $j++){
                if($this->card[$i][$j][0] == $number){
                    $this->card[$i][$j][1] = true;
                    return true;
                }
            }
        }
        return false;
    }



}
