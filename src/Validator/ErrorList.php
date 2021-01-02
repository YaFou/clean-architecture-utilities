<?php

namespace YaFou\CleanArchitectureUtilities\Validator;

/**
 * @implements \IteratorAggregate<int, Error>
 * @implements \ArrayAccess<int, Error>
 */
class ErrorList implements \IteratorAggregate, \ArrayAccess
{
    /**
     * @var Error[]
     */
    private $errors;

    /**
     * @param Error[] $errors
     */
    public function __construct(array $errors)
    {
        $this->errors = $errors;
    }

    /**
     * @return \ArrayIterator<int, Error>
     */
    public function getIterator(): \ArrayIterator
    {
        return new \ArrayIterator($this->errors);
    }

    public function hasErrors(): bool
    {
        return (bool) count($this->errors);
    }

    public function offsetExists($offset): bool
    {
        return isset($this->errors[$offset]);
    }

    public function offsetGet($offset): Error
    {
        return $this->errors[$offset];
    }

    public function offsetSet($offset, $value): void
    {
        $this->errors[$offset] = $value;
    }

    public function offsetUnset($offset): void
    {
        unset($this->errors[$offset]);
    }
}
