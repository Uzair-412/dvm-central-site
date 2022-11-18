<?php

namespace App\Http\Livewire\Backend\JobManagement;
use App\Models\JobCategory;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

/**
 * Class RolesTable.
 */
class JobCategoryTable extends DataTableComponent
{
    /**
     * @return Builder
     */
    public function query(): Builder
    {
        return JobCategory::query()
            ->when(
                $this->getFilter('search'),
                fn($query, $term) => $query
                    ->where('id', 'like', '%' . $term . '%')
                    ->orWhere('name', 'like', '%' . $term . '%')
            )
            ->when(
                $this->getFilter('active'),
                fn($query, $active) => $query->where('status', $active)
            );
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
            Column::make(__('Actions')),
        ];
    }

    public function rowView(): string
    {
        return 'backend.jobs_management.job_category.row';
    }
}
