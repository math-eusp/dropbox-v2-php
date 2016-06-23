<?php
    /**
     * Copyright (c) 2016 Alorel, https://github.com/Alorel
     * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
     */

    /**
     * Created by PhpStorm.
     * User: Art
     * Date: 23/06/2016
     * Time: 22:17
     */

    namespace Alorel\Dropbox\Options\Mixins;

    use Alorel\Dropbox\Options\Option;

    /**
     * If the custom message should be added as a comment on the file. The default for this field is False.
     *
     * @author Art <a.molcanovas@gmail.com>
     */
    trait AddMessageAsCommentTrait {

        /**
         * If the custom message should be added as a comment on the file. The default for this field is False.
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param bool $set The setting
         *
         * @return self
         */
        function setAddMessageAsComment($set) {
            $this[Option::ADD_MESSAGE_AS_COMMENT] = (bool)$set;

            return $this;
        }
    }