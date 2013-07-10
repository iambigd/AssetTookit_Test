<?php
/*
 * This file is part of the {{ }} package.
 *
 * (c) Yo-An Lin <cornelius.howl@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */
require 'Universal/ClassLoader/BasePathClassLoader.php';
$classloader = new \Universal\ClassLoader\BasePathClassLoader(array( 
    'src', 'tests' , 'vendor/pear' ));
$classloader->useIncludePath(true);
$classloader->register();
require 'example/app.php';

$app = new ExampleApplication;
$app->run($argv);
