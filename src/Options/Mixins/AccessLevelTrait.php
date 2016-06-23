<?php
    /**
     * Copyright (c) 2016 Alorel, https://github.com/Alorel
     * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
     */

    /**
     * Created by PhpStorm.
     * User: Art
     * Date: 23/06/2016
     * Time: 22:35
     */

    namespace Alorel\Dropbox\Options\Mixins;

    use Alorel\Dropbox\Options\Option;

    /**
     * What access level the members will have
     *
     * @author Art <a.molcanovas@gmail.com>
     */
    trait AccessLevelTrait {

        /**
         * What access level the members will have. Please use one of the constants in the
         * {@link \Alorel\Dropbox\Parameters\AccessLevel AccessLevel} class to protect against format changes and human
         * error
         *
         * @param string $level The access level
         *
         * @return self
         */
        function setAccessLevel($level) {
            $this[Option::ACCESS_LEVEL] = $level;

            return $this;
        }
    }