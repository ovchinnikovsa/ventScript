<?php

namespace Module\UltraHightLanguage\Compiler;

use Module\UltraHightLanguage\Compiler\File\File;

class Compiler
{
    private File $inputFile;
    private File $outputFile;
    private Validator $validator;

    public function __construct(File $inputFile, File $outputFile, Validator $validator)
    {
        $this->inputFile = $inputFile;
        $this->outputFile = $outputFile;
        $this->validator = $validator;
    }

    public function compile(): bool
    {
        foreach ($this->inputFile->readLines() as $line) {
            $translatedLine = Translator::handleVentScriptObjects($line);
            $translatedLine = Translator::translateVentScript($translatedLine);
            $this->outputFile->writeToFile($translatedLine . PHP_EOL);
        }



        return true;
    }

    private function syntaxCheck(string $output)
    {
        // todo add syntax check


        if (!php_check_syntax()) {
            $error = error_get_last();
            $message = "Синтаксическая ошибка на строке {$error['line']}: {$error['message']}";
            echo $message;
        }
    }
}