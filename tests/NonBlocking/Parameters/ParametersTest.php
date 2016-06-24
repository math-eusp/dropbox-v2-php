<?php
    /**
     * Copyright (c) 2016 Alorel, https://github.com/Alorel
     * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
     */

    namespace Alorel\Dropbox\Parameters;

    use Alorel\Dropbox\Options\Option;
    use Alorel\Dropbox\Options\Options;
    use Alorel\Dropbox\Test\_AbstractParameter;
    use Alorel\Dropbox\Test\DBTestCase;
    use Alorel\Dropbox\Test\TestUtil;

    class ParametersTest extends DBTestCase {

        protected function constructedAbstraction($class, array $args, array $expectedArray) {
            $this->abstraction(new $class(...$args), $expectedArray);
        }

        protected function factoryAbstraction($class, $method, array $args, array $expectedArray) {
            $this->abstraction(call_user_func_array("$class::$method", $args), $expectedArray);
        }

        protected function abstraction(AbstractParameter $c, array $expectedArray) {
            $j = $c->jsonSerialize();
            $expect = TestUtil::formatParameterArgs($expectedArray);
            $json = json_encode($expect);

            $this->assertEquals($expect, $j);
            $this->assertEquals($json, json_encode($j));
            $this->assertEquals($json, (string)$c);
        }

        function testAddArgNonNull() {
            $abs = new _AbstractParameter();

            for ($i = 0; $i < 5; $i++) {
                $addVal = uniqid(__METHOD__);
                $this->assertEquals($i, count($abs->jsonSerialize()));
                $abs->addArgBridge($addVal);
                $this->assertEquals($i + 1, count($abs->jsonSerialize()));
                $this->assertEquals($addVal, $abs->jsonSerialize()[$i]);
            }
        }

        function testAddArgNull() {
            $abs = new _AbstractParameter();
            $this->assertEquals(0, count($abs->jsonSerialize()));
            $this->assertInstanceOf(_AbstractParameter::class, $abs->addArgBridge(__METHOD__));
            $this->assertEquals(1, count($abs->jsonSerialize()));
            $abs->addArgBridge(null);
            $this->assertEquals(1, count($abs->jsonSerialize()));
        }

        /** @dataProvider pMemberPolicy */
        function testMemberPolicy($p) {
            $e = ['.tag' => $p];
            $this->factoryAbstraction(MemberPolicy::class, $p, [], $e);
        }

        function pMemberPolicy() {
            yield ['team'];
            yield ['anyone'];
        }

        /** @dataProvider pACLUpdatePolicy */
        function testACLUpdatePolicy($p) {
            $e = ['.tag' => $p];
            $this->factoryAbstraction(ACLUpdatePolicy::class, $p, [], $e);
        }

        function pACLUpdatePolicy() {
            yield ['editors'];
            yield ['owner'];
        }

        /** @dataProvider thumbnailFormat */
        function testThumbnailFormat($format) {
            $expect = [
                '.tag' => $format
            ];
            $this->factoryAbstraction(ThumbnailFormat::class, $format, [], $expect);
        }

        function thumbnailFormat() {
            yield 'jpeg' => ['jpeg'];
            yield 'png' => ['png'];
        }

        /** @dataProvider thumbnailSize */
        function testThumbnailSize($width, $height) {
            $method = 'w' . $width . 'h' . $height;
            $expect = ['.tag' => $method];
            $this->factoryAbstraction(ThumbnailSize::class, $method, [], $expect);
        }

        function thumbnailSize() {
            yield '32x32' => [32, 32];
            yield  '64x64' => [64, 64];
            yield  '128x128' => [128, 128];
            yield  '640x480' => [640, 480];
            yield  '1024x768' => [1024, 768];
        }

        /** @dataProvider writeMode */
        function testWriteMode($tag, $rev = null) {
            $expect = [
                '.tag' => $tag
            ];
            if ($rev) {
                $expect['update'] = $rev;
            }

            $this->factoryAbstraction(WriteMode::class, $tag, $rev ? [$rev] : [], $expect);
        }

        function writeMode() {
            yield 'add' => ['add'];
            yield 'overwrite' => ['overwrite'];
            yield 'update' => ['update', __CLASS__];
        }

        /** @dataProvider searchMode */
        function testSearchMode($method, $value) {

            $this->factoryAbstraction(SearchMode::class,
                                      $method,
                                      [],
                                      [
                                          Option::DOT_TAG => $value
                                      ]);
        }

        function searchMode() {
            yield 'filename' => ['filename', 'filename'];
            yield 'filenameAndContent' => ['filenameAndContent', 'filename_and_content'];
            yield 'deletedFilename' => ['deletedFilename', 'deleted_filename'];
        }

        /** @dataProvider uploadSessionCursor */
        function testUploadSessionCursor($offset = 0) {
            $expect = [
                'session_id' => __METHOD__,
                'offset'     => $offset
            ];
            $this->constructedAbstraction(UploadSessionCursor::class, [__METHOD__, $offset], $expect);
        }

        function uploadSessionCursor() {
            yield   'Both set' => [PHP_INT_MAX];
            yield   'No offset' => [];
        }

        /** @dataProvider commitInfo */
        function testCommitInfo(array $expectedArray,
                                WriteMode $writeMode = null,
                                $autorename = false,
                                $mute = false,
                                \DateTimeInterface $clientModified = null) {
            $this->constructedAbstraction(CommitInfo::class,
                                          [
                                              __CLASS__,
                                              $writeMode,
                                              $autorename,
                                              $mute,
                                              $clientModified
                                          ],
                                          $expectedArray);
        }

        function commitInfo() {
            $dt = new \DateTime();

            yield 'AllParamsSet' => [
                [
                    'path'            => __CLASS__,
                    'mode'            => WriteMode::add(),
                    'autorename'      => true,
                    'client_modified' => $dt->format(Options::DATETIME_FORMAT),
                    'mute'            => true
                ],
                WriteMode::add(),
                true,
                true,
                $dt
            ];
            yield 'SomeParamsSet' => [
                [
                    'path'       => __CLASS__,
                    'mode'       => WriteMode::overwrite(),
                    'autorename' => false,
                    'mute'       => true
                ],
                WriteMode::overwrite(),
                false,
                true
            ];
        }
    }
