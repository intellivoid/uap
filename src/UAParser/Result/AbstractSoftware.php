<?php

    namespace UAParser\Result;

    /**
     * Class AbstractSoftware
     * @package UAParser\Result
     */
    abstract class AbstractSoftware extends AbstractClient
    {
        /**
         * @var string
         */
        public $family = 'Other';

        /**
         * @return string
         */
        public function toString(): string
        {
            return $this->family;
        }
    }
