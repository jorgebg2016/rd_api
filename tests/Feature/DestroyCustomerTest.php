<?php

namespace Tests\Feature;

use App\Models\Customer;
use Illuminate\Http\Response;
use Illuminate\Testing\Fluent\AssertableJson;
use Illuminate\Testing\TestResponse;
use Tests\TestCase;

class DestroyCustomerTest extends TestCase
{
    private array $parameter;

    private Customer $customer;

    protected function setUp(): void {

        parent::setUp();

        $this->customer = Customer::factory()->create();

        $this->parameter = [
            'customer_id' => $this->customer->id
        ];
    }

    private function makeRequest(): TestResponse
    {
        $uri = route('api.customers.destroy', $this->parameter);

        return $this->delete($uri);
    }

    public function testSuccessfullyResponse(): void
    {
        $response = $this->makeRequest();

        $response->assertStatus(Response::HTTP_OK);

        $response->assertJson(
            fn (AssertableJson $json) => $json
                ->has(
                    'data',
                    fn (AssertableJson $json) => $json
                        ->hasAll([
                            'message',
                        ])
                        ->whereAllType([
                            'message' => 'string',
                        ])
                )
        );
    }
}
