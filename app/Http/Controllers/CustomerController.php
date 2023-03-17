<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use Illuminate\Http\Request;
use App\Models\Customer;
use Exception;
use Illuminate\Http\Response;
use App\Models\User;
use App\Http\Requests\CreateCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function getAll(Request $req): Response
    {
        $perPage = $req->input('per_page');
        return response(Customer::where('user_id', Auth::id() )->paginate($perPage), 200);
    }
    
    public function getById( $id): Response
    {
        $customer = Customer::find($id);
        if(!$customer) {
            return response(null, 404);
        }
        $this->authorize('view', $customer);
        return response($customer, 200);
    }

    public function create(CreateCustomerRequest $req): Response
    {
        $validated = $req->validated();
        $customer = Customer::create($validated);
        
        return response($customer, 201);
    }

    public function update(UpdateCustomerRequest $req, $id): Response
    {
        
        $customer = Customer::find($id);
        if(!$customer)
        {
            return response(null, 404);
        }
        $this->authorize('update', $customer);
        $validated = $req->validated();
        $customer->update($validated);
        
        return response($customer,200);
    }

    public function remove($id): Response
    {
        $customer = Customer::find($id);
        if(!$customer)
        {
            return response(null, 404);
        }
        $this->authorize('delete', $customer);
        $res = Customer::destroy($id);
        return response($res, 200);
    }
}
