<?php

    namespace UAParser\Exception;

    use InvalidArgumentException as BaseInvalidArgumentException;

    /***
     * Class InvalidArgumentException
     * @package UAParser\Exception
     */
    final class InvalidArgumentException extends BaseInvalidArgumentException
    {
        /**
         * @param string ...$args
         * @return static
         */
        public static function oneOfCommandArguments(string ...$args): self
        {
            return new self(
                sprintf('One of the command arguments "%s" is required', implode('", "', $args))
            );
        }
    }
