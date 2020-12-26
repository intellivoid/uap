<?php

    namespace UAParser\Result;

    /**
     * Class Client
     * @package UAParser\Result
     */
    class Client extends AbstractClient
    {
        /**
         * @var UserAgent
         */
        public $ua;

        /**
         * @var OperatingSystem
         */
        public $os;

        /**
         * @var Device
         */
        public $device;

        /**
         * @var string
         */
        public $originalUserAgent;

        /**
         * Client constructor.
         * @param string $originalUserAgent
         */
        public function __construct(string $originalUserAgent)
        {
            $this->originalUserAgent = $originalUserAgent;
        }

        /**
         * @return string
         */
        public function toString(): string
        {
            return $this->ua->toString().'/'.$this->os->toString();
        }
    }
