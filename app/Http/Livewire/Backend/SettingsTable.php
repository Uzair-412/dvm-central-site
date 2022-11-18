<?php

namespace App\Http\Livewire\Backend;

use App\Models\Settings;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

/**
 * Class RolesTable.
 */
class SettingsTable extends DataTableComponent
{
    /**
     * @return Builder
     */
    public function query(): Builder
    {
        return Settings::query()->when($this->getFilter('search'), fn ($query, $term) => $query->where('id', 'like', '%'.$term.'%')->orWhere('name', 'like', '%'.$term.'%'));
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
        return 'backend.settings.includes.row';
    }
}
