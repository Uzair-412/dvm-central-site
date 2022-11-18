<?php

namespace App\Http\Livewire\Backend;

use App\Models\Level;
use App\Models\UserDocument;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

/**
 * Class RolesTable.
 */
class UserDocumentsTable extends DataTableComponent
{
    /**
     * @return Builder
     */

    public $params;
    public function query(): Builder
    {   
        return UserDocument::query()->where('user_id', $this->params)->when($this->getFilter('search'), fn ($query, $term) => $query->where('id', 'like', '%'.$term.'%')->orWhere('name', 'like', '%'.$term.'%'));
    }

    public function columns(): array
    {
        return [
            Column::make(__('ID'), 'id')
                ->sortable()
                ->searchable(),
                Column::make(__('User Id'), 'user_id')
                ->sortable()
                ->searchable(),
                Column::make(__('Email'), 'email')
                ->sortable()
                ->searchable(),
                Column::make(__('Required Level'), 'level')
                ->sortable()
                ->searchable(),
                Column::make(__('File Name'), 'name')
                ->sortable()
                ->searchable(),
                Column::make(__('Uploaded At'), 'created_at')
                ->sortable()
                ->searchable(),
                Column::make(__('Status'), 'status')
                ->sortable()
                ->searchable(),
                Column::make(__('Actions'), 'actions'),
        ];
    }


    public function rowView(): string
    {
        return 'backend.user-documents.row';
    }
}
