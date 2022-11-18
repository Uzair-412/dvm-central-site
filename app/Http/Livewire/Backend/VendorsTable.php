<?php

namespace App\Http\Livewire\Backend;

use App\Models\Vendor;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;

/**
 * Class RolesTable.
 */
class VendorsTable extends DataTableComponent
{
    /**
     * @return Builder
     */
    public function query(): Builder
    {
        return Vendor::query()->with('business_types')->when($this->getFilter('search'), fn ($query, $term) => $query->where('id', 'like', '%'.$term.'%')
        ->orWhere('name', 'like', '%'.$term.'%')->orWhere('phone', 'like', '%'.$term.'%')->orWhere('slug', 'like', '%'.$term.'%'))
        ->when($this->getFilter('active'), fn ($query, $active) => $query->where('status', $active))
        ->when($this->getFilter('activated_account'), fn ($query, $activated_account) => $query->where('activated_account', $activated_account))
        ->when($this->getFilter('blocked_account'), fn ($query, $blocked_account) => $query->where('blocked_account', $blocked_account));
    }

    public function filters(): array
    {
        return [
            'active' => Filter::make('Status')
                ->select([
                    '' => 'Any',
                    'Y' => 'Active',
                    'N' => 'In-active',
                ]),
            'activated_account' => Filter::make('Activated')
                ->select([
                    '' => 'Any',
                    'Y' => 'Yes',
                    'N' => 'No',
                ]),
            'blocked_account' => Filter::make('Blocked')
                ->select([
                    '' => 'Any',
                    'Y' => 'Yes',
                    'N' => 'No',
                ]),
        ];
    }

    public function columns(): array
    {
        return [
            Column::make(__('ID'), 'id')
                ->sortable()
                ->searchable(),
            Column::make(__('Business Type')),
            Column::make(__('Name'), 'name')
                ->sortable()
                ->searchable(),
            Column::make(__('Phone'), 'phone')
                ->sortable()
                ->searchable(),
            Column::make(__('Slug'), 'slug')
                ->sortable()
                ->searchable(),
            Column::make(__('Activated'), 'activated_account')
                ->sortable(),
            Column::make(__('Blocked'), 'blocked_account')
                ->sortable(),
            Column::make(__('Status'), 'status')
                ->sortable(),
            Column::make(__('Actions')),
        ];
    }

    public function rowView(): string
    {
        return 'backend.vendors.includes.row';
    }
}
