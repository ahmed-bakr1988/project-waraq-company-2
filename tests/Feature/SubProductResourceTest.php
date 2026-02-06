<?php

namespace Tests\Feature;

use App\Filament\Resources\SubProducts\Pages\ManageSubProducts;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductTranslation;
use App\Models\User;
use Filament\Facades\Filament;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class SubProductResourceTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_create_sub_product(): void
    {
        $user = User::factory()->create();
        $category = ProductCategory::factory()->create();
        $product = Product::factory()->for($category, 'productCategory')->create();

        ProductTranslation::factory()->create([
            'product_id' => $product->id,
            'locale' => 'en',
            'name' => 'Test Product',
            'slug' => 'test-product',
        ]);

        ProductTranslation::factory()->create([
            'product_id' => $product->id,
            'locale' => 'ar',
            'name' => 'منتج تجريبي',
            'slug' => 'منتج-تجريبي',
        ]);

        $this->actingAs($user);
        Filament::setCurrentPanel('admin');

        $component = Livewire::test(ManageSubProducts::class)
            ->mountAction('create')
            ->fillForm([
                'product_category_id' => $category->id,
                'product_id' => $product->id,
                'size' => 'A4',
                'order' => 1,
                'is_active' => true,
                'image' => null,
            ]);

        $translations = $component->get('mountedActions.0.data.translations') ?? [];
        $translationKeys = array_keys($translations);

        $this->assertCount(2, $translationKeys);

        $component
            ->set("mountedActions.0.data.translations.{$translationKeys[0]}.locale", 'en')
            ->set("mountedActions.0.data.translations.{$translationKeys[0]}.name", 'Sub Product EN')
            ->set("mountedActions.0.data.translations.{$translationKeys[0]}.description", 'English description')
            ->set("mountedActions.0.data.translations.{$translationKeys[1]}.locale", 'ar')
            ->set("mountedActions.0.data.translations.{$translationKeys[1]}.name", 'منتج فرعي')
            ->set("mountedActions.0.data.translations.{$translationKeys[1]}.description", 'وصف عربي')
            ->callMountedAction()
            ->assertHasNoFormErrors();

        $this->assertDatabaseHas('sub_products', [
            'product_category_id' => $category->id,
            'product_id' => $product->id,
            'size' => 'A4',
            'order' => 1,
            'is_active' => 1,
        ]);

        $this->assertDatabaseHas('sub_product_translations', [
            'locale' => 'en',
            'name' => 'Sub Product EN',
        ]);

        $this->assertDatabaseHas('sub_product_translations', [
            'locale' => 'ar',
            'name' => 'منتج فرعي',
        ]);
    }
}
