<?php

namespace YaFou\CleanArchitectureUtilities;

use YaFou\CleanArchitectureUtilities\Validator\ErrorList;
use YaFou\CleanArchitectureUtilities\Validator\ValidatorInterface;

abstract class AbstractValidationAwareRequest
{
    public function validate(ValidatorInterface $validator): ErrorList
    {
        $this->doValidate($validator);

        return $validator->getErrors();
    }

    abstract protected function doValidate(ValidatorInterface $validator): void;
}
