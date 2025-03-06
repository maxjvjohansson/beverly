<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class UserTest extends TestCase
{
    use RefreshDatabase;

    private User $admin;
    private User $employee;

    protected function setUp(): void
    {
        parent::setUp();
        $this->admin = User::factory()->create(['role' => 'admin']);
        $this->employee = User::factory()->create(['role' => 'employee']);
    }

    #[Test]
    public function admin_can_create_user()
    {
        $response = $this->actingAs($this->admin)->post(route('users.store'), [
            'name' => 'New User',
            'email' => 'newuser@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
            'role' => 'employee'
        ]);

        $response->assertRedirect(route('users.index'));
        $this->assertDatabaseHas('users', ['email' => 'newuser@example.com']);
    }

    #[Test]
    public function employee_cannot_create_user()
    {
        $response = $this->actingAs($this->employee)->post(route('users.store'), [
            'name' => 'Unauthorized User',
            'email' => 'unauthorized@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
            'role' => 'admin'
        ]);

        $response->assertForbidden();
        $this->assertDatabaseMissing('users', ['email' => 'unauthorized@example.com']);
    }

    #[Test]
    public function admin_can_update_any_user()
    {
        $anotherUser = User::factory()->create();

        $response = $this->actingAs($this->admin)->put(route('users.update', $anotherUser), [
            'name' => 'Updated Name',
            'email' => $anotherUser->email,
        ]);

        $response->assertRedirect(route('users.index'));
        $this->assertDatabaseHas('users', ['name' => 'Updated Name']);
    }

    #[Test]
    public function employee_can_update_own_profile()
    {
        $response = $this->actingAs($this->employee)->put(route('users.update', $this->employee), [
            'name' => 'Updated Employee',
            'email' => $this->employee->email,
        ]);

        $response->assertRedirect(route('users.index'));
        $this->assertDatabaseHas('users', ['name' => 'Updated Employee']);
    }

    #[Test]
    public function employee_cannot_update_role()
    {
        $response = $this->actingAs($this->employee)->patch(route('users.updateRole', $this->admin), [
            'role' => 'employee'
        ]);

        $response->assertRedirect(route('users.index'));
        $response->assertSessionHas('error', 'You do not have permission to change user roles.');
    }

    #[Test]
    public function admin_can_delete_other_user()
    {
        $anotherUser = User::factory()->create();

        $response = $this->actingAs($this->admin)->delete(route('users.destroy', $anotherUser));

        $response->assertRedirect(route('users.index'));
        $this->assertDatabaseMissing('users', ['id' => $anotherUser->id]);
    }

    #[Test]
    public function employee_cannot_delete_any_user()
    {
        $anotherUser = User::factory()->create();

        $response = $this->actingAs($this->employee)->delete(route('users.destroy', $anotherUser));

        $response->assertForbidden();
        $this->assertDatabaseHas('users', ['id' => $anotherUser->id]);
    }
}
