<?php

namespace App\Http\Livewire\Dashboard\Orders;

use App\Models\Order;
use Lwwcas\LaravelCountries\Models\Country;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class OrdersTable extends DataTableComponent
{
    protected $model = Order::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setTableAttributes([
            'class' => 'table-sm table-bordered',
        ]);

    }

    public function columns(): array
    {
        return [
            Column::make("Number", "number")->searchable(),
            Column::make("User", "user_id")
                ->format(function ($value, $row, $column) {
                    return "<a href=''>" . $row->user->email . "</a>";
                })->html()
                ->sortable(),
            Column::make("Status", "status")
                ->format(function ($value, $row, $column) {
                    return "<span class='badge bg-" . $row->getStatusColorAndIcon()['color'] . "'>" . $row->getStatusName() . "</span>";
                })->html()
                ->sortable(),

            Column::make("Total", "total")
                ->format(function ($value, $row, $column) {
                    return '$' . number_format($value, 2);
                })->html()
                ->sortable(),

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

                return $viewBtn . $editBtn;
            })->html(),

        ];
    }
}
