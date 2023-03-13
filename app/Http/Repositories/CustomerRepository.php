<?php

namespace App\Http\Repositories;
use App\Models\Customer;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Arr;

class CustomerRepository
{
    /**
     * List, filter and paginate all customers.
     * @param array $queryString
     * @return Collection|LengthAwarePaginator
     */
    public function filterCustomers(array $queryString): Collection | LengthAwarePaginator {

        $name = Arr::get($queryString, 'name');

        $cpf = Arr::get($queryString, 'cpf');

        $page = Arr::get($queryString, 'page');

        $perPage = Arr::get($queryString, 'per_page');

        $query = Customer::query();

        if ($name) $query->where('full_name', 'LIKE', '%'.$name.'%');

        if ($cpf) $query->where('cpf', 'LIKE', '%'.$cpf.'%');

        $query->orderBy('created_at', 'asc');

        if ($page && $perPage) return $query->paginate(page: $page, perPage: $perPage);

        return $query->get();
    }

    /**
     * Create a new customer.
     * @param array $payload
     * @return Customer
     */
    public function createCustomer(array $payload): Customer {

        return Customer::create($payload);
    }

    /**
     * Get a customer by its id.
     * @param int $customer_id
     * @return Customer|null
     */
    public function getCustomer(int $customer_id): Customer | null {

        return Customer::find($customer_id);
    }

    /**
     * Delete a given customer.
     * @param Customer $customer
     * @return bool|null
     */
    public function deleteCustomer(Customer $customer): void {

        $customer->delete();
    }
}
