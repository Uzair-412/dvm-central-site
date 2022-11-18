<?php

namespace App\Http\Livewire\Backend;

use App\Models\Pet;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

/**
 * Class RolesTable.
 */
class PetsTable extends DataTableComponent
{
    /**
     * @return Builder
     */
    public function query(): Builder
    {
        return Pet::query()->when($this->getFilter('search'), fn ($query, $term) => $query->where('id', 'like', '%'.$term.'%')
        ->orWhere('first_name', 'like', '%'.$term.'%')->orWhere('pet_name', 'like', '%'.$term.'%')
        ->orWhere('email', 'like', '%'.$term.'%')->orWhere('pet_age', 'like', '%'.$term.'%'));
    }

    public function columns(): array
    {
        return [
            Column::make(__('ID'), 'id')
                ->sortable()
                ->searchable(),
            Column::make(__('Name'), 'first_name')
                ->sortable()
                ->searchable(),
            Column::make(__('Email'), 'email')
                ->sortable()
                ->searchable(),
            Column::make(__('Pet Name'), 'pet_name')
                ->sortable()
                ->searchable(),
            Column::make(__('Pet Age'), 'pet_age')
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
        return 'backend.pets.includes.row';
    }
}
