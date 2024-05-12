<?php

namespace Module\UltraHightLanguage\Variables\Sensor;

interface SensorInterface
{
    public function getState(): float;
    // public function setState(): void;
}