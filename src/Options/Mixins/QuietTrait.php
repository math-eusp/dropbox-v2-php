<?php
    /**
     * Copyright (c) 2016 Alorel, https://github.com/Alorel
     * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
     */

    /**
     * Created by PhpStorm.
     * User: Art
     * Date: 23/06/2016
     * Time: 22:15
     */

    namespace Alorel\Dropbox\Options\Mixins;

    use Alorel\Dropbox\Options\Option;

    /**
     * Whether added members should be notified via device notifications of their invitation. The default for this
     * field is False.
     *
     * @author Art <a.molcanovas@gmail.com>
     */
    trait QuietTrait {

        /**
         * Whether added members should be notified via device notifications of their invitation. The default for
         * this field is False.
         *
         * @param bool $set The setting
         *
         * @return self
         */
        function setQuiet($set) {
            $this[Option::QUIET] = (bool)$set;

            return $this;
        }
    }