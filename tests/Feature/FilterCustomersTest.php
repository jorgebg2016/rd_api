<?php

namespace Tests\Feature;

use App\Models\Customer;
use Illuminate\Http\Response;
use Illuminate\Testing\Fluent\AssertableJson;
use Illuminate\Testing\TestResponse;
use Tests\TestCase;

class FilterCustomersTest extends TestCase
{
    private array $queryString;

    private Customer $customer;

    protected function setUp(): void {

        parent::setUp();

        Customer::factory()->count(10)->make();

        $this->customer = Customer::factory()->create();
    }

    private function makeRequest(): TestResponse
    {
        $uri = route('api.customers.filter', $this->queryString);

        return $this->get($uri);
    }

    public function testListCustomerWithoutPagination(): void
    {
        $this->queryString = [];

        $response = $this->makeRequest();

        $response->assertStatus(Response::HTTP_OK);

        $response->assertJson(
            fn (AssertableJson $json) => $json
                ->has(
                    'data',
                    fn (AssertableJson $json) => $json
                        ->each(
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
                )
        );
    }

    public function testListCustomerWithPagination(): void
    {
        $this->queryString = [
            'page' => 1,
            'per_page' => 5
        ];

        $response = $this->makeRequest();

        $response->assertStatus(Response::HTTP_OK);

        $response->assertJson(
            fn (AssertableJson $json) => $json
                ->has(
                    'data',
                    fn (AssertableJson $json) => $json
                        ->each(
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
                )->has(
                    'pagination',
                    fn (AssertableJson $json) => $json
                        ->hasAll(
                            'per_page',
                            'page',
                            'rows',
                            'total'
                        )
                        ->whereAllType([
                            'per_page' => 'integer',
                            'page' => 'integer',
                            'rows' => 'integer',
                            'total' => 'integer',
                        ])
                )
        );
    }

    public function testListCustomerFilteringByName(): void
    {
        $this->queryString = [
            'name' => $this->customer->full_name,
            'page' => 1,
            'per_page' => 5
        ];

        $response = $this->makeRequest();

        $response->assertStatus(Response::HTTP_OK);

        $response->assertJson(
            fn (AssertableJson $json) => $json
                ->has(
                    'data',
                    fn (AssertableJson $json) => $json
                        ->each(
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
                )->has(
                    'pagination',
                    fn (AssertableJson $json) => $json
                        ->hasAll(
                            'per_page',
                            'page',
                            'rows',
                            'total'
                        )
                        ->whereAllType([
                            'per_page' => 'integer',
                            'page' => 'integer',
                            'rows' => 'integer',
                            'total' => 'integer',
                        ])
                )
        );
    }

    public function testListCustomerFilteringByCpf(): void
    {
        $this->queryString = [
            'cpg' => $this->customer->cpf,
            'page' => 1,
            'per_page' => 5
        ];

        $response = $this->makeRequest();

        $response->assertStatus(Response::HTTP_OK);

        $response->assertJson(
            fn (AssertableJson $json) => $json
                ->has(
                    'data',
                    fn (AssertableJson $json) => $json
                        ->each(
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
                )->has(
                    'pagination',
                    fn (AssertableJson $json) => $json
                        ->hasAll(
                            'per_page',
                            'page',
                            'rows',
                            'total'
                        )
                        ->whereAllType([
                            'per_page' => 'integer',
                            'page' => 'integer',
                            'rows' => 'integer',
                            'total' => 'integer',
                        ])
                )
        );
    }
}
