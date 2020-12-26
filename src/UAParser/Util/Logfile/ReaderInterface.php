<?php

    namespace UAParser\Util\Logfile;

    /**
     * Interface ReaderInterface
     * @package UAParser\Util\Logfile
     */
    interface ReaderInterface
    {
        /**
         * @param string $line
         * @return bool
         */
        public function test(string $line): bool;

        /**
         * @param string $line
         * @return string
         */
        public function read(string $line): string;
    }
