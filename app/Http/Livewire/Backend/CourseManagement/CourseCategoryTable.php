<?php

namespace App\Http\Livewire\Backend\CourseManagement;

use App\Models\CourseCategory;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;

/**
 * Class RolesTable.
 */
class CourseCategoryTable extends DataTableComponent
{
    /**
     * @return Builder
     */
    public function query(): Builder
    {
        return CourseCategory::query()->when($this->getFilter('search'), fn ($query, $term) => $query->where('id', 'like', '%'.$term.'%')
        ->orWhere('name', 'like', '%'.$term.'%')->orWhere('short_description', 'like', '%'.$term.'%'));
        // ->when($this->getFilter('active'), fn ($query, $active) => $query->where('status', $active));
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
            Column::make(__('Short Description'), 'short_description')
                ->sortable()
                ->searchable(),
            Column::make(__('Actions')),
        ];
    }

    public function rowView(): string
    {
        return 'backend.course_management.category.includes.row';
    }
}
