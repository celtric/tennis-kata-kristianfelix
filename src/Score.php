<?php

namespace AtpRanking;

class Score
{
    private $value;

    /**
     * @param $value
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    public function equal(Score $score)
    {
        return $this->value == $score->value;
    }
}