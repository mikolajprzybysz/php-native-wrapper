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
final class MockTest extends \PHPUnit_Framework_TestCase
{
    public function testGetTime()
    {
        $expectedOutput = 1337;
        $native = $this->getMock(Native::class, ['time']);
        $native->expects($this->once())
            ->method('time')
            ->will($this->returnValue($expectedOutput));

        $sample = new SampleClass($native);
        $time = $sample->getTime();

        $this->assertSame($expectedOutput, $time);
    }
}

/**
 * Sample test class
 */
final class SampleClass
{
    private $native;

    public function __construct(Native $native)
    {
        $this->native = $native;
    }
    /**
     * Method returns current timestamp
     *
     * @return int
     */
    public function getTime()
    {
        return $this->native->time();
    }
}
