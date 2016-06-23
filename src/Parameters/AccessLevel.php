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
    class AccessLevel extends AbstractParameter {

        /**
         * The collaborator is the owner of the shared folder. Owners can view and edit the shared folder as well as
         * set the folder's policies using update_folder_policy.
         *
         * @var string
         */
        const OWNER = 'owner';

        /**
         * The collaborator can both view and edit the shared folder.
         *
         * @var string
         */
        const EDITOR = 'editor';

        /**
         * The collaborator can only view the shared folder.
         *
         * @var string
         */
        const VIEWER = 'viewer';

        /**
         * The collaborator can only view the shared folder and does not have any access to comments.
         *
         * @var string
         */
        const VIEWER_NO_COMMENT = 'viewer_no_comment';
    }