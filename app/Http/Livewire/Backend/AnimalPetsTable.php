<?php

namespace App\Http\Livewire\Backend;

use App\Models\AnimalPet;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;

/**
 * Class RolesTable.
 */
class AnimalPetsTable extends DataTableComponent
{
    /**
     * @return Builder
     */
    public function query(): Builder
    {
        return AnimalPet::query()->when($this->getFilter('search'), fn ($query, $term) => $query->where('id', 'like', '%'.$term.'%')
        ->orWhere('name', 'like', '%'.$term.'%')->orWhere('site_url', 'like', '%'.$term.'%')->orWhere('position', 'like', '%'.$term.'%'))
        ->when($this->getFilter('active'), fn ($query, $active) => $query->where('status', $active));
    }

   //  public function filters(): array
   //  {
   //      return [
   //          'active' => Filter::make('Status')
   //              ->select([
   //                  '' => 'Any',
   //                  'Y' => 'Active',
   //                  'N' => 'In-active',
   //              ]),
   //      ];
   //  }

    public function columns(): array
    {
        return [
            Column::make(__('ID'), 'id')
                ->sortable()
                ->searchable(),
            Column::make(__('Name'), 'name')
                ->sortable()
                ->searchable(),
            Column::make(__('Position'), 'position')
                ->sortable()
                ->searchable(),
            Column::make(__('Live Site URL'), 'site_url')
                ->sortable()
                ->searchable(),
            Column::make(__('Actions')),
        ];
    }

    public function rowView(): string
    {
        return 'backend.animal-pets.includes.row';
    }
}
