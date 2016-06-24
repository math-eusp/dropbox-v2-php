<?php
    /**
     * Copyright (c) 2016 Alorel, https://github.com/Alorel
     * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
     */

    namespace Alorel\Dropbox\Parameters;

    /**
     * Policy governing who can change a shared folder's access control list (ACL). In other words, who can add, remove, or change the privileges of members.
     *
     * @author Art <a.molcanovas@gmail.com>
     */
    class ACLUpdatePolicy extends AbstractTagParameter {

        /**
         * Only the owner can update the ACL.
         *
         * @author Art <a.molcanovas@gmail.com>
         * @return self
         */
        static function owner() {
            return new self(__FUNCTION__);
        }

        /**
         * Any editor can update the ACL. This may be further restricted to editors on the same team.
         *
         * @author Art <a.molcanovas@gmail.com>
         * @return self
         */
        static function editors() {
            return new self(__FUNCTION__);
        }
    }