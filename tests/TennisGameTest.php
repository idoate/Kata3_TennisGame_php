<?php

namespace Deg540\PHPTestingBoilerplate\Test;

use Deg540\PHPTestingBoilerplate\TennisGame;
use PHPUnit\Framework\TestCase;

class TennisGameTest extends TestCase
{
    /**
     * @test
     **/
    public function al_iniciar_el_juego_marcador_devuelve_love_all()
    {
        $game = new TennisGame("Juan","Pepe");
        $this->assertSame("Love all",$game->getScore());
    }

}
