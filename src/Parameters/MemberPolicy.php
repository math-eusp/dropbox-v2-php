<?php
    /**
     * Copyright (c) 2016 Alorel, https://github.com/Alorel
     * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
     */

    namespace Alorel\Dropbox\Parameters;

    /**
     * Policy governing who can be a member of a shared folder. Only applicable to folders owned by a user on a team.
     *
     * @author Art <a.molcanovas@gmail.com>
     */
    class MemberPolicy extends AbstractTagParameter {

        /**
         * Only a teammate can become a member.
         *
         * @author Art <a.molcanovas@gmail.com>
         * @return self
         */
        static function team() {
            return new self(__FUNCTION__);
        }

        /**
         * Anyone can become a member.
         *
         * @author Art <a.molcanovas@gmail.com>
         * @return self
         */
        static function anyone() {
            return new self(__FUNCTION__);
        }
    }