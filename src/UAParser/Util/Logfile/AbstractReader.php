<?php


    namespace UAParser\Util\Logfile;

    use UAParser\Exception\ReaderException;

    /**
     * Class AbstractReader
     * @package UAParser\Util\Logfile
     */
    abstract class AbstractReader implements ReaderInterface
    {
        /**
         * @var ReaderInterface[]
         */
        private static $readers = [];

        /**
         * @param string $line
         * @return ReaderInterface
         */
        public static function factory(string $line): ReaderInterface
        {
            foreach (static::getReaders() as $reader)
            {
                if ($reader->test($line))
                {
                    return $reader;
                }
            }

            throw ReaderException::readerNotFound($line);
        }

        /**
         * @return ReaderInterface[]
         */
        private static function getReaders(): array
        {
            if (static::$readers)
            {
                return static::$readers;
            }

            static::$readers[] = new ApacheCommonLogFormatReader();

            return static::$readers;
        }

        /**
         * @param string $line
         * @return bool
         */
        public function test(string $line): bool
        {
            $matches = $this->match($line);

            return isset($matches['userAgentString']);
        }

        /**
         * @param string $line
         * @return string
         */
        public function read(string $line): string
        {
            $matches = $this->match($line);

            if (!isset($matches['userAgentString']))
            {
                throw ReaderException::userAgentParserError($line);
            }

            return $matches['userAgentString'];
        }

        /**
         * @param string $line
         * @return array
         */
        protected function match(string $line): array
        {
            if (preg_match($this->getRegex(), $line, $matches))
            {
                return $matches;
            }

            return [];
        }

        /**
         * @return mixed
         */
        abstract protected function getRegex();
    }
