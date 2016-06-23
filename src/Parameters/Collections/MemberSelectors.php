<?php
    /**
     * Copyright (c) 2016 Alorel, https://github.com/Alorel
     * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
     */

    namespace Alorel\Dropbox\Parameters\Collections;

    use Alorel\Dropbox\Exception\DropboxException;
    use Alorel\Dropbox\Parameters\AbstractParameter;
    use Alorel\Dropbox\Parameters\MemberSelector;
    use Alorel\Dropbox\Util;
    use InvalidArgumentException;

    /**
     * Collection of {@link MemberSelector}s
     *
     * @author Art <a.molcanovas@gmail.com>
     */
    class MemberSelectors extends AbstractParameter {

        /**
         * MemberSelectors constructor.
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param MemberSelector[] ...$initial The starter dataset
         */
        function __construct(...$initial) {
            parent::__construct();
            $this->add(...$initial);
        }

        /**
         * Add one or more {@link MemberSelector}s to the collection
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param MemberSelector[] ...$member
         *
         * @return self
         * @throws InvalidArgumentException If one or more of the arguments is not an instance of {@link MemberSelector}
         */
        function add(...$member) {
            foreach ($member as $p => $m) {
                if ($m instanceof MemberSelector) {
                    $this->addArg($m);
                } else {
                    throw new InvalidArgumentException(
                        sprintf(
                            '%s requires all its arguments to be instances of %s; argument at position %d was: %s',
                            __METHOD__,
                            MemberSelector::class,
                            $p,
                            Util::typeof($m)
                        ),
                        DropboxException::MUST_BE_MEMBER_SELECTOR
                    );
                }
            }

            return $this;
        }

    }