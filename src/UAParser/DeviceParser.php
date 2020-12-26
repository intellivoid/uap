<?php


    namespace UAParser;

    use UAParser\Result\Device;

    /**
     * Class DeviceParser
     * @package UAParser
     */
    class DeviceParser extends AbstractParser
    {
        use ParserFactoryMethods;

        /**
         * Attempts to see if the user agent matches a device regex from regexes.php
         *
         * @param string $userAgent
         * @return Device
         */
        public function parseDevice(string $userAgent): Device
        {
            $device = new Device();

            [$regex, $matches] = self::tryMatch($this->regexes['device_parsers'], $userAgent);

            if ($matches) {
                $device->family = self::multiReplace($regex, 'device_replacement', $matches[1], $matches) ?? $device->family;
                $device->brand = self::multiReplace($regex, 'brand_replacement', null, $matches);
                $deviceModelDefault = $matches[1] !== 'Other' ? $matches[1] : null;
                $device->model = self::multiReplace($regex, 'model_replacement', $deviceModelDefault, $matches);
            }

            return $device;
        }
    }
