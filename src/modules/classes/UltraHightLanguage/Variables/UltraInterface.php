<?php

namespace Module\UltraHightLanguage\Variables;

interface UltraInterface
{
    public function __construct(string $object_name);
    public function setState(mixed $state): array;
    public function getMetaData(): array;
    public function getState(): mixed;
    public function drawElement(): void;
}
