<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Utils\TextFormatter;

class FormatarTextoTest extends TestCase
{
    /**
     * Testa se o método toTitleCase formata uma string corretamente.
     */
    public function test_it_can_convert_text_to_title_case(): void
    {
        $input = "este É um EXEMPLO de TEXTO.";
        $expected = "Este É Um Exemplo De Texto.";
        $actual = TextFormatter::toTitleCase($input);
        
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * Testa a formatação com uma string vazia.
     */
    public function test_it_handles_empty_string(): void
    {
        $input = "";
        $expected = "";
        $actual = TextFormatter::toTitleCase($input);
        
        $this->assertEquals($expected, $actual);
    }
}