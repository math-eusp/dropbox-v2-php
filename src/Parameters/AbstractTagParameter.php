<?php
    /**
     * Copyright (c) 2016 Alorel, https://github.com/Alorel
     * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
     */

    namespace Alorel\Dropbox\Parameters;

    use Alorel\Dropbox\Options\Option;

    /**
     * An abstract parameter that just has a tag
     *
     * @author Art <a.molcanovas@gmail.com>
     */
    abstract class AbstractTagParameter extends AbstractParameter {

        /**
         * AbstractTagParameter constructor.
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param string $tag Tag value
         */
        protected function __construct($tag) {
            parent::__construct([Option::DOT_TAG => $tag]);
        }
    }