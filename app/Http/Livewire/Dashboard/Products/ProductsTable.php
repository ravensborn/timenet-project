<?php

namespace App\Http\Livewire\Dashboard\Products;

use App\Models\Product;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class ProductsTable extends DataTableComponent
{

    use LivewireAlert;

    protected $model = Product::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setTableAttributes([
            'class' => 'table-sm table-bordered',
        ]);
        $this->setTableWrapperAttributes([
            'class' => 'table-responsive'
        ]);

    }

    public function builder(): \Illuminate\Database\Eloquent\Builder
    {
        return Product::query()
            ->with(['visitLogs'])
            ->orderBy('created_at', 'desc');
    }

    public function columns(): array
    {
        return [
            Column::make("#", "id"),
            Column::make("Name", "name")
                ->searchable(),
            Column::make("View Count", "id")
                ->format(function ($value, $row, $column) {
                    return count($row->visitLogs);
                }),
            Column::make("Purchasable Online", "is_purchasable_online")
                ->format(function ($value, $row, $column) {
                    return $value ? 'Yes' : 'No';
                })->searchable(),
            Column::make("Created at", "created_at")
                ->format(function ($value, $row, $column) {
                    if ($value) {
                        return $value->format('d-m-Y / h:i A');
                    }
                    return '';
                }),
            Column::make("Actions", "id")->format(function ($value, $row, $column) {

                $product = Product::find($value);

                $deleteBtn = '<button wire:click="triggerDeleteItem(' . $value . ')"  class="btn btn-danger btn-sm me-1"><i class="bi bi-trash"></i></button>';
                $editBtn = '<a href="' . route('dashboard.products.edit', $product->slug) . '" class="btn btn-warning btn-sm me-1"><i class="bi bi-pen"></i></a>';
                $mediaManagerBtn = '<a  href="' . route('dashboard.products.media-manager', $product->id) . '" class="btn btn-info btn-sm me-1"><i class="bi bi-card-image"></i> Media Manager</a>';
                $viewBtn = '<a target="_blank" href="' . route('store.products.show', $product->slug) . '" class="btn btn-info btn-sm me-1"><i class="bi bi-list"></i> View in store</a>';

                return $viewBtn . $mediaManagerBtn .  $editBtn . $deleteBtn;
            })->html(),

        ];
    }


    public $itemToBeDeleted = null;

    protected $listeners = [
        'deleteItem',
        'refresh-items' => '$refresh',
    ];

    public function triggerDeleteItem(Product $item): void
    {
        $this->confirm('Are you sure that you want to delete this item?', [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => true,
            'cancelButtonText' => 'Cancel',
            'confirmButtonText' => 'Yes',
            'onConfirmed' => 'deleteItem'
        ]);

        $this->itemToBeDeleted = $item;
    }

    public function deleteItem(): void
    {
        if ($this->itemToBeDeleted) {
            $this->itemToBeDeleted->delete();
        }

        $this->alert('success', 'Item successfully deleted.', [
            'position' => 'top-end',
            'timer' => 5000,
            'toast' => true,
        ]);

    }


}
