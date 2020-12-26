<?php

    namespace UAParser\Exception;

    /**
     * Class FetcherException
     * @package UAParser\Exception
     */
    final class FetcherException extends DomainException
    {
        /**
         * @param string $resource
         * @param string $error
         * @return static
         */
        public static function httpError(string $resource, string $error): self
        {
            return new self(
                sprintf('Could not fetch HTTP resource "%s": %s', $resource, $error)
            );
        }
    }
