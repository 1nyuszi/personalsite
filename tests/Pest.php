<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/*
|--------------------------------------------------------------------------
| Test Case
|--------------------------------------------------------------------------
|
| The closure you provide to your test functions is bound to a specific Pest
| test case class. By default, that class is "PHPUnit\Framework\TestCase".
| Of course, you may also bind it to any classes you like.
|
*/

uses(
    TestCase::class,
    RefreshDatabase::class,
)->in('Feature');

/*
|--------------------------------------------------------------------------
| Expectations
|--------------------------------------------------------------------------
|
| When you're writing tests, you often need to assert that values meet certain
| conditions. The "expect" function gives you access to a powerful
| set of expectations.
|
*/

expect()->extend('toBeOne', function () {
    return $this->toBe(1);
});

/*
|--------------------------------------------------------------------------
| Functions
|--------------------------------------------------------------------------
|
| While Pest is very powerful, you may sometimes want to write custom
| helper functions to reduce boilerplate in your tests.
|
*/
