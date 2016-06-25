<?php
    /**
     * Copyright (c) 2016 Alorel, https://github.com/Alorel
     * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
     */

    namespace Alorel\Dropbox\Options\Mixins;

    use Alorel\Dropbox\Options\Option;
    use Alorel\Dropbox\Parameters\SharedLinkPolicy;

    /**
     * The policy to apply to shared links created for content inside this shared folder. The current user must be on
     * a team to set this policy to SharedLinkPolicy.members. The default for this union is anyone.
     *
     * @author Art <a.molcanovas@gmail.com>
     */
    trait SharedLinkPolicyTrait {

        /**
         * The policy to apply to shared links created for content inside this shared folder. The current user must
         * be on a team to set this policy to SharedLinkPolicy.members. The default for this union is anyone.
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param SharedLinkPolicy $policy The policy
         *
         * @return self
         */
        function setSharedLinkPolicy(SharedLinkPolicy $policy) {
            $this[Option::SHARED_LINK_POLICY] = $policy;

            return $this;
        }
    }