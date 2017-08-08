<?php

namespace SimPow\Wall;

class SimPowBrick
{
    /** @var  SimPowWall */
    private $wall;

    /**
     * @return SimPowWall
     */
    public function getWall()
    {
        return $this->wall;
    }

    /**
     * @param SimPowWall $wall
     */
    public function setWall(SimPowWall $wall)
    {
        $this->wall = $wall;
    }
}