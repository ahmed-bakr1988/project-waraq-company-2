<?php

namespace Tests\Feature;

use App\Filament\Resources\Products\Pages\ListProducts;
use App\Models\ProductCategory;
use App\Models\User;
use Filament\Facades\Filament;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;
use Tests\TestCase;

class ProductImageUploadTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_upload_product_image_and_path_is_saved(): void
    {
        Storage::fake('public');

        $user = User::factory()->create();
        $category = ProductCategory::factory()->create();

        $this->actingAs($user);
        Filament::setCurrentPanel('admin');

        $component = Livewire::test(ListProducts::class)
            ->mountAction('create');

        $translations = $component->get('mountedActions.0.data.translations') ?? [];
        $translationKeys = array_keys($translations);

        $this->assertCount(2, $translationKeys);

        $component
            ->set('mountedActions.0.data.product_category_id', $category->id)
            ->set('mountedActions.0.data.order', 0)
            ->set('mountedActions.0.data.is_active', true)
            ->set('mountedActions.0.data.is_featured', false)
            ->set("mountedActions.0.data.translations.{$translationKeys[0]}.locale", 'en')
            ->set("mountedActions.0.data.translations.{$translationKeys[0]}.name", 'Test Product')
            ->set("mountedActions.0.data.translations.{$translationKeys[0]}.slug", 'test-product')
            ->set("mountedActions.0.data.translations.{$translationKeys[1]}.locale", 'ar')
            ->set("mountedActions.0.data.translations.{$translationKeys[1]}.name", 'منتج تجريبي')
            ->set("mountedActions.0.data.translations.{$translationKeys[1]}.slug", 'منتج-تجريبي')
            ->set('mountedActions.0.data.image', UploadedFile::fake()->create('product.jpg', 100, 'image/jpeg'))
            ->callMountedAction()
            ->assertHasNoFormErrors();

        $this->assertDatabaseHas('products', [
            'product_category_id' => $category->id,
        ]);

        $product = \App\Models\Product::query()->latest('id')->firstOrFail();

        $this->assertIsString($product->image);
        $this->assertStringContainsString('products/', $product->image);

        Storage::disk('public')->assertExists($product->image);
    }
}
