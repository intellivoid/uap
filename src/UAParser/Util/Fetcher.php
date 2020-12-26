<?php


    namespace UAParser\Util;

    use Composer\CaBundle\CaBundle;
    use UAParser\Exception\FetcherException;

    /**
     * Class Fetcher
     * @package UAParser\Util
     */
    class Fetcher
    {
        /**
         * @var string
         */
        private $resourceUri = 'https://raw.githubusercontent.com/ua-parser/uap-core/master/regexes.yaml';

        /**
         * @var resource
         */
        private $streamContext;

        /**
         * Fetcher constructor.
         * @param null $streamContext
         */
        public function __construct($streamContext = null)
        {
            if (is_resource($streamContext) && get_resource_type($streamContext) === 'stream-context')
            {
                $this->streamContext = $streamContext;
            }
            else
            {
                $this->streamContext = stream_context_create(
                    [
                        'ssl' => [
                            'verify_peer' => true,
                            'verify_depth' => 10,
                            'cafile' => CaBundle::getSystemCaRootBundlePath(),
                            static::getPeerNameKey() => 'www.github.com',
                            'disable_compression' => true,
                        ]
                    ]
                );
            }
        }

        /**
         * @return string
         */
        public function fetch()
        {
            $level = error_reporting(0);
            $result = file_get_contents($this->resourceUri, false, $this->streamContext);
            error_reporting($level);

            if ($result === false)
            {
                $error = error_get_last();
                throw FetcherException::httpError($this->resourceUri, $error['message'] ?? 'Undefined error');
            }

            return $result;
        }

        /**
         * @return string
         */
        public static function getPeerNameKey(): string
        {
            return version_compare(PHP_VERSION, '5.6') === 1 ? 'peer_name' : 'CN_match';
        }
    }
