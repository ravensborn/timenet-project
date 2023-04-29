<?php

namespace App\Http\Livewire\Dashboard\Users;

use App\Models\User;
use Lwwcas\LaravelCountries\Models\Country;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class UsersTable extends DataTableComponent
{
    protected $model = User::class;


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
            Column::make("E-Mail", "email")
                ->sortable()
                ->searchable(),
            Column::make("Phone", "phone_number")
                ->sortable()
                ->searchable(),
            Column::make("Country", "lc_country_id")
                ->format(function ($value, $row, $column) {
                    return Country::find($value)->iso_alpha_3;
                })
                ->html(),
            Column::make("Verified at", "email_verified_at")
                ->format(function ($value, $row, $column) {
                    if ($value) {
                        return $value->format('d-m-Y / h:i A');
                    }
                    return '';
                })->html()
                ->sortable(),
//            Column::make("Created at", "created_at")
//                ->format(function ($value, $row, $column) {
//                    if ($value) {
//                        return $value->format('d-m-Y / h:i A');
//                    }
//                    return '';
//                })->html()
//                ->sortable(),
            Column::make("Actions", "id")->format(function ($value, $row, $column) {

                $deleteBtn = '<button class="btn btn-danger btn-sm me-1"><i class="bi bi-trash"></i></button>';
                $editBtn = '<button class="btn btn-warning btn-sm me-1"><i class="bi bi-pen"></i></button>';
                $viewBtn = '<button class="btn btn-info btn-sm me-1"><i class="bi bi-list"></i> View</button>';
                $ordersBtn = '<button class="btn btn-info btn-sm me-1"><i class="bi bi-list"></i> Orders</button>';

                return $ordersBtn . $viewBtn . $editBtn . $deleteBtn;
            })->html(),

        ];
    }




}
