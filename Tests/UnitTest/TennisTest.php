<?php

use AtpRanking\Game;
use AtpRanking\Score;
use AtpRanking\WonGame;

class TennisTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function should_return_0_0_when_no_points_scored(){
        $zeroScore = new Score(0);

        $zeroScoreGame = new Game($zeroScore, $zeroScore);
        $expectedGame = new Game($zeroScore, $zeroScore);

        $this->assertTrue($zeroScoreGame->equals($expectedGame));
    }

    /** @test */
    public function should_return_15_0_when_home_scored_once_and_away_did_not_score(){
        $zeroScore = new Score(0);
        $fifteenScore = new Score(15);

        $currentGame = new Game($zeroScore, $zeroScore);
        $currentGame = $currentGame->scoreHome();

        $expectedGame = new Game($fifteenScore, $zeroScore);

        $this->assertTrue($currentGame->equals($expectedGame));
    }

    /** @test */
    public function should_return_15_15_when_home_scored_once_and_away_too(){
        $zeroScore = new Score(0);
        $fifteenScore = new Score(15);

        $currentGame = new Game($zeroScore, $zeroScore);
        $currentGame = $currentGame->scoreHome();
        $currentGame = $currentGame->scoreAway();

        $expectedGame = new Game($fifteenScore, $fifteenScore);

        $this->assertTrue($currentGame->equals($expectedGame));
    }

    /** @test */
    public function should_return_30_15_when_home_scored_twice_and_away_once(){
        $zeroScore = new Score(0);
        $fifteenScore = new Score(15);
        $thirtyScore = new Score(30);

        $currentGame = new Game($zeroScore, $zeroScore);
        $currentGame = $currentGame->scoreHome();
        $currentGame = $currentGame->scoreHome();
        $currentGame = $currentGame->scoreAway();

        $expectedGame = new Game($thirtyScore, $fifteenScore);

        $this->assertTrue($currentGame->equals($expectedGame));
    }

    /** @test */
    public function should_return_40_15_when_home_scored_three_times_and_away_once(){
        $zeroScore = new Score(0);
        $fifteenScore = new Score(15);
        $thirtyScore = new Score(40);

        $currentGame = new Game($zeroScore, $zeroScore);
        $currentGame = $currentGame->scoreHome();
        $currentGame = $currentGame->scoreHome();
        $currentGame = $currentGame->scoreHome();
        $currentGame = $currentGame->scoreAway();

        $expectedGame = new Game($thirtyScore, $fifteenScore);

        $this->assertTrue($currentGame->equals($expectedGame));
    }









































    public function should_return_home_win_when_home_player_score_for_times_and_away_did_not_score(){
        $zeroScore = new Score(0);
        $thirtyScore = new Score(40);

            $currentGame = new Game(WonGame, $zeroScore);
        $currentGame = $currentGame->scoreHome();
        $currentGame = $currentGame->scoreHome();
        $currentGame = $currentGame->scoreHome();
        $currentGame = $currentGame->scoreHome();

        $expectedGame = new WonGame('Home');

        $this->assertTrue($currentGame->equals($expectedGame));
    }

}