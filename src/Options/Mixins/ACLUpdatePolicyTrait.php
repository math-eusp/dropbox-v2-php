<?php
    /**
     * Copyright (c) 2016 Alorel, https://github.com/Alorel
     * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
     */

    namespace Alorel\Dropbox\Options\Mixins;

    use Alorel\Dropbox\Options\Option;
    use Alorel\Dropbox\Parameters\ACLUpdatePolicy;

    /**
     * Who can add and remove members of this shared folder. The default for this union is owner.
     *
     * @author Art <a.molcanovas@gmail.com>
     */
    trait ACLUpdatePolicyTrait {

        /**
         * Who can add and remove members of this shared folder. The default for this union is owner.
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param ACLUpdatePolicy $policy The policy
         *
         * @return self
         */
        function setACLUpdatePolicy(ACLUpdatePolicy $policy) {
            $this[Option::ACL_UPDATE_POLICY] = $policy;

            return $this;
        }
    }