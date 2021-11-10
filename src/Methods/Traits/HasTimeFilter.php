<?php

namespace Larowka\KudaGo\Methods\Traits;

use DateTime;
use Exception;

trait HasTimeFilter
{
    protected string $afterParam  = 'actual_since';
    protected string $beforeParam = 'actual_until';

    /**
     * @param string $datetime
     * @param string $format
     * @param bool   $exceptions
     *
     * @return $this
     * @throws Exception
     */
    public function after(string $datetime, string $format = 'Y-m-d', bool $exceptions = false): self
    {
        if ($timestamp = $this->makeTimestamp($datetime, $format)) {
            $this->params[$this->afterParam] = $timestamp;
        } elseif ($exceptions) {
            throw new Exception(sprintf('Incorrect datetime: \'%s\' or format: \'%s\'', $datetime, $format));
        }

        return $this;
    }

    /**
     * @param string $datetime
     * @param string $format
     * @param bool   $exceptions
     *
     * @return $this
     * @throws Exception
     */
    public function before(string $datetime, string $format = 'Y-m-d', bool $exceptions = false): self
    {
        if ($timestamp = $this->makeTimestamp($datetime, $format)) {
            $this->params[$this->beforeParam] = $timestamp;
        } elseif ($exceptions) {
            throw new Exception(sprintf('Incorrect datetime: %s or format: %s', $datetime, $format));
        }

        return $this;
    }

    /**
     * @param $datetime
     * @param $format
     *
     * @return int|false
     */
    private function makeTimestamp($datetime, $format)
    {
        $format = empty($format) ? 'Y-m-d' : $format;

        if ($datetime = DateTime::createFromFormat($format, $datetime)) {
            return $datetime->getTimestamp();
        }

        return false;
    }
}
