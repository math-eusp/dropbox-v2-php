<?php
    /**
     * Copyright (c) 2016 Alorel, https://github.com/Alorel
     * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
     */

    namespace Alorel\Dropbox\Short;

    use Alorel\Dropbox\Util;

    class UtilTest extends \PHPUnit_Framework_TestCase {

        /** @dataProvider pTypeOf */
        function testTypeOf($item, $out) {
            $this->assertEquals($out, Util::typeof($item));
        }

        function pTypeOf() {
            foreach ([true, 1, 'foo', [], null] as $i) {
                $t = gettype($i);
                yield $t => [$i, $t];
            }

            yield self::class => [new self(), self::class];
        }

        function testTrimNulls() {
            $raw = [false, 1, 'foo', new self(), [], null];
            $out = Util::trimNulls($raw);
            array_pop($raw);
            $this->assertEquals($raw, $out);
        }
    }
