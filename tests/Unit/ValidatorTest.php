<?php

use Core\Validator;

it('Validates a string', function() {
    expect(Validator::string('foobar'))->toBeTrue();
    expect(Validator::string(false))->toBeFalse();
    expect(Validator::string(''))->toBeFalse();
});

it('Validates a string with a minimun length', function() {
    expect(Validator::string('foobar', 1))->toBeTrue();
    expect(Validator::string('foobar', 20))->toBeFalse();
});

it('Validates a string with a minimum and a maximun length', function () {
    expect(Validator::string('foobar', 1, 20))->toBeTrue();
    expect(Validator::string('foobar', 1, 5))->toBeFalse();
    expect(Validator::string('foobar', 10, 20))->toBeFalse();
});

it('Validates an email', function () {
    expect(Validator::email('foobar'))->toBeFalse();
    expect(Validator::email('foobar@example.com'))->toBeTrue();
});

it('Validates that a number is greater than another number', function () { 
    expect(Validator::greaterThan(20, 10))->toBeTrue;
    expect(Validator::greaterThan(10, 10))->toBeFalse;
    expect(Validator::greaterThan(10, 20))->toBeFalse;
});