<?php

use Core\Container;

// https://laracasts.com/series/php-for-beginners-2023-edition/episodes/48 @ 9:30

test('It can resolve something out of the container', function () {
    // arrange
    $container = new Container;

    $container->bind('foo', fn() => 'bar');
    
    // act
    $result = $container->resolve('foo');

    // assert/expect
    expect($result)->toEqual('bar');
});