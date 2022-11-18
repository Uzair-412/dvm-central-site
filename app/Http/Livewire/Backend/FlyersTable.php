<?php

namespace App\Http\Livewire\Backend;

use App\Models\Flyer;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;

/**
 * Class RolesTable.
 */
class FlyersTable extends DataTableComponent
{
    /**
     * @return Builder
     */
    public function query(): Builder
    {
        return Flyer::query()->when($this->getFilter('search'), fn ($query, $term) => $query->where('id', 'like', '%'.$term.'%')->orWhere('name', 'like', '%'.$term.'%'))
        ->when($this->getFilter('active'), fn ($query, $active) => $query->where('status', $active));
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
        ];
    }

    public function columns(): array
    {
        return [
            Column::make(__('ID'), 'id')
                ->sortable()
                ->searchable(),
            Column::make(__('Flyer')),
            Column::make(__('Name'), 'name')
                ->sortable()
                ->searchable(),
            Column::make(__('Status'), 'status'),
            Column::make(__('Actions')),
        ];
    }

    public function rowView(): string
    {
        return 'backend.flyers.includes.row';
    }
}
