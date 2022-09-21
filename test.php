<?php

class Player {
    public $name;
    public $money;
    public function __consrtuct($name, $money) {
        $this->name = $name;
        $this->money = $money;
    }
}


class Game {
    protected $player_one;
    protected $player_two;

    public function __consrtuct(Player $player_one, Player $player_two) {
        $this->player1 = $player_one;
        $this->player2 = $player_two;
    }

    public function start() {
        
        while (true) {    
            $flip = rand(0, 1) ? "решка" : "орел";
            if ($flip == "орел") {
                $this->player1->money++;
                $this->player2->money--;
            } else {
                $this->player1->money--;
                $this->player2->money++;
            }
            if ($this->player1->money == 0 || $this->player2->money == 0) {
                return $this->end();
            }
        }
    }
    public function end() {
        echo "game over";
    }
}



$game = new Game(

    new Player("Jane", 100);
);

$game->start();

?>