<?php

namespace YaFou\CleanArchitectureUtilities\Validator;

interface AssertionInterface
{
    /**
     * @return Error[]
     */
    public function getErrors(): array;

    public function null(): self;

    public function notNull(): self;

    public function empty(): self;

    public function notEmpty(): self;

    public function boolean(): self;

    public function integer(): self;

    public function float(): self;

    public function string(): self;

    public function digit(): self;

    public function array(): self;

    public function min(int $min): self;

    public function max(int $max): self;

    public function range(int $min = null, int $max = null): self;

    public function length(int $length): self;

    public function minLength(int $minLength): self;

    public function maxLength(int $maxLength): self;

    public function lengthRange(int $minLength = null, int $maxLength = null): self;

    public function email(): self;
}
