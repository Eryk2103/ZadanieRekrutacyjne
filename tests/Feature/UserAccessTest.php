<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\Customer;
use Tests\TestCase;
use App\Models\User;
use Mockery\MockInterface;

class UserAccessTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_user_can_access_get_all(): void
    {
        $user = User::factory()->create()->attachRole('user');
       
        $response = $this->actingAs($user)
            ->get('/api/customers');
        $response->assertStatus(200);
    }
    public function test_user_can_access_get_by_id()
    {
        $user = User::factory()->create()->attachRole('user');
        $customer = Customer::factory()->create(['user_id' => $user->id]);
            
        $response = $this->actingAs($user)
            ->get('/api/customers/' . $customer->id);
        $response->assertStatus(200);
    }
    public function test_admin_can_access_create()
    {
        $user = User::factory()->create()->attachRole('admin');
        $response = $this->actingAs($user)
            ->post('/api/customers', [ 
                'first_name' => 'test',
                'last_name' => 'test',
                'phone_number' => 'test',
                'user_id' => $user->id
            ]);
        $response->assertStatus(201);
    }
    public function test_user_can_access_update()
    {
        $user = User::factory()->create()->attachRole('user');
        $customer = Customer::factory()->create(['user_id' => $user->id]);


        $response = $this->actingAs($user)
            ->put('/api/customers/' . $customer->id, [ 
                'first_name' => 'test2',
                'last_name' => 'test',
                'phone_number' => 'test',
            ]);
        $response->assertStatus(200);
    }
    public function test_user_can_access_delete()
    {

        $user = User::factory()->create()->attachRole('user');
        $customer = Customer::factory()->create(['user_id' => $user->id]);


        $response = $this->actingAs($user)
            ->delete('/api/customers/' . $customer->id);
        $response->assertStatus(200);
    }
    //test unauthorized
    public function test_admin_unauthorized_access_get_all(): void
    {
        $user = User::factory()->create()->attachRole('admin');
       
        $response = $this->actingAs($user)
            ->get('/api/customers');
        $response->assertStatus(403);
    }
    public function test_admin_unauthorized_access_get_by_id()
    {
        $user = User::factory()->create()->attachRole('admin');
        $customer = Customer::factory()->create(['user_id' => $user->id]);
            
        $response = $this->actingAs($user)
            ->get('/api/customers/' . $customer->id);
        $response->assertStatus(403);
    }
    public function test_user_unauthorized_access_create()
    {
        $user = User::factory()->create()->attachRole('user');
        $response = $this->actingAs($user)
            ->post('/api/customers', [ 
                'first_name' => 'test',
                'last_name' => 'test',
                'phone_number' => 'test',
                'user_id' => $user->id
            ]);
        $response->assertStatus(403);
    }
    public function test_admin_unauthorized_access_update()
    {
        $user = User::factory()->create()->attachRole('admin');
        $customer = Customer::factory()->create(['user_id' => $user->id]);


        $response = $this->actingAs($user)
            ->put('/api/customers/' . $customer->id, [ 
                'first_name' => 'test2',
                'last_name' => 'test',
                'phone_number' => 'test',
            ]);
        $response->assertStatus(403);
    }
    public function test_admin_unauthorized_access_delete()
    {

        $user = User::factory()->create()->attachRole('admin');
        $customer = Customer::factory()->create(['user_id' => $user->id]);


        $response = $this->actingAs($user)
            ->delete('/api/customers/' . $customer->id);
        $response->assertStatus(403);
    }

}
