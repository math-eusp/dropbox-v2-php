<?php
    /**
     * Copyright (c) 2016 Alorel, https://github.com/Alorel
     * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
     */

    namespace Alorel\Dropbox\Options\Builder;

    use Alorel\Dropbox\Options\Mixins\AccessLevelTrait;
    use Alorel\Dropbox\Options\Mixins\AddMessageAsCommentTrait;
    use Alorel\Dropbox\Options\Mixins\CustomMessageTrait;
    use Alorel\Dropbox\Options\Mixins\QuietTrait;
    use Alorel\Dropbox\Options\Options;

    /**
     * Options for the add_file_member operation
     *
     * @author Art <a.molcanovas@gmail.com>
     * @see    https://www.dropbox.com/developers/documentation/http/documentation#sharing-add_file_member
     */
    class AddFileMemberOptions extends Options {
        use CustomMessageTrait;
        use QuietTrait;
        use AddMessageAsCommentTrait;
        use AccessLevelTrait;
    }