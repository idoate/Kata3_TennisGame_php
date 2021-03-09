<?php

namespace Deg540\PHPTestingBoilerplate;

/**
 * @property array $playerName_score
 * @property string player2Name
 * @property string player1Name
 */
class TennisGame
{
    public array $playerName_score;
    private string $player1Name, $player2Name;
    const INTEGER_NUMBER_TO_STRING = [
        0 => "Love",
        1 => "Fifteen",
        2 => "Thirty",
        3 => "Forty",
    ];
    private function getPlayer1Score():int
    {
        return $this->playerName_score[$this->player1Name];
    }
    private function getPlayer2Score():int
    {
        return $this->playerName_score[$this->player2Name];
    }

    private function areEquals():bool
    {
        return $this->getPlayer1Score() === $this->getPlayer2Score();
    }
    private function moreThanFortyPoints():bool
    {
        return $this->getPlayer1Score() >3 || $this->getPlayer2Score()> 3 ;
    }
    private function winner():bool
    {
       return $this->moreThanFortyPoints() &&  abs($this->getPlayer1Score()-$this->getPlayer2Score() ) >=2 ;
    }
    private function advantager():bool{
        return $this->moreThanFortyPoints() &&  abs($this->getPlayer1Score()-$this->getPlayer2Score() ) ===1 ;

    }


    /**
     * TennisGame constructor.
     * @param $player1Name
     * @param $player2Name
     */

    public function __construct($player1Name, $player2Name)
    {
        $this->playerName_score = [
            $player1Name => 0,
            $player2Name => 0
        ];
        $this->player1Name = $player1Name;
        $this->player2Name = $player2Name;
    }


    public function getScore(): string
    {
        if ($this->winner()) {
            if ($this->getPlayer1Score() > $this->getPlayer2Score()) {
                return "Win " . $this->player1Name;
            }
            return "Win " . $this->player2Name;
        }

        elseif ($this->advantager()){
            if ($this->getPlayer1Score() > $this->getPlayer2Score()) {
                return "Advantage " . $this->player1Name;
            }
            return "Advantage " . $this->player2Name;
        }

        elseif ($this->areEquals()) {
            if ($this->getPlayer1Score()>2)
            {
                return "Deuce";
            }
            return self::INTEGER_NUMBER_TO_STRING[$this->getPlayer1Score()] . " all";
        }

        return self::INTEGER_NUMBER_TO_STRING[$this->getPlayer1Score()] . "-" . self::INTEGER_NUMBER_TO_STRING[$this->getPlayer2Score()];
    }



    public function wonPoint($winnerPlayerName)
    {
        $this->playerName_score[$winnerPlayerName] = $this->playerName_score[$winnerPlayerName]+1;

    }



}

