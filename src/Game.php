<?php

namespace AtpRanking;


class Game
{
    /**
     * @var Score
     */
    private $homeScore;
    /**
     * @var Score
     */
    private $awayScore;

    public function __construct(Score $homeScore, Score $awayScore)
    {
        $this->homeScore = $homeScore;
        $this->awayScore = $awayScore;
    }

    /**
     * @return Game
     */
    public function scoreHome()
    {
        $newScore = $this->nextScore($this->homeScore);

        return new Game($newScore, $this->awayScore);
    }

    /**
     * @return Game
     */
    public function scoreAway()
    {
        $newScore = $this->nextScore($this->awayScore);

        return new Game($this->homeScore, $newScore);
    }

    public function equals(Game $expectedGame)
    {
        return $this->homeScore == $expectedGame->homeScore() && $this->awayScore == $expectedGame->awayScore();
    }

    private function homeScore()
    {
        return $this->homeScore;
    }

    private function awayScore()
    {
        return $this->awayScore;
    }

    private function nextScore(Score $score)
    {
        if($score->equal(new Score(0))){
            return new Score(15);
        }
        if($score->equal(new Score(15))){
            return new Score(30);
        }
        if($score->equal(new Score(30))){
            return new Score(40);
        }
    }

}