<?php
    /**
     * Copyright (c) 2016 Alorel, https://github.com/Alorel
     * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
     */

    namespace Alorel\Dropbox\Parameters;

    /**
     * The format for the thumbnail image, jpeg (default) or png. For images that are photos, jpeg should be
     * preferred, while png is better for screenshots and digital arts. The default for this union is jpeg.
     *
     * @author Art <a.molcanovas@gmail.com>
     */
    class ThumbnailFormat extends AbstractTagParameter {

        /**
         * Set the image format to JPEG
         *
         * @author Art <a.molcanovas@gmail.com>
         * @return self
         */
        static function jpeg() {
            return new self(__FUNCTION__);
        }

        /**
         * Set the image format to PNG
         *
         * @author Art <a.molcanovas@gmail.com>
         * @return self
         */
        static function png() {
            return new self(__FUNCTION__);
        }

        /**
         * Return the available formats
         *
         * @author Art <a.molcanovas@gmail.com>
         * @return array
         */
        static function availableFormats() {
            return ['jpeg', 'png'];
        }
    }