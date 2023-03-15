<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use Illuminate\Http\Request;
use App\Models\Customer;
use Exception;
use Illuminate\Http\Response;


class CustomerController extends Controller
{
    public function getAll(): Response
    {
        return response(Customer::all(), 200);
    }

    public function getById($id): Response
    {
        $customer = Customer::find($id);
        if(!$customer) {
            return response(null, 404);
        }
        return response($customer, 200);
    }

    public function create(Request $req): Response
    {
        $customer = Customer::create($req->all());
        
        return response($customer, 201);
    }

    public function update(Request $req, $id): Response
    {
        $customer = Customer::find($id);

        if(!$customer)
        {
            return response(null, 404);
        }
        $customer->update($req->all());
        
        return response($customer,200);
    }

    public function remove($id): Response
    {
        $res = Customer::destroy($id);
        if(!$res){
            return response(null, 404);
        }
        return response($res, 200);
    }
}
