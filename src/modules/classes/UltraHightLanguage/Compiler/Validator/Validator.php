<?php

namespace Module\UltraHightLanguage\Compiler\Validator;

interface Validator
{
    /**
     * Валидирует данные.
     * @return bool Возвращает true, если валидация успешна.
     * @throws InvalidArgumentException Если данные неверны.
     */
    public function validate(): bool;
}
