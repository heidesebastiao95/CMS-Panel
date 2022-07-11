<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;

class ApiTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_api()
    {
        $user = User::find(20);

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = $this->withHeaders([
            'accept'=> 'application/json'
        ])->withToken($token)->get('/api/v1/user');

        // $response->assertJson(function(AssertableJson $json){
        //     $json->has('data')
        //          ->has('data.attributes.name')
        //          ->has('data.attributes.role')
        //          ->etc();

        // });

        $response->assertJson(function(AssertableJson $json){
            $json->has('data',4)
                 ->has('data.0.attributes',function($json){
                    $json->where('email','teste@gmail.com')
                        ->has('name')
                        ->etc();
                    });
            });





    }
}
