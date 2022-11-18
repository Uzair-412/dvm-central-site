<?php

namespace App\Http\Livewire\Backend;

use App\Models\Webinar;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;

/**
 * Class RolesTable.
 */
class WebinarsTable extends DataTableComponent
{
    /**
     * @return Builder
     */
    public function query(): Builder
    {
        return Webinar::query()->when($this->getFilter('search'), fn ($query, $term) => $query->where('id', 'like', '%'.$term.'%')
        ->orWhere('name', 'like', '%'.$term.'%'))
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
            Column::make(__('Webinar Name'), 'name')
                ->sortable()
                ->searchable(),
            Column::make(__('Start Date'), 'start_date')
                ->sortable()
                ->searchable(),
            Column::make(__('End Date'), 'end_date')
                ->sortable()
                ->searchable(),
            Column::make(__('Location'), 'location')
                ->sortable()
                ->searchable(),
            Column::make(__('Zoom Link'), 'zoom_link')
                ->sortable(),
            Column::make(__('Status'), 'status')
                ->sortable(),
            Column::make(__('Actions')),
        ];
    }

    public function rowView(): string
    {
        return 'backend.webinars.includes.row';
    }
}
