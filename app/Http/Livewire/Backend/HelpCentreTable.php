<?php

namespace App\Http\Livewire\Backend;

use App\Models\HelpCentre;
use Auth;
use DB;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;

/**
 * Class RolesTable.
 */
class HelpCentreTable extends DataTableComponent
{
    /**
     * @return Builder
     */
    public string $primaryKey = 'helpc_id';

    public function query(): Builder
    {
        return HelpCentre::query()->when($this->getFilter('search'), fn ($query, $term) => 
            $query->where('helpc_id', 'like', '%'.$term.'%')
            ->orWhere('helpc_first_name', 'like', '%' . $term . '%')
            ->orWhere('helpc_last_name', 'like', '%' . $term . '%')
            ->orWhere('helpc_email', 'like', '%' . $term . '%')
            ->orWhere('helpc_phone_no', 'like', '%' . $term . '%')
            ->orWhere('helpc_type', 'like', '%' . $term . '%')
        )
        ->when($this->getFilter('type'), fn ($query, $type) => 
            $query->where('helpc_type', $type)
        )->select('*', DB::raw('(SELECT COUNT(*) FROM help_centre_chats as chat WHERE chat.helpchat_help_id=help_centres.helpc_id AND chat.helpchat_by_admin='.Auth::user()->id.' AND chat.helpchat_by_vendor!=0 AND chat.helpchat_seen=0) AS NotSeen'))
        ->orderBy('helpc_id', 'DESC');
    }

    public function filters(): array
    {
        return [
            'type' => Filter::make('Type')
                ->select([
                    '' => 'Any',
                    'General Question' => 'General Question',
                    'Feature Request' => 'Feature Request',
                    'Bug Report' => 'Bug Report',
                    'My Account' => 'My Account',
                    'Other' => 'Other',
                ]),
        ];
    }

    public function columns(): array
    {
        return [
            Column::make(__('ID'), 'helpc_id')
                ->sortable(),
            Column::make(__('First Name'), 'helpc_first_name')
                ->sortable()
                ->searchable(),
            Column::make(__('Last Name'), 'helpc_last_name')
                ->sortable()
                ->searchable(),
            Column::make(__('Email'), 'helpc_email')
                ->sortable()
                ->searchable(),
            Column::make(__('Phone #'), 'helpc_phone_no')
                ->sortable()
                ->searchable(),
            Column::make(__('Type'), 'helpc_type')
                ->sortable()
                ->searchable(),
            Column::make(__('Action')),
        ];
    }

    public function rowView(): string
    {
        return 'backend.helpcentre.includes.row';
    }
}
