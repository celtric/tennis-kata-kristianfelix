<?php

namespace AtpRanking;

final class Score
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
     * @return Score
     */
    public function next()
    {
        switch ($this->points) {
            case 0:  return new Score(15);
            case 15: return new Score(30);
            case 30: return new Score(40);
            default: throw new \RuntimeException("Not implemented");
        }
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
