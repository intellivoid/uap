<?php

    namespace UAParser\Exception;

    use Exception;

    /**
     * Class FileNotFoundException
     * @package UAParser\Exception
     */
    final class FileNotFoundException extends Exception
    {
        /**
         * @param string $file
         * @return static
         */
        public static function fileNotFound(string $file): self
        {
            return new self(sprintf('File "%s" does not exist', $file));
        }

        /**
         * @param string $file
         * @return static
         */
        public static function customRegexFileNotFound(string $file): self
        {
            return new self(
                sprintf(
                    'ua-parser cannot find the custom regexes file you supplied ("%s"). Please make sure you have the correct path.',
                    $file
                )
            );
        }

        /**
         * @param string $file
         * @return static
         */
        public static function defaultFileNotFound(string $file): self
        {
            return new self(
                sprintf(
                    'Please download the "%s" file before using ua-parser by running "php bin/uaparser ua-parser:update"',
                    $file
                )
            );
        }
    }
