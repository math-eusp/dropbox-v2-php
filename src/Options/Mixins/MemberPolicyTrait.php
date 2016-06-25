<?php
    /**
     * Copyright (c) 2016 Alorel, https://github.com/Alorel
     * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
     */

    namespace Alorel\Dropbox\Options\Mixins;

    use Alorel\Dropbox\Options\Option;
    use Alorel\Dropbox\Parameters\MemberPolicy;

    /**
     * Who can be a member of this shared folder. Only applicable if the current user is on a team. The default for
     * this union is anyone.
     *
     * @author Art <a.molcanovas@gmail.com>
     */
    trait MemberPolicyTrait {

        /**
         * Who can be a member of this shared folder. Only applicable if the current user is on a team. The default
         * for this union is anyone.
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param MemberPolicy $policy The policy
         *
         * @return self
         */
        function setMemberPolicy(MemberPolicy $policy) {
            $this[Option::MEMBER_POLICY] = $policy;

            return $this;
        }
    }