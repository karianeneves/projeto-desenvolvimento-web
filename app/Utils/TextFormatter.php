<?php

namespace App\Utils;

class TextFormatter
{
    /**
     * Converte uma string para o formato Title Case.
     *
     * @param  string  $text
     * @return string
     */
    public static function toTitleCase(string $text): string
    {
        return ucwords(strtolower($text));
    }
}