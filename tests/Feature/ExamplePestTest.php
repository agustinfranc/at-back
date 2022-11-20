<?php

test('expect true to be true', function () {
    // assertion
    $this->assertTrue(true);

    // expectation
    expect(true)->toBe(true);
});

it('throws exception', function () {
    throw new Exception('Something happened.');
})->throws(Exception::class, 'Something happened.');
