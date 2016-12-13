<?php

namespace AtpRanking;


class WonGame extends Game
{
    /**
     * @var Score
     */
    private $winner;

    /**
     * WonGame constructor.
     *
     * @param Score $winner
     */
    public function __construct($winner)
    {
        $this->winner = $winner;
    }
}