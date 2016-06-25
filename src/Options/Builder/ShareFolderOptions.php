<?php
    /**
     * Copyright (c) 2016 Alorel, https://github.com/Alorel
     * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
     */

    namespace Alorel\Dropbox\Options\Builder;

    use Alorel\Dropbox\Options\Mixins\ACLUpdatePolicyTrait;
    use Alorel\Dropbox\Options\Mixins\ForceAsyncTrait;
    use Alorel\Dropbox\Options\Mixins\MemberPolicyTrait;
    use Alorel\Dropbox\Options\Mixins\SharedLinkPolicyTrait;
    use Alorel\Dropbox\Options\Options;

    /**
     * Additional options for the share_folder operation
     *
     * @author Art <a.molcanovas@gmail.com>
     */
    class ShareFolderOptions extends Options {
        use ACLUpdatePolicyTrait;
        use MemberPolicyTrait;
        use SharedLinkPolicyTrait;
        use ForceAsyncTrait;
    }