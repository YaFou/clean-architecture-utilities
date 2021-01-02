<?php

namespace YaFou\CleanArchitectureUtilities;

/**
 * @template T
 * @extends \Traversable<int, T>
 * @extends \ArrayAccess<int, T>
 */
interface CollectionInterface extends \Traversable, \ArrayAccess, \Countable
{
    public function isEmpty(): bool;

    /**
     * @return T
     */
    public function first();

    /**
     * @return T
     */
    public function last();

    /**
     * @param callable $callback
     * @return static<T>
     */
    public function filter(callable $callback): self;

    /**
     * @return T[]
     */
    public function toArray(): array;

    /**
     * @param T $value
     * @return bool
     */
    public function contains($value): bool;
}
