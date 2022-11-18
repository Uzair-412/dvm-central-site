<?php

namespace App\Http\Livewire\Backend;

use App\Models\NewsPost;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;

/**
 * Class RolesTable.
 */
class NewsPostsTable extends DataTableComponent
{
    /**
     * @return Builder
     */
    public function query(): Builder
    {
        return NewsPost::query()->when($this->getFilter('search'), fn ($query, $term) => $query->where('id', 'like', '%' . $term . '%')
            ->orWhere('name', 'like', '%' . $term . '%')->orWhere('slug', 'like', '%' . $term . '%')->orWhere('short_content', 'like', '%' . $term . '%'))
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
            Column::make(__('Slug'), 'slug')
                ->sortable()
                ->searchable(),
            Column::make(__('Short Description'), 'short_content')
                ->sortable()
                ->searchable(),
            Column::make(__('Status'), 'status')
                ->sortable(),
            Column::make(__('Actions')),
        ];
    }

    public function rowView(): string
    {
        return 'backend.news.posts.row';
    }
}
