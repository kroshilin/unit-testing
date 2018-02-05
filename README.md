## Simple calculator under test

This is a simple showcase of basic PHPUnit features

#### Installation and running

Clone this repository and run
```text
composer install
```

To use features of calculator run 
```text 
php src/index.php calc {{operation class name}} "{{argumens, separated with ','}}"
```

To run tests
```text
vendor/bin/phpunit tests --colors=always
```