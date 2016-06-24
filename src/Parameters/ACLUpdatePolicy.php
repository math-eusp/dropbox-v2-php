<?php
    /**
     * Copyright (c) 2016 Alorel, https://github.com/Alorel
     * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
     */

    namespace Alorel\Dropbox\Parameters;

    use Alorel\Dropbox\Options\Option;

    /**
     * Who can add and remove members of this shared folder. The default for this union is owner.
     *
     * @author Art <a.molcanovas@gmail.com>
     */
    class ACLUpdatePolicy extends AbstractParameter {

        /**
         * Only the owner can update the ACL.
         *
         * @var string
         */
        const OWNER = 'owner';

        /**
         * Any editor can update the ACL. This may be further restricted to editors on the same team.
         *
         * @var string
         */
        const EDITORS = 'editors';

        /**
         * ACLUpdatePolicy constructor.
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param string $policy The policy to apply
         */
        protected function __construct($policy) {
            parent::__construct([Option::DOT_TAG => $policy]);
        }

        /**
         * Only the owner can update the ACL.
         *
         * @author Art <a.molcanovas@gmail.com>
         * @return self
         */
        static function owner() {
            return new self(self::OWNER);
        }

        /**
         * Any editor can update the ACL. This may be further restricted to editors on the same team.
         *
         * @author Art <a.molcanovas@gmail.com>
         * @return self
         */
        static function editors() {
            return new self(self::EDITORS);
        }
    }