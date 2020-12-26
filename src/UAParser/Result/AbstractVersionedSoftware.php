<?php

    namespace UAParser\Result;

    /**
     * Class AbstractVersionedSoftware
     * @package UAParser\Result
     */
    abstract class AbstractVersionedSoftware extends AbstractSoftware
    {
        /**
         * @return string
         */
        abstract public function toVersion(): string;

        /**
         * @return string
         */
        public function toString(): string
        {
            return implode(' ', array_filter([$this->family, $this->toVersion()]));
        }

        /**
         * @param string|null ...$args
         * @return string
         */
        protected function formatVersion(?string ...$args): string
        {
            return implode('.', array_filter($args, 'is_numeric'));
        }
    }
