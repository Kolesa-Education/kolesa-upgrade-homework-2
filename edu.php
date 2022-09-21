<?php

class Player{
    public $name;
    public $coins;
    public function __consrtuct($name, $coins) {
        $this->name = $name;
        $this->coins = $coins;
    }
}

class Game{
    protected $player1;
    protected $player2;
    public function __consrtuct(Player $player1, Player $player2) {
        $this->player1 = $player1;
        $this->player2 = $player2;
    }

    public function start(){
        while (true) {
            $flip = rand(0, 1) ? "орел" : "решка";
            $first = $this->player1->coins;
            $second = $this->player2->coins;
            if ($flip == "орел") {
                $first++;
                $second--;
            } else {
                $first--;
                $second++;
            }

            if ($first == 0 || $second == 0) {
                return $this->end();
            }
        }
    }
    public function end() {
        echo <<< EOT
            Game over.
        EOT;
    }

}

$game = new Game(
    new Player("Joe", 100),
    new Player("Jane", 100)
)

$game->start();


?>