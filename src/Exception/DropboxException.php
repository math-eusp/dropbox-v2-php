<?php
    /**
     * Copyright (c) 2016 Alorel, https://github.com/Alorel
     * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
     */

    namespace Alorel\Dropbox\Exception;

    /**
     * Exception wrapper
     *
     * @author Art <a.molcanovas@gmail.com>
     */
    interface DropboxException {

        /**
         * Code for when the API key is not provided
         *
         * @var int
         */
        const NO_TOKEN = 1;

        /**
         * Code when a {@link \Alorel\Dropbox\Parameters\MemberSelector MemberSelector} is expected, but a different type is received
         *
         * @var int
         */
        const MUST_BE_MEMBER_SELECTOR = 2;
    }