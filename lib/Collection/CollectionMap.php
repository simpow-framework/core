<?php

namespace SimPow\Collection;

class CollectionMap extends AbstractCollection
{
    /**
     * @param $key
     * @return boolean
     */
    public function has($key)
    {
        return array_key_exists($key, $this->array);
    }
}