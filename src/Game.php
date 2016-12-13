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
        return new Game($this->homeScore->next(), $this->awayScore);
    }

    /**
     * @return Game
     */
    public function scoreAway()
    {
        return new Game($this->homeScore, $this->awayScore->next());
    }

    /**
     * @param Game $expectedGame
     *
     * @return bool
     */
    public function equals(Game $expectedGame)
    {
        return $this->homeScore->equals($expectedGame->homeScore)&& $this->awayScore->equals($expectedGame->awayScore);
    }
}
