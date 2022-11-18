<?php

namespace App\Http\Livewire\Backend\CourseManagement;

use App\Models\CourseModule;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;

/**
 * Class RolesTable.
 */
class CourseModulesTable extends DataTableComponent
{
    /**
     * @return Builder
     */
    public $params;

    public function query(): Builder
    {
        return CourseModule::query()->where('course_id', $this->params)->when($this->getFilter('search'), fn ($query, $term) => $query->where('id', 'like', '%'.$term.'%')
        ->orWhere('title', 'like', '%'.$term.'%')->orWhere('short_description', 'like', '%'.$term.'%'))
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
            Column::make(__('Title'), 'title')
                ->sortable()
                ->searchable(),
            Column::make(__('Watch hours'), 'watch_hours')
                ->sortable()
                ->searchable(),
            Column::make(__('Videos'), ''),
            Column::make(__('Free'), 'is_free'),
            Column::make(__('Status'), 'status')
                ->sortable()
                ->searchable(),
            Column::make(__('Actions')),
        ];
    }

    public function rowView(): string
    {
        return 'backend.course_management.modules.row';
    }
}
