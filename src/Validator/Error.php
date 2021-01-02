<?php

namespace YaFou\CleanArchitectureUtilities\Validator;

class Error
{
    /**
     * @var mixed
     */
    private $value;
    /**
     * @var string
     */
    private $message;
    /**
     * @var string|null
     */
    private $propertyPath;

    /**
     * @param mixed $value
     * @param string $message
     * @param array<string, mixed> $parameters
     * @param string|null $propertyPath
     */
    public function __construct($value, string $message, array $parameters = [], string $propertyPath = null)
    {
        $this->value = $parameters['value'] = $value;
        $this->message = $message;
        $this->propertyPath = $propertyPath;

        foreach ($parameters as $key => $value) {
            $this->message = str_replace(sprintf('{{%s}}', $key), $value, $this->message);
        }
    }

    public function __toString(): string
    {
        return $this->message;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getPropertyPath(): ?string
    {
        return $this->propertyPath;
    }
}
