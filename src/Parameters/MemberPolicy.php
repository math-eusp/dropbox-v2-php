<?php
    /**
     * Copyright (c) 2016 Alorel, https://github.com/Alorel
     * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
     */

    namespace Alorel\Dropbox\Parameters;

    use Alorel\Dropbox\Options\Option;

    /**
     * Who can be a member of this shared folder. Only applicable if the current user is on a team. The default for
     * this union is anyone.
     *
     * @author Art <a.molcanovas@gmail.com>
     */
    class MemberPolicy extends AbstractParameter {

        /**
         * Only a teammate can become a member.
         *
         * @var string
         */
        const TEAM = 'team';

        /**
         * Anyone can become a member.
         *
         * @var string
         */
        const ANYONE = 'anyone';

        protected function __construct($policy) {
            parent::__construct([Option::DOT_TAG => $policy]);
        }

        /**
         * Only a teammate can become a member.
         *
         * @author Art <a.molcanovas@gmail.com>
         * @return self
         */
        static function team() {
            return new self(self::TEAM);
        }

        /**
         * Anyone can become a member.
         *
         * @author Art <a.molcanovas@gmail.com>
         * @return self
         */
        static function anyone() {
            return new self(self::ANYONE);
        }
    }