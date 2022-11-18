<?php

namespace App\Http\Livewire\Backend;

use App\Models\Page;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

/**
 * Class RolesTable.
 */
class PagesTable extends DataTableComponent
{
    /**
     * @return Builder
     */
    public function query(): Builder
    {
        return Page::query()->when($this->getFilter('search'), fn ($query, $term) => $query->where('id', 'like', '%'.$term.'%')
        ->orWhere('name', 'like', '%'.$term.'%')->orWhere('heading', 'like', '%'.$term.'%')
        ->orWhere('slug', 'like', '%'.$term.'%')->orWhere('meta_title', 'like', '%'.$term.'%'));
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
            Column::make(__('Heading'), 'heading')
                ->sortable()
                ->searchable(),
            Column::make(__('Slug'), 'slug')
                ->sortable()
                ->searchable(),
            Column::make(__('Meta Title'), 'meta_title')
                ->sortable()
                ->searchable(),
            Column::make(__('Actions')),
        ];
    }

    public function rowView(): string
    {
        return 'backend.pages.includes.row';
    }
}
