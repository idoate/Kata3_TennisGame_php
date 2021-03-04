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
    public function wonPoint_suma_15_al_marcador()
    {
        $game = new TennisGame("Juan","Pepe");
        $game->wonPoint("Juan");
        $this->assertEquals(15,$game->player_name_score["Juan"]);
        
    }

    /**
     * @test
     **/
    public function wonPoint_suma_posibles_valores_al_marcador()
    {
        $game = new TennisGame("Juan","Pepe");
        $game->wonPoint("Juan");
        $game->wonPoint("Juan");
        $this->assertEquals(30,$game->player_name_score["Juan"]);
        $game->wonPoint("Juan");
        $this->assertEquals(40,$game->player_name_score["Juan"]);
        $game->wonPoint("Juan");
        $this->assertEquals("Winner",$game->player_name_score["Juan"]);

    }

    /**
     * @test
     **/
    public function getScore_devuelve_all()
    {
        $game = new TennisGame("Juan","Pepe");
        $game->wonPoint("Juan");
        $game->wonPoint("Pepe");
        $this->assertEquals("Fifteen all",$game->getScore());

    }

    /**
     * @test
     **/
    public function getScore_devuelve_deuce_advantage()
    {
        $game = new TennisGame("Juan","Pepe");
        $game->wonPoint("Juan");
        $game->wonPoint("Juan");
        $game->wonPoint("Juan");
        $game->wonPoint("Pepe");
        $game->wonPoint("Pepe");
        $game->wonPoint("Pepe");
        $this->assertEquals("Deuce",$game->getScore());
        $game->wonPoint("Juan");
        $this->assertEquals("Advantage Juan",$game->getScore());
        $game->wonPoint("Juan");
        $this->assertEquals("Win Juan",$game->getScore());
    }

    /**
     * @test
     **/
    public function devuelve_win_y_pasa_de_advantage_a_deuce()
    {
        $game = new TennisGame("Juan","Pepe");
        $game->wonPoint("Juan");
        $game->wonPoint("Juan");
        $game->wonPoint("Juan");
        $game->wonPoint("Pepe");
        $game->wonPoint("Pepe");
        $game->wonPoint("Pepe");
        $game->wonPoint("Juan");
        $game->wonPoint("Pepe");
        $this->assertEquals("Deuce",$game->getScore());
        $game->wonPoint("Juan");
        $game->wonPoint("Juan");
        $this->assertEquals("Win Juan",$game->getScore());
        $game->wonPoint("Pepe");
        $this->assertEquals("Win Juan",$game->getScore());






    }


}
