<?php
    /**
     * Copyright (c) 2016 Alorel, https://github.com/Alorel
     * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
     */

    namespace Alorel\Dropbox\Parameters;

    /**
     * Policy governing who can view shared links.
     *
     * @author Art <a.molcanovas@gmail.com>
     */
    class SharedLinkPolicy extends AbstractTagParameter {

        /**
         * Links can be shared with anyone.
         *
         * @author Art <a.molcanovas@gmail.com>
         * @return self
         */
        static function anyone() {
            return new self('anyone');
        }

        /**
         * Links can only be shared among members of the shared folder.
         *
         * @author Art <a.molcanovas@gmail.com>
         * @return self
         */
        static function members() {
            return new self('members');
        }
    }