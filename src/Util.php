<?php
    /**
     * Copyright (c) 2016 Alorel, https://github.com/Alorel
     * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
     */

    namespace Alorel\Dropbox;

    /**
     * Miscellaneous utilities
     *
     * @author Art <a.molcanovas@gmail.com>
     */
    class Util {

        /**
         * Trims nulls from the input
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param array $in The input
         *
         * @return array The trimmed input
         */
        static function trimNulls(array $in) {
            foreach ($in as $k => $v) {
                if ($v === null) {
                    unset($in[$k]);
                }
            }

            return $in;
        }

        /**
         * Returns the type of the given item
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param mixed $item The item
         *
         * @return string
         */
        static function typeof($item) {
            $t = gettype($item);

            if ($t === 'object') {
                $t = get_class($t);
            }

            return $t;
        }
    }