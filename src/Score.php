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
}
