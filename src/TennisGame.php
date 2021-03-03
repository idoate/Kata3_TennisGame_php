<?php

namespace Deg540\PHPTestingBoilerplate;

use phpDocumentor\Reflection\Types\Void_;

/**
 * @property array player_name_score
 */
class TennisGame
{

    public $player_name_score;


    /**
     * TennisGame constructor.
     * @param $player1Name
     * @param $player2Name
     */
    public function __construct($player1Name, $player2Name)
    {
        $this->player_name_score = [
            $player1Name => 0,
            $player2Name => 0,
        ];
    }

    public function getScore(): string
    {
        if ($this->player_name_score[1][3] == 0 && $this->player_name_score[2][3] == 0) {
            return "Love all";

        }
    }

    public function wonPoint($winnerPlayerName)
    {
        $value = $this->player_name_score[$winnerPlayerName];
        if ($value == 0 || $value == 15) {
            $value = $value + 15;
        }
        else if ($value == 30)
        {
            $value = 40;
        }
        else if ($value == 40)
        {
            $value = "+40";
        }

        $this->player_name_score[$winnerPlayerName] =$value;
    }

}