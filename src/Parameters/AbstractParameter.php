<?php
    /**
     * Copyright (c) 2016 Alorel, https://github.com/Alorel
     * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
     */

    namespace Alorel\Dropbox\Parameters;

    use Alorel\Dropbox\Util;
    use JsonSerializable;
    use Serializable;

    /**
     * Topmost abstract parameter class
     *
     * @author Art <a.molcanovas@gmail.com>
     */
    abstract class AbstractParameter implements JsonSerializable, Serializable {

        /**
         * Parameter arguments
         *
         * @var array
         */
        private $args;

        /**
         * AbstractParameter constructor.
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param array $args Arguments to set
         */
        protected function __construct(array $args = []) {
            $this->args = Util::trimNulls($args);
        }

        /**
         * Add an unnamed argument
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param mixed $value Argument value
         *
         * @return self
         */
        protected function addArg($value) {
            if ($value !== null) {
                $this->args[] = $value;
            }

            return $this;
        }

        /**
         * Sets an argument value
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param string $key   The argument
         * @param mixed  $value The value
         *
         * @return self
         */
        protected function setArg($key, $value) {
            if ($value !== null) {
                $this->args[$key] = $value;
            }

            return $this;
        }

        /**
         * Specify data which should be serialized to JSON
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @see    http://php.net/manual/en/jsonserializable.jsonserialize.php
         * @return array data which can be serialized by <b>json_encode</b>, which is a value of any type other than
         * a resource.
         */
        function jsonSerialize() {
            return $this->args;
        }

        /**
         * String representation of object
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @link   http://php.net/manual/en/serializable.serialize.php
         * @return string the string representation of the object or null
         */
        public function serialize() {
            return json_encode($this);
        }

        /**
         * Constructs the object
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @link   http://php.net/manual/en/serializable.unserialize.php
         *
         * @param string $serialized The string representation of the object.
         *
         * @return void
         */
        public function unserialize($serialized) {
            $this->args = json_decode($serialized, true);
        }

        /**
         * A shorthand for JSON-encoding parameters
         *
         * @author Art <a.molcanovas@gmail.com>
         * @return string
         * @uses   json_encode()
         */
        function __toString() {
            return json_encode($this);
        }
    }