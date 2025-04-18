<?php

namespace Module\UltraHightLanguage\Compiler;

use Module\UltraHightLanguage\Compiler\File\File;

class Compiler
{
    private File $inputFile;
    private File $outputFile;
    private Translator $translator;

    public function __construct(File $inputFile, File $outputFile)
    {
        $this->inputFile = $inputFile;
        $this->outputFile = $outputFile;
        $translator = new Translator();
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
}