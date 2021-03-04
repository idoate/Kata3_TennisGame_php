<?php

namespace Deg540\PHPTestingBoilerplate;


/**
 * @property array player_name_score
 */
class TennisGame
{
    const INTEGER_NUMBER_TO_STRING =[
        0 => "Love",
        15 => "Fifteen",
        30 => "Thirty",
        40 => "Fourty",
        "40+" =>"Advantage"
    ];
    public array $player_name_score;


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
        $valuesArray = [];
        foreach ($this->player_name_score as $playerName => $score)
        {
            array_push($valuesArray,$score);
            if($score === "Winner")
            {
                return ("Winner ".$playerName);
            }
            elseif($score === "40+")
            {
                return(self::INTEGER_NUMBER_TO_STRING[$score]." ".$playerName);
            }

        }
        if ($valuesArray[0] === 40 && $valuesArray[1] === 40)
        {
            return "Deuce";
        }

        elseif ($valuesArray[0] === $valuesArray[1]){
            return self::INTEGER_NUMBER_TO_STRING[$valuesArray[1] ]." all";
        }

        else{
            return self::INTEGER_NUMBER_TO_STRING[$valuesArray[0]]."-".self::INTEGER_NUMBER_TO_STRING[$valuesArray[1]];
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
        else if ($value === 40)
        {
            $value = "40+";
        }

        $this->player_name_score[$winnerPlayerName] =$value;
    }



}