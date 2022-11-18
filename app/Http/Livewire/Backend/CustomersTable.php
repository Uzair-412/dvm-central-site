<?php

namespace App\Http\Livewire\Backend;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;

/**
 * Class RolesTable.
 */
class CustomersTable extends DataTableComponent
{
    /**
     * @return Builder
     */
    public function query(): Builder
    {
        return Customer::query()->with('group')->when($this->getFilter('search'), fn ($query, $term) => $query->where('id', 'like', '%'.$term.'%')
        ->orWhere('name', 'like', '%'.$term.'%')->orWhere('email', 'like', '%'.$term.'%')
        ->orWhere('last_login_at', 'like', '%'.$term.'%')->orWhere('type', 'like', '%'.$term.'%'))
        ->when($this->getFilter('active'), fn ($query, $active) => $query->where('active', $active))
        ->when($this->getFilter('confirmed'), fn ($query, $confirmed) => $query->where('confirmed', $confirmed))
        ->when($this->getFilter('group'), fn ($query, $group) => $query->where('group_id', $group))
        ->when($this->getFilter('type'), fn ($query, $type) => $query->where('type', $type));
    }

    public function filters(): array
    {
        return [
            'active' => Filter::make('Status')
                ->select([
                    '' => 'Any',
                    '0' => 'In-active',
                    '1' => 'Active',
                ]),
            'confirmed' => Filter::make('Confirmed')
                ->select([
                    '' => 'Any',
                    '1' => 'Confirmed',
                    '0' => 'Not Confirmed',
                ]),
            'group' => Filter::make('Group')
                ->select([
                    '' => 'Any',
                    '1' => 'General',
                    '2' => 'Level A',
                    '3' => 'Level B',
                ]),
            'type' => Filter::make('Type')
                ->select([
                    '' => 'Any',
                    'admin' => 'Admin',
                    'customer' => 'Customer',
                    'user' => 'User',
                    'staff' => 'Staff',
                    'vendor' => 'Vendor',
                ]),
        ];
    }

    public function columns(): array
    {
        return [
            Column::make(__('ID'), 'id')
                ->sortable()
                ->searchable(),
            Column::make(__('Name'), 'name')
                ->sortable()
                ->searchable(),
            Column::make(__('Email'), 'email')
                ->sortable()
                ->searchable(),
            Column::make(__('Level'), 'level')
                ->sortable()
                ->searchable(),
            Column::make(__('Confirmed'), 'confirmed')
                ->sortable(),
            Column::make(__('Last Login'), 'last_login_at')
                ->sortable()
                ->searchable(),
            Column::make(__('Type'), 'type')
                ->sortable()
                ->searchable(),
            Column::make(__('Status'), 'active')
                ->sortable(),
            Column::make(__('Actions')),
            Column::make(__('Documents')),
        ];
    }

    public function rowView(): string
    {
        return 'backend.customers.includes.row';
    }
}
