<?php

namespace Module\UltraHightLanguage\Variables\Engine;

interface EngineInterface
{
    public function run(): void;
    public function stop(): void;
    public function powerUp(): void;
    public function powerDown(): void;
}