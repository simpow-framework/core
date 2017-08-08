<?php


namespace SimPow\Wall;

use SimPow\Exception\SimPowException;

/** This class is a container for all SimPowBrick */
class SimPowWall
{
    private $bricks;

    /**
     * @param array $dependencies
     * @throws SimPowException
     */
    public function loadBricks(array $dependencies = [])
    {
        $this->bricks = [];

        foreach ($dependencies as $dependency) {
            if (!$dependency instanceof SimPowBrick) {
                throw new SimPowException(sprintf('"%s" is not a SimPowBrick', $dependency));
            }

            /** @var SimPowBrick $brick */
            $brick = new $dependency();
            $brick->setWall($this);
            $this->bricks[$dependency] = $brick;
        }
    }

    /**
     * @param $brick
     * @return SimPowBrick
     * @throws SimPowException
     */
    public function get($brick)
    {
        if (!$this->has($brick)) {
            throw new SimPowException(sprintf('Unable to load brick "%s"', $brick));
        }

        return $this->bricks[$brick];
    }

    /**
     * @param $brick
     * @return bool
     */
    public function has($brick) {
        return array_key_exists($brick, $this->bricks);
    }
}