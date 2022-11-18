<?php

namespace App\Http\Livewire\Backend;

use App\Models\Block;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;

/**
 * Class RolesTable.
 */
class BlocksTable extends DataTableComponent
{
    /**
     * @return Builder
     */
    public function query(): Builder
    {
        return Block::query()->when($this->getFilter('search'), fn ($query, $term) => $query->where('id', 'like', '%'.$term.'%')
        ->orWhere('total_categories', 'like', '%'.$term.'%')->orWhere('slug', 'like', '%'.$term.'%')
        ->orWhere('position', 'like', '%'.$term.'%'))
        ->when($this->getFilter('status'), fn ($query, $active) => $query->where('status', $active))->orderBy('position', 'ASC');
    }

   public function filters(): array
   {
         return [
            'status' => Filter::make('Status')
            ->select([
               '' => 'Any',
               'In-active' => 'In-active',
               'Active' => 'Active',
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
         Column::make(__('Categories'), ''),
         Column::make(__('Position'), 'position')
            ->sortable()
            ->searchable(),
         Column::make(__('Status'), 'status'),
         Column::make(__('Actions')),
      ];
   }

    public function rowView(): string
    {
        return 'backend.category-blocks.includes.row';
    }
}
