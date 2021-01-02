<?php

namespace YaFou\CleanArchitectureUtilities\Validator;

interface ValidatorInterface
{
    /**
     * @param mixed $value
     * @param string|null $propertyPath
     * @return AssertionInterface
     */
    public function that($value, string $propertyPath = null): AssertionInterface;

    public function getErrors(): ErrorList;
}
