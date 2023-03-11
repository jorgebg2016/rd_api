<?php

namespace Tests\Feature;

use Illuminate\Http\Response;
use Illuminate\Testing\Fluent\AssertableJson;
use Illuminate\Testing\TestResponse;
use Tests\TestCase;
use Faker\Factory as FakerFactory;

class CreateCustomerTest extends TestCase
{
    private array $body;

    protected function setUp(): void {

        parent::setUp();

        $faker = FakerFactory::create('pt_BR');

        $this->body = [
            'full_name' => $faker->name(),
            'birthday' => (string) $faker->date('Y-m-d'),
            'cpf' => $faker->cpf(),
            'phone' => $faker->cellphoneNumber(),
        ];
    }

    private function makeRequest(): TestResponse
    {
        $uri = route('api.customers.store', $this->body);

        return $this->post($uri);
    }

    public function testSuccessfullyResponse(): void
    {
        $response = $this->makeRequest();

        $response->assertStatus(Response::HTTP_OK);

        $response->assertJson(
            fn (AssertableJson $json) => $json
                ->has('message')
                ->has(
                    'data',
                    fn (AssertableJson $json) => $json
                        ->hasAll([
                            'id',
                            'full_name',
                            'cpf',
                            'birthday',
                            'phone',
                            'created_at'
                        ])
                        ->whereAllType([
                            'id' => 'integer',
                            'full_name' => 'string',
                            'cpf' => 'string',
                            'birthday' => 'string',
                            'phone' => 'string|null',
                            'created_at' => 'string'
                        ])
                )
        );
    }
}
