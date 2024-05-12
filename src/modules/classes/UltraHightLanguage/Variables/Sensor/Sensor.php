<?php

namespace Module\UltraHightLanguage\Variables\Sensor;

use Module\UltraHightLanguage\Variables\Sensor\SensorInterface;
use Module\UltraHightLanguage\Variables\UltraVariables;

abstract class Sensor extends UltraVariables implements SensorInterface
{
    protected float $state = 0;

    public function getState(): float
    {
        return $this->state;
    }
}
