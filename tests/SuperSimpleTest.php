<?php

echo "Testing incrementation operation\n";

$incrementation = new \Calc\Operations\Incrementation();

echo "Checking result of 1++\n";

$incrementation->setArguments([1]);

$x = $incrementation->run();

assert($x == 2, "Will check if given value was incremented");

/*********/

echo "Testing multiplication operation\n";

$multiplication = new \Calc\Operations\Multiplication();

echo "Checking result of 4*3\n";

$multiplication->setArguments([3, 4]);

$x = $multiplication->run();

assert($x == 12, "Check if given values were multiplied");