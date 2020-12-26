<?php

    namespace UAParser\Exception;

    /**
     * Class ReaderException
     * @package UAParser\Exception
     */
    final class ReaderException extends DomainException
    {
        /**
         * @param string $line
         * @return static
         */
        public static function userAgentParserError(string $line): self
        {
            return new self(sprintf('Cannot extract user agent string from line "%s"', $line));
        }

        /**
         * @param string $line
         * @return static
         */
        public static function readerNotFound(string $line): self
        {
            return new self(sprintf('Cannot find reader that can handle "%s"', $line));
        }
    }
