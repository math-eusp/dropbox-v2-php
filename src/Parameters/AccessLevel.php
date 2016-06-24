<?php
    /**
     * Copyright (c) 2016 Alorel, https://github.com/Alorel
     * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
     */

    namespace Alorel\Dropbox\Parameters;

    /**
     * The access level to give. Default is "viewer"
     *
     * @author Art <a.molcanovas@gmail.com>
     */
    class AccessLevel extends AbstractTagParameter {

        /**
         * The collaborator is the owner of the shared folder. Owners can view and edit the shared folder as well as
         * set the folder's policies using update_folder_policy.
         *
         * @author Art <a.molcanovas@gmail.com>
         * @return self
         */
        static function owner() {
            return new self(__FUNCTION__);
        }

        /**
         * The collaborator can both view and edit the shared folder.
         *
         * @author Art <a.molcanovas@gmail.com>
         * @return self
         */
        static function editor() {
            return new self(__FUNCTION__);
        }

        /**
         * The collaborator can only view the shared folder.
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param bool $canAccessComments If set to false, the viewer will not have any access to comments.
         *
         * @return self
         */
        static function viewer($canAccessComments = true) {
            return new self($canAccessComments ? __FUNCTION__ : 'viewer_no_comment');
        }
    }