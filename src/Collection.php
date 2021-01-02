<?php

namespace YaFou\CleanArchitectureUtilities;

/**
 * @template T
 * @implements \IteratorAggregate<int, T>
 * @implements CollectionInterface<T>
 */
class Collection implements CollectionInterface, \IteratorAggregate
{
    /**
     * @var T[]
     */
    private $items;

    /**
     * @param T[] $items
     */
    public function __construct(array $items = [])
    {
        $this->items = $items;
    }

    public function offsetExists($offset): bool
    {
        return isset($this->items[$offset]);
    }

    public function offsetGet($offset)
    {
        return $this->items[$offset];
    }

    public function offsetSet($offset, $value)
    {
        $this->items[$offset] = $value;
    }

    public function offsetUnset($offset)
    {
        unset($this->items[$offset]);
    }

    /**
     * @return \ArrayIterator<int, T>
     */
    public function getIterator(): \ArrayIterator
    {
        return new \ArrayIterator($this->items);
    }

    public function count(): int
    {
        return count($this->items);
    }

    public function isEmpty(): bool
    {
        return !count($this);
    }

    public function first()
    {
        return array_values($this->items)[0];
    }

    public function last()
    {
        $value = end($this->items);

        if (false === $value) {
            throw new \RuntimeException();
        }

        return $value;
    }

    public function filter(callable $callback): CollectionInterface
    {
        return new self(array_filter($this->items, $callback, ARRAY_FILTER_USE_BOTH));
    }

    public function toArray(): array
    {
        return $this->items;
    }

    public function contains($value): bool
    {
        return in_array($value, $this->items);
    }
}
