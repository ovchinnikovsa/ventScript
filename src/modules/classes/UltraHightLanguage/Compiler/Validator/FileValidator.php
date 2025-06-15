<?php

namespace Module\UltraHightLanguage\Compiler\Validator;

use Module\UltraHightLanguage\Compiler\Validator\Validator;
use Module\UltraHightLanguage\Compiler\Validator\ValidateException;

class FileValidator implements Validator
{
    private \SplFileInfo $file;

    /**
     * @param \SplFileInfo $file
     */
    public function setFile(\SplFileInfo $file): void
    {
        $this->file = $file;
    }

    /**
     * Проверяет, что файл существует, доступен и является файлом.
     * @return bool
     * @throws ValidateException
     */
    public function validate(): void
    {
        if ($this->file->isFile() === false) {
            throw new ValidateException("Файл не существует: {$this->file->getPath()}");
        }

        if ($this->file->isReadable() === false) {
            throw new ValidateException("Файл недоступен для чтения: {$this->file->getPath()}");
        }
    }
}
