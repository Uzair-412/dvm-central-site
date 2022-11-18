<?php

namespace App\Http\Livewire\Backend;

use App\Models\PushNotification;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;

/**
 * Class RolesTable.
 */
class NotificationsTable extends DataTableComponent
{
    /**
     * @return Builder
     */
    public function query(): Builder
    {
        return PushNotification::query()
        ->when($this->getFilter('search'), fn ($query, $term) => 
            $query->where(function($q) use($term) {
                $q->orWhere('id', 'like', '%' . $term . '%')->orWhere('title', 'like', '%' . $term . '%')->orWhere('body', 'like', '%' . $term . '%')->orWhere('platform', 'like', '%' . $term . '%')->orWhere('device', 'like', '%' . $term . '%')->orWhere('delivery_type', 'like', '%' . $term . '%');
            }))
        ->when($this->getFilter('status'), fn ($query, $status) => $query->where(function($q) use($status){
            if($status == 'Y')
            {
                $q->where('flag', 1);
            }
            else
            {
                $q->where('flag', 0);
            }
        }));
    }

    public function filters(): array
    {
        return [
            'status' => Filter::make('Status')
                ->select([
                    '' => 'Any',
                    'Y' => 'Sent',
                    'N' => 'Not-Sent',
                ]),
        ];
    }

    public function columns(): array
    {
        return [
            Column::make(__('ID'), 'id')
                ->sortable()
                ->searchable(),
            Column::make(__('Title'), 'title')
                ->sortable()
                ->searchable(),
            Column::make(__('Body'), 'body')
                ->sortable()
                ->searchable(),
            Column::make(__('Platform'), 'platform')
                ->sortable()
                ->searchable(),
            Column::make(__('Delivery type'), 'delivery_type')
                ->sortable()
                ->searchable(),
            Column::make(__('Status'), 'flag')
                ->sortable(),
            Column::make(__('Action'), 'flag')
        ];
    }

    public function rowView(): string
    {
        return 'backend.notifications.row';
    }
}
