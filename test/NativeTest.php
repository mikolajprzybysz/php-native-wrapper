<?php

namespace PhpNativeWrapper;

/**
 * This is the test of Native class.
 *
 * PHP version 5.5
 *
 * @author    Mikolaj Przybysz <mikolaj.przybysz@gmail.com>
 * @license   MIT
 * @link      https://github.com/mikolajprzybysz/php-native-wrapper
 */
class NativeTest extends \PHPUnit_Framework_TestCase
{
    public function testTime()
    {
        $native = new Native();
        $time = $native->time();
        $time_real = time();

        $this->assertSame($time_real, $time);
    }

    public function testSort()
    {
        $input  = [3, 1, 2];
        $native = new Native();
        $output = $native->sort($input);
        $expected = [1, 2, 3];

        $this->assertTrue($output);
        $this->assertSame($expected, $input);
    }
}
