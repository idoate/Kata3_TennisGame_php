<?php

namespace Deg540\PHPTestingBoilerplate;


/**
 * @property array player_name_score
 */
class TennisGame
{

    public array $player_name_score;


    /**
     * TennisGame constructor.
     * @param $player1Name
     * @param $player2Name
     */
    public function __construct($player1Name, $player2Name)
    {
        $this->player_name_score = [
            $player1Name => "Love",
            $player2Name => "Love",
        ];
    }

    public function getScore(): string
    {
        $valuesArray = [];
        foreach ($this->player_name_score as $i => $value)
        {
            array_push($valuesArray,$value);

        }
        if ($valuesArray[0] == $valuesArray[1]){
            return $valuesArray[1] ." all";
        }

    }

    public function wonPoint($winnerPlayerName)
    {
        $value = $this->player_name_score[$winnerPlayerName];
        if ($value == "Love" ) {
            $value = 15;
        }
        else if ($value == 15)
        {
            $value = 30;
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