<?php

namespace AtpRanking;


class Game
{
    /** @var Score */
    private $homeScore;

    /** @var Score */
    private $awayScore;

    /**
     * @param Score $homeScore
     * @param Score $awayScore
     */
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

    /**
     * @param Game $expectedGame
     *
     * @return bool
     */
    public function equals(Game $expectedGame)
    {
        return $this->homeScore == $expectedGame->homeScore && $this->awayScore == $expectedGame->awayScore;
    }

    /**
     * @param Score $score
     *
     * @return Score
     */
    private function nextScore(Score $score)
    {
        if($score->equals(new Score(0))){
            return new Score(15);
        }
        if($score->equals(new Score(15))){
            return new Score(30);
        }
        if($score->equals(new Score(30))){
            return new Score(40);
        }
    }
}
