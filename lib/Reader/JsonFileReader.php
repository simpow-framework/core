<?php

namespace SimPow\Reader;

use SimPow\Exception\SimPowException;

class JsonFileReader extends FileReader
{
    /**
     * @param $file
     * @param bool $required
     * @return array
     * @throws SimPowException
     */
    public function get($file, $required = true)
    {
        $content = json_decode(parent::get($file, $required), true);

        if (JSON_ERROR_NONE !== json_last_error()) {
            throw new SimPowException(sprintf('Error in json file  "%s" : %s', $file, json_last_error_msg()));
        }

        return $content;
    }

    /**
     * @return array
     */
    protected function getDefaultValue()
    {
        return [];
    }
}