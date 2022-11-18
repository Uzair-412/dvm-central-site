<?php

namespace App\Http\Livewire\Backend;

use App\Models\Coupon;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;

/**
 * Class RolesTable.
 */
class CouponsTable extends DataTableComponent
{
    /**
     * @return Builder
     */
    public function query(): Builder
    {
        return Coupon::query()->when($this->getFilter('search'), fn ($query, $term) => $query->where('id', 'like', '%'.$term.'%')
        ->orWhere('name', 'like', '%'.$term.'%')->orWhere('coupon', 'like', '%'.$term.'%'))
        ->when($this->getFilter('active'), fn ($query, $active) => $query->where('status', $active))
        ->when($this->getFilter('type'), fn ($query, $type) => $query->where('type', $type));
    }

    public function filters(): array
    {
        return [
            'active' => Filter::make('Status')
                ->select([
                    '' => 'Any',
                    'N' => 'In-active',
                    'Y' => 'Active',
                ]),
            'type' => Filter::make('Type')
                ->select([
                    '' => 'Any',
                    '1' => 'Amount Discount',
                    '2' => 'Percentage Discount',
                    '3' => 'BOGO: Buy X Get X Free',
                    '4' => 'BOGO: Buy X Get % Discount on Y',
                    '5' => 'BOGO: Buy X Get Y Free',
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
            Column::make(__('Type'), 'type')
                ->sortable()
                ->searchable(),
            Column::make(__('Coupon'), 'coupon')
                ->sortable()
                ->searchable(),
            Column::make(__('Status'), 'status'),
            Column::make(__('Actions')),
        ];
    }

    public function rowView(): string
    {
        return 'backend.coupons.includes.row';
    }
}
