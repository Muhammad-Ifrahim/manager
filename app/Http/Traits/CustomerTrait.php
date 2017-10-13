<?php
namespace App\Http\Traits;

use App\Models\Customer;

trait CustomerTrait {
    public function allCustomer() {
        // Get all the brands from the Brands Table.
        $customers = Customer::all();

        return $customers;
    }
}