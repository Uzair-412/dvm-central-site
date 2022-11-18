<?php

namespace App\Http\Livewire\Backend;

use App\Models\Invoice;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;

/**
 * Class RolesTable.
 */
class InvoicesTable extends DataTableComponent
{
    /**
     * @return Builder
     */
    public function query(): Builder
    {
        return Invoice::query()->when($this->getFilter('search'), fn ($query, $term) => $query->where('id', 'like', '%'.$term.'%')
        ->orWhere('title', 'like', '%'.$term.'%')->orWhere('invoice_number', 'like', '%'.$term.'%')
        ->orWhere('amound', 'like', '%'.$term.'%')->orWhere('due_date', 'like', '%'.$term.'%'))
        ->when($this->getFilter('active'), fn ($query, $active) => $query->where('status', $active));
    }

    public function filters(): array
    {
        return [
            'active' => Filter::make('Status')
                ->select([
                    '' => 'Any',
                    '0' => 'Pending',
                    '1' => 'Paid',
                ]),
        ];
    }

    public function columns(): array
    {
        return [
            Column::make(__('ID'), 'id')
                ->sortable()
                ->searchable(),
            Column::make(__('Customer Name'), 'customer_id')
                ->sortable()
                ->searchable(),
            Column::make(__('Title'), 'title')
                ->sortable()
                ->searchable(),
            Column::make(__('Invoice Number'), 'invoice_number')
                ->sortable()
                ->searchable(),
            Column::make(__('Amount'), 'amount')
                ->sortable()
                ->searchable(),
            Column::make(__('Due Date'), 'due_date')
                ->sortable()
                ->searchable(),
            Column::make(__('Status'), 'status'),
            Column::make(__('Actions')),
        ];
    }

    public function rowView(): string
    {
        return 'backend.invoices.includes.row';
    }
}
