<?php

namespace Module\UltraHightLanguage\Variables\Engine;

use Module\UltraHightLanguage\Variables\UltraVariables;

abstract class Engine extends UltraVariables implements EngineInterface
{
    const MAX_POWER = 100;
    const MIN_POWER = 0;
    private int $state = self::MIN_POWER;

    public function run(): void
    {
        echo $this->name . ' запущен';
    }

    public function stop(): void
    {
        echo $this->name . ' остановлен';
    }

    public function powerUp(int $power = 1): void
    {
        if ($this->state - $power < self::MAX_POWER) {
            $this->state = self::MAX_POWER;
            return;
        }
        $this->state += $power;
    }

    public function powerDown(int $power = 1): void
    {
        if ($this->state - $power < self::MIN_POWER) {
            $this->state = self::MIN_POWER;
            return;
        }
        $this->state -= $power;
    }
}