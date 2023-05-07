<?php

namespace App\Http\Livewire\Dashboard\Products;

use App\Models\Brand;
use App\Models\Category;
use App\Models\EnabledCountry;
use App\Models\Product;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Collection;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;


class Edit extends Component
{
    use LivewireAlert;

    public Authenticatable $user;

    public $product;

    public Collection $brands;
    public Collection $categories;
    public Collection $countries;


    public string $name = '';
    public int $lc_country_id = 0;
    public int $category_id = 0;
    public int $brand_id = 0;
    public string $description = '';
    public $price = 0.0;
    public $previous_price = 0.0;
    public $promo_code = '';
    public bool $is_hidden = false;
    public string $productFeature = '';
    public array $productFeaturesArray = [];


    public function updateProduct()
    {
        $rules = [
            'name' => 'required|string|min:3|max:100',
            'description' => 'required|string|min:3|max:2000',
            'is_hidden' => 'required|boolean',
            'lc_country_id' => 'required|integer|exists:enabled_countries,lc_country_id',
            'category_id' => 'required|integer|exists:categories,id',
            'brand_id' => 'required|integer|exists:brands,id',
            'promo_code' => 'nullable|int|exists:promo_codes,code',
            'price' => 'required|numeric|gt:0|max:100000',
            'previous_price' => 'required|numeric|gt:-1|max:100000',
        ];

        $validated = $this->validate($rules);
        $validated['properties'] = [];
        $validated['additional_fees'] = [];

        $product = $this->product;
        $product->update($validated);

        if (count($this->productFeaturesArray) > 0) {
            $productFeatures = [];
            foreach ($this->productFeaturesArray as $item) {
                $productFeatures[] = [
                    'name' => $item,
                    'description' => '',
                ];
            }
            $product->update([
                'properties' => [
                    'features' => $productFeatures
                ]
            ]);
        }


        return redirect()->route('dashboard.products.index');

    }

    public function addToProductFeatures(): void
    {
        $data = trim($this->productFeature);
        if ($data && count($this->productFeaturesArray) < 6) {
            $this->productFeaturesArray[] = $data;
            $this->productFeature = '';
        }
    }

    public function removeProgramFeature($value): void
    {
        if (in_array($value, $this->productFeaturesArray)) {
            $this->productFeaturesArray = array_diff($this->productFeaturesArray, [$value]);
        }
    }

    public function mount(Product $product): void
    {
        $this->brands = Brand::all();
        $this->categories = Category::where('model', Product::class)->get();
        $this->countries = EnabledCountry::all();
        if ($this->countries->count() > 0) {
            $this->lc_country_id = $this->countries->first()->lc_country_id;
        }

        $this->user = auth()->user();

        $this->product = $product;
        $this->name = $product->name;
        $this->lc_country_id = $product->lc_country_id;
        $this->category_id = $product->category_id;
        $this->brand_id = $product->brand_id;
        $this->description = $product->description;
        $this->price = $product->price;
        $this->previous_price = $product->previous_price;
        $this->promo_code = $product->promo_code;
        $this->is_hidden = $product->is_hidden;

        if (array_key_exists('features', $product->properties)) {
            $productArray = [];
            foreach ($product->properties['features'] as $item) {

                $this->productFeaturesArray[] = $item['name'];
            }
        }

    }

    public function render()
    {
        return view('livewire.dashboard.products.edit');
    }
}
