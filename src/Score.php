<?php

namespace AtpRanking;

class Score
{
    /** @var int */
    private $points;

    /**
     * @param int $points
     */
    public function __construct($points)
    {
        $this->points = $points;
    }

    /**
     * @param Score $score
     *
     * @return bool
     */
    public function equals(Score $score)
    {
        return $this->points == $score->points;
    }

    /**
     * @return Score
     */
    public function next()
    {
        if ($this->equals(new Score(0))) {
            return new Score(15);
        }
        if ($this->equals(new Score(15))) {
            return new Score(30);
        }
        if ($this->equals(new Score(30))) {
            return new Score(40);
        }
    }
}
