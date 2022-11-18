<?php

namespace App\Http\Livewire\Backend;

use App\Models\Address;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;

/**
 * Class RolesTable.
 */
class CustomersAddressesTable extends DataTableComponent
{
    /**
     * @return Builder
     */
    public function query(): Builder
    {
        return Address::query()->when($this->getFilter('search'), fn ($query, $term) => $query->where('id', 'like', '%'.$term.'%')
        ->orWhere('name', 'like', '%'.$term.'%')->orWhere('email', 'like', '%'.$term.'%')
        ->orWhere('last_login_at', 'like', '%'.$term.'%'))
        ->when($this->getFilter('default_billing'), fn ($query, $default_billing) => $query->where('default_billing', $default_billing))
        ->when($this->getFilter('default_shipping'), fn ($query, $default_shipping) => $query->where('default_shipping', $default_shipping));
    }

    public function filters(): array
    {
        return [
            'default_billing' => Filter::make('Default Billing')
                ->select([
                    '' => 'Any',
                    'N' => 'No',
                    'Y' => 'Yes',
                ]),
            'default_shipping' => Filter::make('Default Shipping')
                ->select([
                    '' => 'Any',
                    'N' => 'No',
                    'Y' => 'Yes',
                ]),
        ];
    }

    public function columns(): array
    {
        return [
            Column::make(__('Name'), 'first_name')
                ->sortable()
                ->searchable(),
            Column::make(__('Company'), 'company')
                ->sortable()
                ->searchable(),
            Column::make(__('Address'), 'address1')
                ->sortable()
                ->searchable(),
            Column::make(__('Phone'), 'phone')
                ->sortable()
                ->searchable(),
            Column::make(__('VAT'), 'vat')
                ->sortable(),
            Column::make(__('Default Billing'), 'default_billing')
                ->sortable()
                ->searchable(),
            Column::make(__('Default Shipping'), 'default_shipping')
                ->sortable()
                ->searchable(),
            Column::make(__('Actions')),
        ];
    }

    public function rowView(): string
    {
        return 'backend.customers.addresses.includes.row';
    }
}
