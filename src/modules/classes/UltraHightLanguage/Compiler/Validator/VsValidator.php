<?php

namespace Module\UltraHightLanguage\Compiler\Validator;

use Throwable;
use Module\Core\Exceptions\CompileException;
use Module\UltraHightLanguage\Compiler\Validator\Validator;

class VSValidator implements Validator
{
    private string $code;

    public function __construct(string $code)
    {
        if (empty($code))
            throw new CompileException('Empty code');

        $this->code = $code;
    }

    /**
     * Валидирует данные.
     * @return bool Возвращает true, если валидация успешна.
     * @throws InvalidArgumentException Если данные неверны.
     */
    public function validate(): void
    { // TODO: Implement validate() method.
        return;
    }

    public function checkPhpErrors(): void
    {
        $old = ini_set('display_errors', 1);
        try {

            token_get_all($this->code, TOKEN_PARSE);
        } catch (Throwable $ex) {
            $error = $ex->getMessage();
            $line = $ex->getLine() - 1;
            throw new CompileException("PARSE ERROR on line $line:\n\n$error");
        } finally {
            ini_set('display_errors', $old);
        }
    }

    public function validatePhpCode(): bool
    {
        // $pattern = '/(?:\/\*(?s:.*?)\*\/|\/\/.*?$|#.*?$)(*SKIP)(*FAIL)|[\p{Cyrillic}]/u';

        $tokens = token_get_all($this->code);
        foreach ($tokens as $token) {
            if (is_array($token) && ($token[0] === T_STRING || $token[0] === T_CONSTANT_ENCAPSED_STRING)) {
                if (preg_match('/\p{Cyrillic}/u', $token[1])) {
                    return true;
                }
            }
        }

        return false;
    }
}
