<?php

namespace App\Http\Livewire\Dashboard\Products;

use App\Models\Product;
use Lwwcas\LaravelCountries\Models\Country;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class ProductsTable extends DataTableComponent
{
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

    public function columns(): array
    {
        return [
            Column::make("#", "id"),
            Column::make("Name", "name")
                ->sortable()
                ->searchable(),
            Column::make("Created at", "created_at")
                ->format(function ($value, $row, $column) {
                    if ($value) {
                        return $value->format('d-m-Y / h:i A');
                    }
                    return '';
                })->html()
                ->sortable(),
            Column::make("Actions", "id")->format(function ($value, $row, $column) {

                $deleteBtn = '<button class="btn btn-danger btn-sm me-1"><i class="bi bi-trash"></i></button>';
                $editBtn = '<button class="btn btn-warning btn-sm me-1"><i class="bi bi-pen"></i></button>';
                $viewBtn = '<button class="btn btn-info btn-sm me-1"><i class="bi bi-list"></i> View</button>';

                return $viewBtn . $editBtn . $deleteBtn;
            })->html(),

        ];
    }


}
