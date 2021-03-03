<?php

namespace Deg540\PHPTestingBoilerplate\Test;

use Deg540\PHPTestingBoilerplate\TennisGame;
use PHPUnit\Framework\TestCase;

class TennisGameTest extends TestCase
{
    /**
     * @test
     **/
    public function getScore_devuelve_love_all_inicio_juego()
    {
        $game = new TennisGame("Juan","Pepe");
        $this->assertEquals("Love all",$game->getScore());
    }

    /**
     * @test
     **/
    public function suma_15_al_marcador()
    {
        $game = new TennisGame("Juan","Pepe");
        $game->wonPoint("Juan");
        $this->assertEquals(15,$game->player_name_score["Juan"]);
        
    }

    /**
     * @test
     **/
    public function suma_posibles_valores_al_marcador()
    {
        $game = new TennisGame("Juan","Pepe");
        $game->wonPoint("Juan");
        $game->wonPoint("Juan");
        $this->assertEquals(30,$game->player_name_score["Juan"]);
        $game->wonPoint("Juan");
        $this->assertEquals(40,$game->player_name_score["Juan"]);
        $this->assertEquals("+40",$game->player_name_score["Juan"]);



    }


}
