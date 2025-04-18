<?php

namespace Module\UltraHightLanguage\Compiler\Validator\FileValidator;

use Module\Core\UltraHightLanguage\Compiler\Validator\Validator;
use InvalidArgumentException;

class FileValidator implements Validator {
    private string $filePath;

    /**
     * @param string $filePath Путь к файлу для валидации.
     */
    public function __construct(string $filePath) {
        $this->filePath = $filePath;
    }

    /**
     * Проверяет, что файл существует, доступен и является файлом.
     * @return bool
     * @throws InvalidArgumentException
     */
    public function validate(): bool {
        // Проверка существования файла
        if (!file_exists($this->filePath)) {
            throw new InvalidArgumentException("Файл не существует: {$this->filePath}");
        }

        // Проверка, что это именно файл (не директория)
        if (!is_file($this->filePath)) {
            throw new InvalidArgumentException("Указанный путь не является файлом: {$this->filePath}");
        }

        // Проверка доступности для чтения
        if (!is_readable($this->filePath)) {
            throw new InvalidArgumentException("Файл недоступен для чтения: {$this->filePath}");
        }

        return true;
    }
}
