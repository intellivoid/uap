<?php

    namespace UAParser;

    use UAParser\Exception\FileNotFoundException;
    use function dirname;
    use const DIRECTORY_SEPARATOR;

    /**
     * Trait ParserFactoryMethods
     * @package UAParser
     */
    trait ParserFactoryMethods
    {
        /** @var string */
        public static $defaultFile;

        /**
         * Create parser instance
         * @return ParserFactoryMethods
         * @throws FileNotFoundException
         */
        public static function create(): self
        {
            return self::createCustom(__DIR__ . DIRECTORY_SEPARATOR . "regexes.php");
        }

        /**
         * @return static
         * @throws FileNotFoundException
         */
        protected static function createDefault(): self
        {
            return self::createInstance(
                self::getDefaultFile(),
                [FileNotFoundException::class, 'defaultFileNotFound']
            );
        }

        /** @throws FileNotFoundException */
        protected static function createCustom(string $file): self
        {
            return self::createInstance(
                $file,
                [FileNotFoundException::class, 'customRegexFileNotFound']
            );
        }

        /**
         * @param string $file
         * @param callable $exceptionFactory
         * @return static
         */
        private static function createInstance(string $file, callable $exceptionFactory): self
        {
            if (!file_exists($file)) {
                throw $exceptionFactory($file);
            }

            static $map = [];
            if (!isset($map[$file])) {
                $map[$file] = include $file;
            }

            return new self($map[$file]);
        }

        /**
         * @return string
         */
        protected static function getDefaultFile(): string
        {
            return self::$defaultFile ?: dirname(__DIR__).'/resources'.DIRECTORY_SEPARATOR.'regexes.php';
        }
    }
