<?php
    /**
     * Copyright (c) 2016 Alorel, https://github.com/Alorel
     * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
     */

    namespace Alorel\Dropbox\Short\Parameters;

    use Alorel\Dropbox\Options\Option as O;
    use Alorel\Dropbox\Parameters\Collections\MemberSelectors as Col;
    use Alorel\Dropbox\Parameters\MemberSelector as Sel;

    class MemberSelectorsTest extends \PHPUnit_Framework_TestCase {

        /** @var Sel[] */
        private static $DS = [];

        const I_TOP = 5;

        static function setUpBeforeClass() {
            for ($i = 0; $i < self::I_TOP; $i++) {
                self::$DS[] = Sel::email(__CLASS__ . $i);
            }
        }

        /** @dataProvider pMemberSelector */
        function testMemberSelector($method, $tag) {
            /** @var array $o */
            $o = call_user_func(Sel::class . '::' . $method, __METHOD__)->jsonSerialize();

            $this->assertTrue(isset($o[O::DOT_TAG]));
            $this->assertTrue(isset($o[$tag]));

            $this->assertEquals($tag, $o[O::DOT_TAG]);
            $this->assertEquals(__METHOD__, $o[$tag]);
        }

        function pMemberSelector() {
            yield 'dropbox_id' => ['dropboxID', 'dropbox_id'];
            yield 'email' => ['email', 'email'];
        }

        function testInitialDataset() {
            $this->assertEmpty((new Col())->jsonSerialize());
            /** @var Col[] $c */
            $c = (new Col(...self::$DS))->jsonSerialize();
            $this->assertEquals(self::I_TOP, count($c));

            for ($i = 0; $i < self::I_TOP; $i++) {
                $this->assertTrue(isset($c[$i]));
                $this->assertEquals([
                                        O::DOT_TAG => 'email',
                                        'email'    => __CLASS__ . $i
                                    ],
                                    $c[$i]->jsonSerialize());
            }
        }

        /**
         * @expectedException \InvalidArgumentException
         * @expectedExceptionCode 2
         */
        function testAddException() {
            (new Col(self::$DS[0]))->add('foo');
        }

        static function tearDownAfterClass() {
            self::$DS = null;
        }
    }
