<?php

namespace SimPow;

use SimPow\Exception\SimPowException;
use SimPow\Install\SimPowInstaller;
use SimPow\Wall\SimPowWall;

class SimPow
{
    /** @var  SimPowWall */
    private $wall;

    /** @var string */
    private $output;

    public function install()
    {
        $installer = new SimPowInstaller();
        $installer->run();
    }

    public function run()
    {
        $this->install();
        $this->load();
        $this->display();
    }

    /**
     * @throws SimPowException
     */
    private function load()
    {
        $this->wall = new SimPowWall();
        $this->wall->loadBricks();
    }

    /**
     * @return SimPowWall
     */
    public function getWall()
    {
        return $this->wall;
    }

    private function display()
    {
       $this->output = '<h1>Hello SimPow !</h1>';

       echo $this->output;
    }
}