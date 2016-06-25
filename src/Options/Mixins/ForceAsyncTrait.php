<?php
    /**
     * Copyright (c) 2016 Alorel, https://github.com/Alorel
     * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
     */

    namespace Alorel\Dropbox\Options\Mixins;

    use Alorel\Dropbox\Options\Option;

    /**
     * Whether to force the operation to happen asynchronously. The default for this field is False.
     *
     * @author Art <a.molcanovas@gmail.com>
     */
    trait ForceAsyncTrait {

        /**
         * Whether to force the operation to happen asynchronously. The default for this field is False.
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param bool $async The setting
         *
         * @return self
         */
        function setForceAsync($async) {
            $this[Option::FORCE_ASYNC] = (bool)$async;

            return $this;
        }
    }