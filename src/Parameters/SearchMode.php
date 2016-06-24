<?php
    /**
     * Copyright (c) 2016 Alorel, https://github.com/Alorel
     * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
     */

    namespace Alorel\Dropbox\Parameters;

    /**
     * What we're searching for<br/><br/>
     * Note: Recent changes may not immediately be reflected in search results due to a short delay in indexing.
     *
     * @author Art <a.molcanovas@gmail.com>
     * @see    https://www.dropbox.com/developers/documentation/http/documentation#files-search
     */
    class SearchMode extends AbstractTagParameter {

        /**
         * Search file and folder names.
         *
         * @author Art <a.molcanovas@gmail.com>
         * @return self
         */
        static function filename() {
            return new self(__FUNCTION__);
        }

        /**
         * Search file and folder names as well as file contents.
         *
         * @author Art <a.molcanovas@gmail.com>
         * @return self
         */
        static function filenameAndContent() {
            return new self('filename_and_content');
        }

        /**
         * Search for deleted file and folder names.
         *
         * @author Art <a.molcanovas@gmail.com>
         * @return self
         */
        static function deletedFilename() {
            return new self('deleted_filename');
        }
    }