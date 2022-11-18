<?php

namespace App\Http\Livewire\Backend;

use App\Models\Review;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;

/**
 * Class RolesTable.
 */
class ReviewsTable extends DataTableComponent
{
    /**
     * @return Builder
     */
    public function query(): Builder
    {
        return Review::query()->with('product')->when($this->getFilter('search'), fn ($query, $term) => $query->where('id', 'like', '%'.$term.'%')
        ->orWhere('name', 'like', '%'.$term.'%')->orWhere('comments', 'like', '%'.$term.'%')
        ->orWhere('created_at', 'like', '%'.$term.'%'))
        ->when($this->getFilter('active'), fn ($query, $active) => $query->where('status', $active))
        ->when($this->getFilter('rating'), fn ($query, $rating) => $query->where('rating', $rating));
    }

    public function filters(): array
    {
        return [
            'active' => Filter::make('Status')
                ->select([
                    '' => 'Any',
                    'N' => 'In-active',
                    'Y' => 'Active',
                ]),
            'rating' => Filter::make('Rating')
                ->select([
                    '' => 'Any',
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                    '5' => '5',
                ]),
        ];
    }

    public function columns(): array
    {
        return [
            Column::make(__('ID'), 'id')
                ->sortable()
                ->searchable(),
            Column::make(__('Review By'), 'name')
                ->sortable()
                ->searchable(),
            Column::make(__('Product')),
            Column::make(__('Comments'), 'comments')
                ->sortable()
                ->searchable(),
            Column::make(__('Rating'), 'rating')
                ->sortable()
                ->searchable(),
            Column::make(__('Status'), 'status'),
            Column::make(__('Date Added'), 'created_at')
                ->sortable()
                ->searchable(),
            Column::make(__('Actions')),
        ];
    }

    public function rowView(): string
    {
        return 'backend.reviews.includes.row';
    }
}
