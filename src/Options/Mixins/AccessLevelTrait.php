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
    use Alorel\Dropbox\Parameters\AccessLevel;

    /**
     * What access level the members will have
     *
     * @author Art <a.molcanovas@gmail.com>
     */
    trait AccessLevelTrait {

        /**
         * Set the access level the members will have.
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param AccessLevel $level The access level
         *
         * @return self
         */
        function setAccessLevel(AccessLevel $level) {
            $this[Option::ACCESS_LEVEL] = $level;

            return $this;
        }
    }