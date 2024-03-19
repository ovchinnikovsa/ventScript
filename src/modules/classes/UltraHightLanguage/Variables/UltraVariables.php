<?php

namespace Module\UltraHightLanguage\Variables;

use Module\Core\CommonMessage;
use Module\UltraHightLanguage\Compiler\CompileException;

abstract class UltraVariables
extends CommonMessage
implements UltraInterface
{
    protected mixed $state;
    protected bool $isSettable = true;
    protected string $stateType = 'float';
    protected float $stateMin = 0;
    protected float $stateMax = 100;
    protected string $objectName = '';

    public function __construct(string $object_name)
    {
        $this->objectName = $object_name;
    }

    public function setState(mixed $state): array
    {
        if (gettype($state) !== $this->stateType) {
            throw new CompileException('Wrong type exception');
        }
        $this->state = $state;
        return $this->formatMessage('State changed successfully', false);
    }

    public function getState(): mixed
    {
        return $this->state;
    }

    public function getMetaData(): array
    {
        return [
            'isSettable' => $this->stateMin,
            'stateType' => $this->stateType,
            'stateMin' => $this->stateMin,
            'stateMax' => $this->stateMax,
            'objectName' => $this->objectName,
        ];
    }

    public function drawElement(): void
    {
        // todo think about naming
        // and how to send it to frontend in a single array
    }
}
