<?php

use Core\Validator;

it('validates a string correctly', function () {
    expect(Validator::string('Hello, World!'))->toBeTrue();
    expect(Validator::string(false))->toBeFalse();
    expect(Validator::string(''))->toBeFalse();

});

it('validates a string with minimum characters', function () {
    expect(Validator::string('Hello', 255, 5))->toBeTrue();
    expect(Validator::string('Hello, World!', 255, 5))->toBeTrue();
    expect(Validator::string('Hi', 255, 5))->toBeFalse();
});

it('validates a string with maximum characters', function () {
    expect(Validator::string('Hello', 10))->toBeTrue();
    expect(Validator::string('Hello, World!', 20))->toBeTrue();
    expect(Validator::string(str_repeat('a', 300), 255))->toBeFalse();
});

it('validates an email correctly', function () {
    expect(Validator::email('foobar'))->toBeFalse();
    expect(Validator::email('foo@bar'))->toBeFalse();
    expect(Validator::email('foobar@baz.'))->toBeFalse();
    expect(Validator::email('foobar@example.com'))->toBeTrue();
});
