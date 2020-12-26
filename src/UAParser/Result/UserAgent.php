<?php

    namespace UAParser\Result;

    /**
     * Class UserAgent
     * @package UAParser\Result
     */
    class UserAgent extends AbstractVersionedSoftware
    {
        /**
         * @var string|null
         */
        public $major;

        /**
         * @var string|null
         */
        public $minor;

        /**
         * @var string|null
         */
        public $patch;

        /**
         * @return string
         */
        public function toVersion(): string
        {
            return $this->formatVersion($this->major, $this->minor, $this->patch);
        }
    }
