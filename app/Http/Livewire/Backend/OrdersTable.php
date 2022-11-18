<?php

namespace App\Http\Livewire\Backend;

use App\Models\Order;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;

/**
 * Class RolesTable.
 */
class OrdersTable extends DataTableComponent
{
    /**
     * @return Builder
     */
    public function query(): Builder
    {
        return Order::query()->with('customer')->when($this->getFilter('search'), fn ($query, $term) => $query->where('id', 'like', '%'.$term.'%')->where('parent_id', 0)->where('vendor_id', null)
        ->orWhere('first_name', 'like', '%'.$term.'%')->where('parent_id', 0)->where('vendor_id', null)->orWhere('last_name', 'like', '%'.$term.'%')->where('parent_id', 0)->where('vendor_id', null)
        ->orWhere('grand_total', 'like', '%'.$term.'%')->where('parent_id', 0)->where('vendor_id', null)->orWhere('created_at', 'like', '%'.$term.'%')->where('parent_id', 0)->where('vendor_id', null)->orWhere('city', 'like', '%'.$term.'%'))->where('parent_id', 0)->where('vendor_id', null)
        ->when($this->getFilter('active'), fn ($query, $active) => $query->where('order_status', $active));
    }

    public function filters(): array
    {
        return [
            'active' => Filter::make('Status')
                ->select([
                    '' => 'Any',
                    '1' => 'Pending for Processing',
                    '2' => 'Processing',
                    '3' => 'Pending Payment',
                    '4' => 'Suspected Fraud',
                    '5' => 'Payment Review',
                    '6' => 'On Hold',
                    '7' => 'Complete',
                    '8' => 'Closed',
                    '9' => 'Canceled',
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
            Column::make(__('Ship-to Name'), 'first_name')
                ->sortable()
                ->searchable(),
            Column::make(__('Grand Total'), 'grand_total')
                ->sortable()
                ->searchable(),
            Column::make(__('Purchase Date'), 'created_at')
                ->sortable()
                ->searchable(),
            Column::make(__('City / Zip'), 'city')
                ->sortable()
                ->searchable(),
            Column::make(__('Status'), 'order_status'),
            Column::make(__('Actions')),
        ];
    }

    public function rowView(): string
    {
        return 'backend.orders.includes.row';
    }
}
