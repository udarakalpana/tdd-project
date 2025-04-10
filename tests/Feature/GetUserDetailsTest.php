<?php

namespace Tests\Feature;


use Tests\TestCase;

final class GetUserDetailsTest extends TestCase
{
    // this is our first test case (TDD)
    public function test_get_user_details_when_calling_api_endpoint()
    {
        // AAA rule
        // A - Arrange (Arrange dummy/fake data that need to be test / laravel factory)
        $user = [
            'user_name' => 'kalpana',
            'email' => 'kalpana@gmail.com',
            'user_role' => 'admin',
        ];

        // A - Act/Action (This need to be call you testing action)
        $response = $this->get('api/get-users');

        // A - Assertion (compare)
        $response->assertStatus(200);
        $response->assertSimilarJson($user);

    }
}
