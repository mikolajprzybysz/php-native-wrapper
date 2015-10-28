# Abstract (about)

This project provides class that can be used to proxy calls to regular
functions, therefore making them mockable like every other method call.

# Install (include in compsoer)

```
"require": {
    "mikolajprzybysz/php-native-wrapper": "^1.0.0"
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