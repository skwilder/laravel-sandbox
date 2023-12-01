<?php
namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class UserProfileTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test retrieving a user profile with a valid ID.
     */
    public function test_retrieve_valid_user_profile()
    {
        // Create a new user
        $user = User::factory()->create();

        // Send a GET request to the /user-profile/{id} route
        $response = $this->get('/api/user-profile/' . $user->id);

        // Assert that the response status is 200 (OK)
        $response->assertStatus(200);

        // Assert that the response contains the user's data
        $response->assertJson([
            'data' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
            ],
        ]);
    }

    /**
     * Test retrieving a user profile with an invalid ID.
     */
    public function test_retrieve_invalid_user_profile()
    {
        // Send a GET request to the /user-profile/{id} route with an invalid ID
        $response = $this->get('/api/user-profile/9999');

        // Assert that the response status is 404 (Not Found)
        $response->assertStatus(404);

        // Assert that the response contains the error message
        $response->assertJson(['message' => 'User not found']);
    }
}
?>