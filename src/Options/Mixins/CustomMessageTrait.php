<?php
    /**
     * Copyright (c) 2016 Alorel, https://github.com/Alorel
     * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
     */

    /**
     * Created by PhpStorm.
     * User: Art
     * Date: 23/06/2016
     * Time: 22:13
     */

    namespace Alorel\Dropbox\Options\Mixins;

    use Alorel\Dropbox\Options\Option;

    /**
     * Message to send to added members in their invitation
     *
     * @author Art <a.molcanovas@gmail.com>
     */
    trait CustomMessageTrait {

        /**
         * Message to send to added members in their invitation
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param string $message The message
         *
         * @return self
         */
        function setCustomMessage($message) {
            $this[Option::CUSTOM_MESSAGE] = $message;

            return $this;
        }
    }