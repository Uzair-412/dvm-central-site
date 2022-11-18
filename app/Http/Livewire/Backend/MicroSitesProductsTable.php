<?php

namespace App\Http\Livewire\Backend;

use App\Models\MicroSitesProducts;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;

/**
 * Class RolesTable.
 */
class MicroSitesProductsTable extends DataTableComponent
{
    /**
     * @return Builder
     */
    public function query(): Builder
    {
        return MicroSitesProducts::query()->when($this->getFilter('search'), fn ($query, $term) => $query->where('id', 'like', '%'.$term.'%')
        ->orWhere('name', 'like', '%'.$term.'%'))
        ->when($this->getFilter('site_id'), fn ($query, $site_id) => $query->where('site_id', $site_id));
    }

    public function filters(): array
    {
        return [
            'site_id' => Filter::make('Micro Site Products')
                ->select([
                    '' => 'Any',
                    '1' => 'Horse Dental Instruments',
                    '2' => 'Spay Surgery',
                    '3' => 'Vet Tooth Tech',
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
            Column::make(__('SKU')),
            Column::make(__('Featured')),
            Column::make(__('Position')),
            Column::make(__('Actions')),
        ];
    }

    public function rowView(): string
    {
        return 'backend.micro-sites.products.includes.row';
    }
}
