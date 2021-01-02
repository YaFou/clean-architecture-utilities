<?php

namespace YaFou\CleanArchitectureUtilities\Tests\Validator;

use YaFou\CleanArchitectureUtilities\Validator\Error;
use PHPUnit\Framework\TestCase;

class ErrorTest extends TestCase
{
    public function testReplacePlaceholderWithValue()
    {
        $this->assertSame(
            '"value"',
            (string) new Error('value', '"{{value}}"')
        );
    }

    public function testReplaceCustomPlaceholder()
    {
        $this->assertSame(
            '"placeholder"',
            (string) new Error('value', '"{{placeholder}}"', ['placeholder' => 'placeholder'])
        );
    }
}
