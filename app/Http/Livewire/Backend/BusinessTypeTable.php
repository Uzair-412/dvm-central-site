<?php

namespace App\Http\Livewire\Backend;

use App\Models\BusinessType;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;

/**
 * Class RolesTable.
 */
class BusinessTypeTable extends DataTableComponent
{
    /**
     * @return Builder
     */
    public function query(): Builder
    {
        return BusinessType::query()->when($this->getFilter('search'), fn ($query, $term) => $query->where('id', 'like', '%'.$term.'%')
        ->orWhere('name', 'like', '%'.$term.'%')->orWhere('slug', 'like', '%'.$term.'%')
        ->orWhere('short_description', 'like', '%'.$term.'%')->orWhere('display_position', 'like', '%'.$term.'%'))
        ->when($this->getFilter('active'), fn ($query, $active) => $query->where('status', $active))
        ->when($this->getFilter('show_in_main_menu'), fn ($query, $show_in_main_menu) => $query->where('show_in_main_menu', $show_in_main_menu))
        ->when($this->getFilter('show_in_home_page'), fn ($query, $show_in_home_page) => $query->where('show_in_home_page', $show_in_home_page));
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
            'show_in_main_menu' => Filter::make('Show In Menu')
                ->select([
                    '' => 'Any',
                    'Y' => 'Yes',
                    'N' => 'No',
                ]),
            'show_in_home_page' => Filter::make('Show In Home')
                ->select([
                    '' => 'Any',
                    'Y' => 'Yes',
                    'N' => 'No',
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
            Column::make(__('Slug'), 'slug')
                ->sortable()
                ->searchable(),
            Column::make(__('Short Description'), 'short_description')
                ->sortable()
                ->searchable(),
            Column::make(__('Display Position'), 'display_position')
                ->sortable()
                ->searchable(),
            Column::make(__('Show In Menu'), 'show_in_main_menu')
                ->sortable(),
            Column::make(__('Show In Home'), 'show_in_home_page')
                ->sortable(),
            Column::make(__('Status'), 'status')
                ->sortable(),
            Column::make(__('Actions')),
        ];
    }

    public function rowView(): string
    {
        return 'backend.business-type.includes.row';
    }
}
