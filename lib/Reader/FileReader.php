<?php

namespace SimPow\Reader;

use SimPow\Exception\SimPowException;

class FileReader
{
    /**
     * @param $file
     * @param bool $required
     * @return string
     * @throws SimPowException
     */
    public function get($file, $required = true)
    {
        try {
            if (!file_exists($file)) {
                throw new SimPowException(sprintf('Unable to find file "%s"', $file));
            }

            if (!is_readable($file)) {
                throw new SimPowException(sprintf('Not enough right for file "%s"', $file));
            }

            return file_get_contents($file);
        }
        catch (SimPowException $e) {
            if ($required) {
                throw $e;
            }
            return $this->getDefaultValue();
        }
    }

    /**
     * @return string
     */
    protected function getDefaultValue() {
        return '';
    }
}