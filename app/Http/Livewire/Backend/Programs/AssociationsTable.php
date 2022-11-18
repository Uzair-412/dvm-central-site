<?php

namespace App\Http\Livewire\Backend\Programs;

use App\Models\Programs\Association;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;

/**
 * Class RolesTable.
 */
class AssociationsTable extends DataTableComponent
{
    /**
     * @return Builder
     */
    public function query(): Builder
    {  
            
        
        return Association::query()->when($this->getFilter('search'), fn ($query, $term) => $query->where('id', 'like', '%' . $term . '%')
            ->orWhere('name', 'like', '%' . $term . '%')
            ->orWhere('address_line_1', 'like', '%' . $term . '%')
            ->orWhere('slug', 'like', '%' . $term . '%')
            )
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
            Column::make(__('Name'), 'name')
                ->sortable()
                ->searchable(),
            Column::make(__('Address'), 'address_line_1')
                ->sortable()
                ->searchable(),
            Column::make(__('Status'), 'status')
                ->sortable(),
            Column::make(__('Actions')),
        ];
    }

    public function rowView(): string
     {  
        return 'backend.programs.associations.row';
    }
}
