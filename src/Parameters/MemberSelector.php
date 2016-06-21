<?php
    /**
     * Copyright (c) 2016 Alorel, https://github.com/Alorel
     * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
     */

    namespace Alorel\Dropbox\Parameters;

    use Alorel\Dropbox\Options\Option;

    /**
     * Includes different ways to identify a member of a shared item. The value will be one of the following datatypes. New
     * values may be introduced as the Dropbox API evolves.
     *
     * @author Art <a.molcanovas@gmail.com>
     */
    class MemberSelector extends AbstractParameter {

        /**
         * The Dropbox ID tag
         *
         * @var string
         */
        const DROPBOX_ID = 'dropbox_id';

        /**
         * The email tag
         *
         * @var string
         */
        const EMAIL = 'email';

        /**
         * MemberSelector constructor.
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param string $tag        What the identifier is
         * @param string $identifier The identifier
         */
        protected function __construct($tag, $identifier) {
            parent::__construct([
                                    Option::DOT_TAG => $tag,
                                    $tag            => $identifier
                                ]);
        }

        /**
         * Constructs a member selector from a Dropbox ID
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param string $id Dropbox account, team member, or group ID of member.
         *
         * @return self
         */
        static function dropboxID($id) {
            return new self(self::DROPBOX_ID, $id);
        }

        /**
         * Constructs a member selector from their email
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param string $email Email address of member.
         *
         * @return self
         */
        static function email($email) {
            return new self(self::EMAIL, $email);
        }
    }