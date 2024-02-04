<?php

namespace Module\UltraHightLanguage\Variables;

class ExternalSensor extends Sensor
{
    private bool $is_external = true;

    public function setState(float $value): void {
        $this->state = $value;
    }
}
