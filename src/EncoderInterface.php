<?php

namespace YaFou\CleanArchitectureUtilities;

interface EncoderInterface
{
    public function encode(string $plainPassword): string;

    public function isValid(string $password, string $plainPassword): bool;
}
