<?php

namespace PhpNativeWrapper;

/**
 * This class enables you to run php function from global namespace
 * as methods of this class which will enable you to mock them easly.
 *
 * Example:
 * $native = new Native();
 * $x = $native->time();
 * $native->sleep(1);
 * $y = $native->time();
 * echo $y - $x;
 *
 * Result:
 * 1
 *
 * PHP version 5.5
 *
 * @author    Mikolaj Przybysz <mikolaj.przybysz@gmail.com>
 * @license   MIT
 * @link      https://github.com/mikolajprzybysz/php-native-wrapper
 *
 * @method int time ( void )
 * @method int sleep ( int $seconds )
 * @method string gethostname ( void )
 */
class Native
{
    /**
     * Calls native method via this class. If function returns result
     * it will be returned otherwise function returns null.
     *
     * @param string $name      name of the function to be called
     * @param array  $arguments list of arguments for method that will be called
     *
     * @return mixed
     */
    public function __call($name, array $arguments)
    {

        $result = null;

        $functionExist = function_exists($name);

        if ($functionExist) {
            $result = call_user_func_array($name, $arguments);
        } else {
            $trace = debug_backtrace();

            $file = $trace[0]['file'];
            $line = $trace[0]['line'];
            trigger_error(
                "Undefined function: $name in $file on line $line.", E_USER_ERROR
            );
        }

        return $result;
    }
}
