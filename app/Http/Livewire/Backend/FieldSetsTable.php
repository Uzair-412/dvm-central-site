<?php

namespace App\Http\Livewire\Backend;

use App\Models\FieldSet;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;

/**
 * Class RolesTable.
 */
class FieldSetsTable extends DataTableComponent
{
    /**
     * @return Builder
     */
    public function query(): Builder
    {
        return FieldSet::query()->with('business_types')->when($this->getFilter('search'), fn ($query, $term) => $query->where('id', 'like', '%'.$term.'%')
        ->orWhere('title', 'like', '%'.$term.'%')->orWhere('description', 'like', '%'.$term.'%')->orWhere('display_position', 'like', '%'.$term.'%'))
        ->when($this->getFilter('active'), fn ($query, $active) => $query->where('status', $active));
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
        ];
    }

    public function columns(): array
    {
        return [
            Column::make(__('ID'), 'id')
                ->sortable()
                ->searchable(),
            Column::make(__('Business Type')),
            Column::make(__('Title'), 'title')
                ->sortable()
                ->searchable(),
            Column::make(__('Description'), 'description')
                ->sortable()
                ->searchable(),
            Column::make(__('Display Position'), 'display_position')
                ->sortable()
                ->searchable(),
            Column::make(__('Status'), 'status')
                ->sortable(),
            Column::make(__('Actions')),
        ];
    }

    public function rowView(): string
    {
        return 'backend.field-sets.includes.row';
    }
}
