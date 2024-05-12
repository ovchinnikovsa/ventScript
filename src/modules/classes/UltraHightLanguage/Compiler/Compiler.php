<?php

namespace Module\UltraHightLanguage\Compiler;

class Compiler
{
    private $inputFile;
    private $outputFile;

    public function __construct(File $inputFile, File $outputFile)
    {
        $this->inputFile = $inputFile;
        $this->outputFile = $outputFile;
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