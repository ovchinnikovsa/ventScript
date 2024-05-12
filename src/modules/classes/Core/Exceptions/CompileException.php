<?php

namespace Module\Core\Exceptions;

use Exception;

class CompileException extends Exception{

    public function __construct(string $message = "", int $code = 0, Exception $previous = null)
    {
        parent::__construct('Ошибка компиляции: ' . $message, $code, $previous);
    }

}