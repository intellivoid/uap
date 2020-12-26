<?php

    namespace UAParser\Util\Logfile;

    /**
     * Class ApacheCommonLogFormatReader
     * @package UAParser\Util\Logfile
     */
    class ApacheCommonLogFormatReader extends AbstractReader
    {
        /**
         * @return string
         */
        protected function getRegex(): string
        {
            return '@^
                (?:\S+)                                                 # IP
                \s+
                (?:\S+)
                \s+
                (?:\S+)
                \s+
                \[(?:[^:]+):(?:\d+:\d+:\d+) \s+ (?:[^\]]+)\]            # Date/time
                \s+
                \"(?:\S+)\s(?:.*?)                                      # Verb
                \s+
                (?:\S+)\"                                               # Path
                \s+
                (?:\S+)                                                 # Response
                \s+
                (?:\S+)                                                 # Length
                \s+
                (?:\".*?\")                                             # Referrer
                \s+
                \"(?P<userAgentString>.*?)\"                            # User Agent
            $@x';
        }
    }
