<?php

namespace Deg540\PHPTestingBoilerplate\Test;

use Deg540\PHPTestingBoilerplate\TennisGame;
use PHPUnit\Framework\TestCase;

class TennisGameTest extends TestCase
{
    /**
     * @test
     **/
    public function devuelve_Love_all_inicio_juego()
    {
        $game = new TennisGame("Juan","Pepe");

        $this->assertEquals("Love all",$game->getScore());
    }

    /**
     * @test
     **/
    public function si_van_1_1_el_resultado_es_Fifteen_all()
    {
        $game = new TennisGame("Juan","Pepe");
        $game->wonPoint("Juan");
        $game->wonPoint("Pepe");

        $this->assertEquals("Fifteen all",$game->getScore());
    }

    /**
     * @test
     **/

    public function si_van_3_3_el_resultado_es_deuce()
    {
        $game = new TennisGame("Juan","Pepe");
        $game->wonPoint("Juan");
        $game->wonPoint("Juan");
        $game->wonPoint("Juan");
        $game->wonPoint("Pepe");
        $game->wonPoint("Pepe");
        $game->wonPoint("Pepe");

        $this->assertEquals("Deuce",$game->getScore());
    }

    /**
     * @test
     **/

    public function si_van_iguales_con_mas_de_3_el_resultado_es_deuce()
    {
        $game = new TennisGame("Juan","Pepe");
        $game->wonPoint("Juan");
        $game->wonPoint("Juan");
        $game->wonPoint("Juan");
        $game->wonPoint("Pepe");
        $game->wonPoint("Pepe");
        $game->wonPoint("Pepe");
        $game->wonPoint("Pepe");
        $game->wonPoint("Juan");

        $this->assertEquals("Deuce",$game->getScore());
    }

    /**
     * @test
     **/
    public function si_van_40_30_el_resultado_es_Forty_Thirty()
    {
        $game = new TennisGame("Juan","Pepe");
        $game->wonPoint("Juan");
        $game->wonPoint("Juan");
        $game->wonPoint("Juan");
        $game->wonPoint("Pepe");
        $game->wonPoint("Pepe");

        $this->assertEquals("Forty-Thirty",$game->getScore());

    }

    /**
     * @test
     **/
    public function si_van_4_3_el_resultado_es_advantage()
    {
        $game = new TennisGame("Juan","Pepe");
        $game->wonPoint("Juan");
        $game->wonPoint("Juan");
        $game->wonPoint("Juan");
        $game->wonPoint("Pepe");
        $game->wonPoint("Pepe");
        $game->wonPoint("Pepe");
        $game->wonPoint("Juan");

        $this->assertEquals("Advantage Juan",$game->getScore());
    }

    /**
     * @test
     **/
    public function si_van_mas_de_3_con_diferencia_de_1_el_resultado_es_advantage()
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
        $game->wonPoint("Juan");

        $this->assertEquals("Advantage Juan",$game->getScore());
    }


    /**
     * @test
     **/
    public function si_van_con_mas_de_3_con_diferencia_de_2_el_resultado_es_Win()
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
        $game->wonPoint("Juan");
        $game->wonPoint("Juan");

        $this->assertEquals("Win Juan",$game->getScore());


    }


}
