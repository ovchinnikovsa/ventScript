<?php

namespace Module\UltraHightLanguage\Variables\Valve;

use Module\UltraHightLanguage\Variables\UltraVariables;

class Valve extends UltraVariables
{
    private bool $state = false;

    public function open(): void
    {
        $this->state = true;
    }

    public function close(): void
    {
        $this->state = false;
    }
}
