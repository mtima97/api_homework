<?php

namespace Tests\Feature;

use App\Category;
use App\User;
use Bezhanov\Faker\ProviderCollectionHelper;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CategoryTest extends TestCase
{
    use DatabaseMigrations;
    use WithFaker;

    public $user;
    public $categoryId;

    public function setUp(): void
    {
        parent::setUp();

        \Artisan::call('db:seed');

        ProviderCollectionHelper::addAllProvidersTo($this->faker);

        $this->user = User::all()->random();
        $this->categoryId = Category::all()->random()->id;
    }
    
    public function testListOfCategories()
    {
        $response = $this->actingAs($this->user)->get(route('categories.all'));

        $response->assertOk();
    }

    public function testProductsOfCategory()
    {
        $this->actingAs($this->user)->get(route('categories.products', [$this->categoryId]))->assertOk();
    }

    public function testAddition()
    {
        $this->actingAs($this->user)->postJson(route('categories.add'), [
            'name' => $this->faker->department
        ])->assertOk();
    }

    public function testRenewal()
    {
        $this->actingAs($this->user)->postJson(route('categories.update', [$this->categoryId]), [
            'name' => $this->faker->department
        ])->assertOk();
    }

    public function testDeletion()
    {
        $this->actingAs($this->user)->postJson(route('categories.delete', [$this->categoryId]))->assertOk();
    }
}
