<?php

namespace Deg540\PHPTestingBoilerplate;


/**
 * @property array player_name_score
 * @property string player2Name
 * @property string player1Name
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
    private string $player1Name ,$player2Name;

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
        $this->player1Name = $player1Name;
        $this->player2Name = $player2Name;
    }

    public function getScore(): string
    {
        foreach ($this->player_name_score as $playerName => $score)
        {
            if($score === "Winner")
            {
                return ("Win ".$playerName);
            }
            elseif($score === "40+")
            {
                return(self::INTEGER_NUMBER_TO_STRING[$score]." ".$playerName);
            }

        }
        if ($this->player_name_score [$this->player1Name] === 40 && $this->player_name_score[$this->player2Name] === 40)
        {
            return "Deuce";
        }

        elseif ($this->player_name_score [$this->player1Name] === $this->player_name_score [$this->player2Name] ){
            return self::INTEGER_NUMBER_TO_STRING[$this->player_name_score[$this->player1Name]]." all";
        }

        else{
            return self::INTEGER_NUMBER_TO_STRING[$this->player_name_score[$this->player1Name]]."-".self::INTEGER_NUMBER_TO_STRING[$this->player_name_score[$this->player2Name]];
        }

    }

    public function wonPoint($winnerPlayerName)
    {
        if ($this->player_name_score[$winnerPlayerName] === "Looser" || $this->player_name_score[$winnerPlayerName] === "Winner") {
            echo("The game has ended , " . $winnerPlayerName . " can't win more points");


        } else {
            if ($this->player1Name === $winnerPlayerName) {
                $looserPlayerName = $this->player2Name;
            } else {
                $looserPlayerName = $this->player1Name;
            }

            $winnerValue = $this->player_name_score[$winnerPlayerName];
            $looserValue = $this->player_name_score[$looserPlayerName];
            if ($winnerValue === 0 || $winnerValue === 15) {
                $winnerValue = $winnerValue + 15;
            } elseif ($winnerValue === 30) {
                $winnerValue = 40;
            } elseif ($winnerValue === 40) {
                if ($looserValue === 40) {
                    $winnerValue = "40+";
                } elseif ($looserValue === "40+") {
                    $looserValue = 40;
                } else {
                    $winnerValue = "Winner";
                    $looserValue = "Looser";
                }

            } else {
                $winnerValue = "Winner";
                $looserValue = "Looser";
            }

            $this->player_name_score[$winnerPlayerName] = $winnerValue;
            $this->player_name_score[$looserPlayerName] = $looserValue;
            if ($winnerValue === "Winner") {
                echo ($this->getScore());
            }

        }
    }



}