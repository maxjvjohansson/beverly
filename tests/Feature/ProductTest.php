<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    private User $admin;
    private Category $category;

    protected function setUp(): void
    {
        parent::setUp();
        $this->admin = User::factory()->create(['role' => 'admin']);
        $this->category = Category::factory()->create();
    }

    #[Test]
    public function admin_can_create_a_product()
    {
        $category = Category::factory()->create();

        $response = $this->actingAs($this->admin)->post(route('products.store'), [
            'name' => 'Test Product',
            'description' => 'Test Description',
            'price' => 12.99,
            'category_id' => $category->id,
            'img_url' => 'https://placehold.co/100x100'
        ]);

        $response->assertRedirect(route('products.index'));
        $this->assertDatabaseHas('products', [
            'name' => 'Test Product',
            'description' => 'Test Description',
            'price' => 12.99,
            'category_id' => $category->id,
            'img_url' => 'https://placehold.co/100x100'
        ]);
    }

    #[Test]
    public function product_requires_name_and_price()
    {
        $category = Category::factory()->create();

        $response = $this->actingAs($this->admin)->post(route('products.store'), [
            'category_id' => $category->id,
        ]);

        $response->assertSessionHasErrors(['name', 'description', 'price']);
    }

    #[Test]
    public function admin_can_edit_a_product()
    {
        $category = Category::factory()->create();
        $product = Product::factory()->create(['category_id' => $this->category->id]);

        $response = $this->actingAs($this->admin)->put(route('products.update', $product), [
            'name' => 'Updated Product Name',
            'description' => 'Updated Description',
            'price' => 15.99,
            'category_id' => $category->id,
            'img_url' => 'https://placehold.co/200x200'
        ]);

        $response->assertRedirect(route('products.index'));
        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'name' => 'Updated Product Name',
            'description' => 'Updated Description',
            'price' => 15.99,
            'category_id' => $category->id,
            'img_url' => 'https://placehold.co/200x200'
        ]);
    }

    #[Test]
    public function admin_can_delete_a_product()
    {
        $product = Product::factory()->create(['category_id' => $this->category->id]);

        $response = $this->actingAs($this->admin)->delete(route('products.destroy', $product));

        $response->assertRedirect(route('products.index'));
        $this->assertDatabaseMissing('products', ['id' => $product->id]);
    }
}
