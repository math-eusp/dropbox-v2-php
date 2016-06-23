<?php
    /**
     * Copyright (c) 2016 Alorel, https://github.com/Alorel
     * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
     */

    namespace Alorel\Dropbox\NonBlocking\Operations\Sharing;

    use Alorel\Dropbox\Operation\Files\GetMetadata;
    use Alorel\Dropbox\Operation\Files\Upload;
    use Alorel\Dropbox\Operation\Sharing\AddFileMember;
    use Alorel\Dropbox\Options\Builder\AddFileMemberOptions;
    use Alorel\Dropbox\Options\Builder\GetMetadataOptions;
    use Alorel\Dropbox\Parameters\Collections\MemberSelectors;
    use Alorel\Dropbox\Parameters\MemberSelector;
    use Alorel\Dropbox\Test\DBTestCase;
    use Alorel\Dropbox\Test\NameGenerator;
    use GuzzleHttp\Exception\ClientException;

    class AddFileMemberTest extends DBTestCase {

        use NameGenerator;

        private static $fname;

        static function setUpBeforeClass() {
            self::$fname = self::genFileName();

            for ($i = 0; $i < 10; $i++) {
                try {
                    (new Upload())->raw(self::$fname, '.');

                    return;
                } catch (ClientException $e) {

                }
            }
        }

        private static function has() {
            $getMetadata = new GetMetadata();
            $metaOptions = (new GetMetadataOptions())->setIncludeHasExplicitSharedMembers(true);

            return json_decode(
                       $getMetadata->raw(self::$fname, $metaOptions)->getBody()->getContents(),
                       true
                   )['has_explicit_shared_members'];
        }

        /** @large */
        function testAddFileMember() {
            $this->assertFalse(self::has());

            $selectors = new MemberSelectors(
                MemberSelector::email(md5(uniqid()) . '@fakeemail.com')
            );
            $addOpts = (new AddFileMemberOptions())
                ->setQuiet(true);

            (new AddFileMember())->raw(self::$fname, $selectors, $addOpts);
            sleep(1);
            $this->assertTrue(self::has());
        }
    }
