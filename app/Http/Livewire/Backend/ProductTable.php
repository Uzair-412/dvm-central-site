<?php

namespace App\Http\Livewire\Backend;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;

/**
 * Class RolesTable.
 */
class ProductTable extends DataTableComponent
{
    /**
     * @return Builder
     */
    public function query(): Builder
    {
        return Product::query()
        ->when($this->getFilter('active'), fn ($query, $active) => $query->where('status', $active))
        ->when($this->getFilter('visibility'), fn ($query, $visibility) => $query->where('visibility', $visibility))
        ->when($this->getFilter('type'), fn ($query, $type) => $query->where('type', $type))
        ->when($this->getFilter('search'), fn ($query, $term) => $query->where(function($q) use($term) {
            $q->orWhere('id', 'like', '%'.$term.'%')
            ->orWhere('image', 'like', '%'.$term.'%')->orWhere('name', 'like', '%'.$term.'%')
            ->orWhere('sku', 'like', '%'.$term.'%')->orWhere('type', 'like', '%'.$term.'%')
            ->orWhere('visibility', 'like', '%'.$term.'%')->orWhere('price', 'like', '%'.$term.'%');
        })
        );
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
            'visibility' => Filter::make('Visibility')
                ->select([
                    '' => 'Any',
                    '1' => 'Catalog, Search',
                    '2' => 'Catalog',
                    '3' => 'Search',
                ]),
                'type' => Filter::make('Type')
                ->select([
                    '' => 'Any',
                    'simple' => 'Simple Products',
                    'variation' => 'Product with Variations',
                    'child' => 'Child Products',
                ]),
        ];
    }

    public function columns(): array
    {
        return [
            Column::make(__('ID'), 'id')
                ->sortable()
                ->searchable(),
            Column::make(__('Image'), 'image')
                ->sortable()
                ->searchable(),
            Column::make(__('Name'), 'name')
                ->sortable()
                ->searchable(),
            Column::make(__('Category')),
            Column::make(__('SKU'), 'sku')
                ->sortable()
                ->searchable(),
            Column::make(__('Type'), 'type')
                ->sortable()
                ->searchable(),
            Column::make(__('Visibility'), 'visibility')
                ->sortable()
                ->searchable(),
            Column::make(__('Price'), 'price')
                ->sortable()
                ->searchable(),
            Column::make(__('Status'), 'status'),
            Column::make(__('Actions')),
        ];
    }

    public function rowView(): string
    {
        return 'backend.product.includes.row';
    }
}
