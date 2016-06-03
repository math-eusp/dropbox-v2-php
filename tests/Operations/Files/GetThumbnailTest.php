<?php
    /**
 * Copyright (c) 2016 Alorel, https://github.com/Alorel
 * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
 */

    namespace Alorel\Dropbox\Operations\Files;

    use Alorel\Dropbox\Operation\Files\Delete;
    use Alorel\Dropbox\Operation\Files\GetThumbnail;
    use Alorel\Dropbox\Operation\Files\Upload;
    use Alorel\Dropbox\Options\Builder\GetThumbnailOptions;
    use Alorel\Dropbox\Parameters\ThumbnailSize;

    class GetThumbnailTest extends \PHPUnit_Framework_TestCase {

        /** @long */
        function testGetThumbnail() {
            $opts = new GetThumbnailOptions();
            $op = new GetThumbnail();

            $sizes = [];
            $fname = '/' . md5(__METHOD__) . '.jpg';
            (new Upload())->raw($fname, file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . '_get-thumb.jpg'));
            try {
                foreach (['w32h32', 'w64h64', 'w128h128', 'w640h480', 'w1024h768'] as $d) {
                    $opts->setThumbnailSize(ThumbnailSize::$d());
                    $sizes[] = $op->raw($fname, $opts)->getBody()->getSize();
                }

                $numSizes = count($sizes);
                for ($i = 1; $i < $numSizes; $i++) {
                    $this->assertGreaterThanOrEqual($sizes[$i - 1], $sizes[$i]);
                }
            } finally {
                try {
                    (new Delete())->raw($fname);
                } catch (\Exception $e) {
                    fwrite(STDERR, $e->getMessage());
                }
            }
        }
    }