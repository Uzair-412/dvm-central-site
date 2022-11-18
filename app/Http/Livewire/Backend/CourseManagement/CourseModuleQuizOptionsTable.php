<?php

namespace App\Http\Livewire\Backend\CourseManagement;

use App\Models\CourseModuleQuizOption;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;

/**
 * Class RolesTable.
 */
class CourseModuleQuizOptionsTable extends DataTableComponent
{
    /**
     * @return Builder
     */
    public $params;

    public function query(): Builder
    {
        return CourseModuleQuizOption::query()->where('quiz_id', $this->params)->when($this->getFilter('search'), fn ($query, $term) => $query->where('id', 'like', '%'.$term.'%')
        ->orWhere('quiz_option', 'like', '%'.$term.'%'))
        ->when($this->getFilter('order_by'), fn ($query, $order_by) => $query->orderBy('quiz_option', $order_by));
    }

    public function filters(): array
    {
        return [
            'order_by' => Filter::make('Order By')
                ->select([
                    '' => 'None',
                    'ASC' => 'Ascending',
                    'DESC' => 'Descending',
                ]),
        ];
    }

    public function columns(): array
    {
        return [
            Column::make(__('ID'), 'id')
                ->sortable()
                ->searchable(),
            Column::make(__('Options'), 'quiz_option')
                ->sortable()
                ->searchable(),
            Column::make(__('True Option'), 'is_true'),
            Column::make(__('Actions')),
        ];
    }

    public function rowView(): string
    {
        return 'backend.course_management.modules.quizes.row_options';
    }
}
