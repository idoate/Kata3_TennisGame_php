<?php

namespace Deg540\PHPTestingBoilerplate;

/**
 * @property array player_name_score
 */
class TennisGame
{

   private array $player_name_score;


    /**
     * TennisGame constructor.
     * @param $player1Name
     * @param $player2Name
     */
    public function __construct($player1Name,$player2Name)
    {
        $this->player_name_score = [
                [1,$player1Name,0],
                [2,$player2Name,0]
        ];
    }
    public function getScore(): string
    {
        if ($this->player_name_score[1][3]==0 && $this->player_name_score[2][3]==0)
        {
            return  "Love all";

        }
    }
}
/*   $nombrj1;
   private String $nombrej2;
constructor(player1Name, player2Name)
   t
void wonPoint(playerName)
string getScore()
*/