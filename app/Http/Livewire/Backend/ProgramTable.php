<?php

namespace App\Http\Livewire\Backend;

use App\Models\Program;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;

/**
 * Class RolesTable.
 */
class ProgramTable extends DataTableComponent
{
    /**
     * @return Builder
     */
    public function query(): Builder
    {
        return Program::query()->when($this->getFilter('search'), fn ($query, $term) => $query->where('id', 'like', '%' . $term . '%')
            // ->with(['type' => function ($query, $term) {
            //     $query->orWhere('name', 'like', '%' . $term . '%');
            // }])
            ->orWhere('slug', 'like', '%' . $term . '%'))
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
            Column::make(__('Type'), '')
                ->sortable()
                ->searchable(),
            Column::make(__('Institute'), '')
                ->sortable()
                ->searchable(),
            Column::make(__('Director'), '')
                ->sortable()
                ->searchable(),
            Column::make(__('Status'), 'status')
                ->sortable(),
            Column::make(__('Actions')),
        ];
    }

    public function rowView(): string
    {
        return 'backend.programs.row';
    }
}
