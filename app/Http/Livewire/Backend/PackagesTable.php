<?php

namespace App\Http\Livewire\Backend;

use App\Models\Package;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;

/**
 * Class RolesTable.
 */
class PackagesTable extends DataTableComponent
{
    /**
     * @return Builder
     */
    public function query(): Builder
    {
        return Package::query()->when($this->getFilter('search'), fn ($query, $term) => $query->where('id', 'like', '%'.$term.'%') ->orWhere('name', 'like', '%'.$term.'%')
        ->orWhere('description', 'like', '%'.$term.'%')->orWhere('no_of_products', 'like', '%'.$term.'%')->orWhere('no_of_monthly_deals', 'like', '%'.$term.'%'))
        ->when($this->getFilter('discount_coupons_module'), fn ($query, $discount_coupons_module) => $query->where('discount_coupons_module', $discount_coupons_module));
    }

    public function filters(): array
    {
        return [
            'discount_coupons_module' => Filter::make('Discount Coupons Module')
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
            Column::make(__('ID'), 'id')
                ->sortable()
                ->searchable(),
            Column::make(__('Name'), 'name')
                ->sortable()
                ->searchable(),
            Column::make(__('Description'), 'description')
                ->sortable()
                ->searchable(),
            Column::make(__('Num Of Products'), 'no_of_products')
                ->sortable()
                ->searchable(),
            Column::make(__('Num Of Monthly Deals'), 'no_of_monthly_deals')
                ->sortable()
                ->searchable(),
            Column::make(__('Discount Coupons Module'), 'discount_coupons_module')
                ->sortable()
                ->searchable(),
            Column::make(__('Actions')),
        ];
    }

    public function rowView(): string
    {
        return 'backend.packages.includes.row';
    }
}
