<?php
    /**
     * Copyright (c) 2016 Alorel, https://github.com/Alorel
     * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
     */

    namespace Alorel\Dropbox\NonBlocking\Operations\Sharing;

    use AloFramework\Common\Alo;
    use Alorel\Dropbox\Operation\Files\CreateFolder;
    use Alorel\Dropbox\Operation\Files\Delete;
    use Alorel\Dropbox\Operation\Sharing\ShareFolder;
    use Alorel\Dropbox\Options\Builder\ShareFolderOptions;
    use Alorel\Dropbox\Parameters\ACLUpdatePolicy;
    use Alorel\Dropbox\Parameters\SharedLinkPolicy;
    use Alorel\Dropbox\Test\DBTestCase;
    use GuzzleHttp\Exception\ClientException;

    //@todo check async job ID
    class ShareFolderTest extends DBTestCase {

        function testShareFolderSync() {
            $fname = '/' . strtolower(Alo::getUniqid('sha512', __METHOD__));

            try {
                (new CreateFolder())->raw($fname);
                $opts = (new ShareFolderOptions())
                    ->setACLUpdatePolicy(ACLUpdatePolicy::owner())
                    ->setSharedLinkPolicy(SharedLinkPolicy::anyone());

                $sf = json_decode(
                    (new ShareFolder())->raw($fname, $opts)->getBody()->getContents(),
                    true
                );

                $this->assertArrayNotHasKey('async_job_id', $sf);
                $this->assertArrayHasKey('policy', $sf);
                $this->assertArrayHasKey('acl_update_policy', $sf['policy']);
                $this->assertArrayHasKey('shared_link_policy', $sf['policy']);

                $this->assertEquals(['.tag' => 'owner'], $sf['policy']['acl_update_policy']);
                $this->assertEquals(['.tag' => 'anyone'], $sf['policy']['shared_link_policy']);
            } finally {
                try {
                    (new Delete())->raw($fname);
                } catch (ClientException $e) {

                }
            }
        }

        function testShareFolderAsync() {
            $fname = '/' . strtolower(Alo::getUniqid('sha512', __METHOD__));
            $opts = (new ShareFolderOptions())->setForceAsync(true);

            try {
                (new CreateFolder())->raw($fname);

                $sf = json_decode(
                    (new ShareFolder())->raw($fname, $opts)->getBody()->getContents(),
                    true
                );

                $this->assertArrayHasKey('async_job_id', $sf);
            } finally {
                try {
                    (new Delete())->raw($fname);
                } catch (ClientException $e) {

                }
            }
        }
    }
