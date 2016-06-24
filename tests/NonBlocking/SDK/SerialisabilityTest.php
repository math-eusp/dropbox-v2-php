<?php

    namespace Alorel\Dropbox;

    use Alorel\Dropbox\Options\Options;

    class SerialisabilityTest extends \PHPUnit_Framework_TestCase {

        /** @var array */
        private static $dataToAdd;

        /** @var  Options */
        private static $opts;

        static function setUpBeforeClass() {
            self::$dataToAdd = [
                'foo' => 'bar',
                'qux' => 'baz'
            ];

            self::$opts = new Options(self::$dataToAdd);
        }

        function testJsonEncodeOptions() {
            $this->assertEquals(json_encode(self::$dataToAdd), json_encode(self::$opts));
        }

        function testJsonSerializeOptions() {
            $serial = serialize(self::$opts);
            $this->assertEquals(self::$opts, unserialize($serial));
            $this->assertContains(json_encode(self::$dataToAdd), $serial);
        }
    }