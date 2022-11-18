<?php

namespace App\Http\Livewire\Backend\CourseManagement;

use App\Models\CourseType;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;

/**
 * Class RolesTable.
 */
class CourseTypesTable extends DataTableComponent
{
    /**
     * @return Builder
     */
    public function query(): Builder
    {
        return CourseType::query()->when($this->getFilter('search'), fn ($query, $term) => $query->where('id', 'like', '%'.$term.'%')
        ->orWhere('name', 'like', '%'.$term.'%'))
        ->when($this->getFilter('active'), fn ($query, $active) => $query->where('status', $active));
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
            Column::make(__('Status'), 'status')
                ->sortable()
                ->searchable(),
            Column::make(__('Actions')),
        ];
    }

    public function rowView(): string
    {
        return 'backend.course_management.type.row';
    }
}
