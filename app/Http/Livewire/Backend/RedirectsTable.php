<?php

namespace App\Http\Livewire\Backend;

use App\Models\Redirect;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;

/**
 * Class RolesTable.
 */
class RedirectsTable extends DataTableComponent
{
    /**
     * @return Builder
     */
    public function query(): Builder
    {
        return Redirect::query()->when($this->getFilter('search'), fn ($query, $term) => $query->where('id', 'like', '%'.$term.'%')
        ->orWhere('request_url', 'like', '%'.$term.'%')->orWhere('target_url', 'like', '%'.$term.'%')
        ->orWhere('type', 'like', '%'.$term.'%')->orWhere('mode', 'like', '%'.$term.'%'))
        ->when($this->getFilter('type'), fn ($query, $type) => $query->where('type', $type))
        ->when($this->getFilter('mode'), fn ($query, $mode) => $query->where('mode', $mode));
    }

    public function filters(): array
    {
        return [
            'type' => Filter::make('Type')
                ->select([
                    '' => 'Any',
                    'product' => 'Product',
                    'category' => 'Category',
                ]),
            'mode' => Filter::make('Mode')
                ->select([
                    '' => 'Any',
                    'internal' => 'Internal',
                    'external' => 'External',
                ]),
        ];
    }

    public function columns(): array
    {
        return [
            Column::make(__('ID'), 'id')
                ->sortable()
                ->searchable(),
            Column::make(__('Request URL'), 'request_url')
                ->sortable()
                ->searchable(),
            Column::make(__('Target URL'), 'target_url')
                ->sortable()
                ->searchable(),
            Column::make(__('Type'), 'type')
                ->sortable()
                ->searchable(),
            Column::make(__('Mode'), 'mode')
                ->sortable()
                ->searchable(),
            Column::make(__('Actions')),
        ];
    }

    public function rowView(): string
    {
        return 'backend.redirects.includes.row';
    }
}
