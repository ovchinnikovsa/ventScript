<?php

namespace Module\UltraHightLanguage\Compiler;

class Translator
{
    private static $translitTable = [
        'а' => 'a',
        'б' => 'b',
        'в' => 'v',
        'г' => 'g',
        'д' => 'd',
        'е' => 'e',
        'ё' => 'e',
        'ж' => 'zh',
        'з' => 'z',
        'и' => 'i',
        'й' => 'y',
        'к' => 'k',
        'л' => 'l',
        'м' => 'm',
        'н' => 'n',
        'о' => 'o',
        'п' => 'p',
        'р' => 'r',
        'с' => 's',
        'т' => 't',
        'у' => 'u',
        'ф' => 'f',
        'х' => 'kh',
        'ц' => 'ts',
        'ч' => 'ch',
        'ш' => 'sh',
        'щ' => 'shch',
        'ъ' => '',
        'ы' => 'y',
        'ь' => '',
        'э' => 'e',
        'ю' => 'yu',
        'я' => 'ya',
        'А' => 'A',
        'Б' => 'B',
        'В' => 'V',
        'Г' => 'G',
        'Д' => 'D',
        'Е' => 'E',
        'Ё' => 'E',
        'Ж' => 'ZH',
        'З' => 'Z',
        'И' => 'I',
        'Й' => 'Y',
        'К' => 'K',
        'Л' => 'L',
        'М' => 'M',
        'Н' => 'N',
        'О' => 'O',
        'П' => 'P',
        'Р' => 'R',
        'С' => 'S',
        'Т' => 'T',
        'У' => 'U',
        'Ф' => 'F',
        'Х' => 'KH',
        'Ц' => 'TS',
        'Ч' => 'CH',
        'Ш' => 'SH',
        'Щ' => 'SHCH',
        'Ъ' => '',
        'Ы' => 'Y',
        'Ь' => '',
        'Э' => 'E',
        'Ю' => 'YU',
        'Я' => 'YA'
    ];

    private static $translationMap = [
        'Заслонка' => 'Valve',
        'Фильтр' => 'Filter',
        'Датчик' => 'Sensor',
        'Нагреватель' => 'Heat',
        'Вентилятор' => 'Vent',
        'создать' => 'new',
        'ЕСЛИ' => 'if',
        'ИНАЧЕ' => 'else',
        'закрыть' => 'close',
        'открыть' => 'open',
    ];

    public static function transliterateToEnglish($text)
    {
        $result = '';
        $text = mb_strtolower($text, 'UTF-8');

        for ($i = 0; $i < mb_strlen($text, 'UTF-8'); $i++) {
            $char = mb_substr($text, $i, 1, 'UTF-8');
            if (isset(self::$translitTable[$char])) {
                $result .= self::$translitTable[$char];
            } else {
                $result .= $char;
            }
        }

        return $result;
    }

    public static function transliterateToRussian($text)
    {
        $translitReversed = array_flip(self::$translitTable);
        $result = '';

        for ($i = 0; $i < mb_strlen($text, 'UTF-8'); $i++) {
            $char = mb_substr($text, $i, 1, 'UTF-8');
            if (isset($translitReversed[$char])) {
                $result .= $translitReversed[$char];
            } else {
                $result .= $char;
            }
        }

        return $result;
    }

    public static function translateVentScript(string $line): string
    {
        return strtr($line, self::$translationMap);
    }

    public static function handleVentScriptObjects(string $line): string
    {
        $pattern = '/создать\s+([а-яА-Я]+)\(\);/';

        if (preg_match($pattern, $line, $matches)) {
            $className = $matches[1];
            $translatedClassName = self::transliterateToEnglish($className);
            $translatedLine = "new {$translatedClassName}('{$className}');";
            return $translatedLine;
        }

        return $line;
    }

}
