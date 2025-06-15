<?php

namespace Module\UltraHightLanguage\Compiler\File;

class File // TODO: delete and mb just write with file class
{
    private string $path;
    private string $filename;
    private $fileResource;

    public function __construct(string $filename)
    {
        $this->path = $_SERVER['DOCUMENT_ROOT'] . '/tmp/';
        $this->filename = $this->path . '' . $filename;
        $filePath = $this->path . '' . $filename;
        if (!file_exists($filePath)) {
            $this->fileResource = fopen($filePath, 'w');
            fclose($this->fileResource);
        }

        $this->fileResource = fopen($filePath, 'r+');
    }

    public function writeToFile(string $data): bool
    {
        if (!is_resource($this->fileResource)) {
            return false;
        }

        $result = fwrite($this->fileResource, $data);

        if ($result === false) {
            return false;
        }

        return true;
    }

    public function readFile(): string
    {
        if (!is_resource($this->fileResource)) {
            return '';
        }

        rewind($this->fileResource);

        return stream_get_contents($this->fileResource);
    }

    public function readLines(): \Generator
    {
        if (!is_resource($this->fileResource)) {
            return;
        }

        rewind($this->fileResource);

        while (!feof($this->fileResource)) {
            yield fgets($this->fileResource);
        }
    }

    public function __destruct()
    {
        if (is_resource($this->fileResource)) {
            fclose($this->fileResource);
        }
    }
}