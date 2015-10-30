# Abstract (about)

This project provides class that can be used to proxy calls to regular
functions, therefore making them mockable like every other method call.

# Install (include in composer)

```json
"require": {
    "mikolajprzybysz/php-native-wrapper": "^1.0.0"
}
```

# How to use:

1.Add `Native` class as dependency to the class using native calls

Via constructor
```php
class SampleClass {
    /** @var Native */
    protected $native;
    public function __construct(Native $native){
        $this->native = $native;
    }
}
```
Via setter
```php
class SampleClass {
    /** @var Native */
    protected $native;
    public function setNative(Native $native){
        $this->native = $native;
    }
}
```
2.Whenever you need to run native function, call it via $native instance:
```php
class SampleClass {
    /** @var Native */
    protected $native;
    public function sampleMethod(){
        return $native->time();
    }
}
```
3.Mock it as any other class
```php
class SampleClassTest extends \PHPUnit_Framework_TestCase {
    public function testSampleMethod(){
        $sampleTime = 123;
        $nativeMock = $this->getMock(Native::class);
        $nativeMock->expects($this->once())->method('time')->will($this->returnValue($sampleTime));
        $testObject = new SampleClass($nativeMock);
        $result = $testObject->sampleMethod();
        $this->assertEquals($sampleTime, $result);
    }
}
```

# Unit test

```
./vendor/bin/phpunit test/MockTest.php --bootstrap vendor/autoload.php
```

# Acceptance test

```
./vendor/bin/phpunit test/MockTest.php --bootstrap vendor/autoload.php
```

# What it does not support
* extract
*
