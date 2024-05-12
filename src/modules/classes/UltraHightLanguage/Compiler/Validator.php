<?php

namespace Module\UltraHightLanguage\Compiler;

use Module\Core\Exceptions\CompileException;

class Validator
{
    private $code;

    public function __construct($code)
    {
        if (empty($code))
            throw new CompileException('Empty code');

        $this->code = $code;
    }
    public function validatePhpCode(): bool
    {
        $pattern = '/^[\а-яА-Я\d\\$\;\:\"\'\-\>\(\)\=\_\{\}\[\]\s]+$/u';
        $res = preg_match(
            $pattern,
            $this->code,
            flags: PREG_OFFSET_CAPTURE,
            offset: 0
        );

        if ($res === 1) {
            return true;
        }

        return false;
    }
}