<?php

namespace SimPow\Collection;

abstract class AbstractCollection implements \Countable, \IteratorAggregate
{
    /** @var  array */
    protected $array;

    /**
     * AbstractCollection constructor.
     * @param array $array
     */
    public function __construct(array $array = [])
    {
        $this->array = $array;
    }

    /**
     * @param $key
     * @param null $default
     * @return mixed
     */
    public function get($key, $default = null) {
        if (!$this->has($key)) {
            return $default;
        }

        return $this->array[$key];
    }

    /**
     * @param $key
     * @return boolean
     */
    abstract public function has($key);

    /**
     * @param null $key
     * @return int
     */
    public function size($key = null) {
        if (null === $key) {
            return count($this->array);
        }

        return count($this->get($key, []));
    }

    /**
     * Count elements of an object
     * @link http://php.net/manual/en/countable.count.php
     * @return int The custom count as an integer.
     * </p>
     * <p>
     * The return value is cast to an integer.
     * @since 5.1.0
     */
    public function count()
    {
        return $this->size();
    }


    /**
     * Retrieve an external iterator
     * @link http://php.net/manual/en/iteratoraggregate.getiterator.php
     * @return \Traversable An instance of an object implementing <b>Iterator</b> or
     * <b>Traversable</b>
     * @since 5.0.0
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->array);
    }
}