<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Http;

class CepControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_deve_retornar_dados(): void
    {

        Http::fake([
            'viacep.com.br/*' => Http::response([
                'cep' => '84400000',
                'logradouro' => 'Castro Alves',
                'bairro' => 'belica',
                'localidade' => 'Prudentopolis',
                'uf' => 'PR',
                'ddd' => '42'


            ], status: 200),
        ]);

        $response = $this->get('/cep/84400000');

        $response->assertStatus(200);
        $response->assertSee('Prudentopolis');
    }

    public function test_deve_retornar_erro():void{
        Http::fake([
            'viacep.com.br/*' => Http::response(body:null, status: 404),


        ]);
        
        $response = $this->get('/cep/844000');

        $response->assertStatus(200);
        $response->assertSee('CEP não encontrado ou formato inválido.');


    }
}
