<?php

namespace App\Http\Livewire\Backend;

use App\Models\Field;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;

/**
 * Class RolesTable.
 */
class FieldsTable extends DataTableComponent
{
    /**
     * @return Builder
     */
    public function query(): Builder
    {
        return Field::query()->with('field_sets')->when($this->getFilter('search'), fn ($query, $term) => $query->where('id', 'like', '%'.$term.'%')
        ->orWhere('type', 'like', '%'.$term.'%')->orWhere('placeholder', 'like', '%'.$term.'%')->orWhere('placeholder_2', 'like', '%'.$term.'%')
        ->orWhere('options', 'like', '%'.$term.'%')->orWhere('position', 'like', '%'.$term.'%'))
        ->when($this->getFilter('required'), fn ($query, $required) => $query->where('required', $required))
        ->when($this->getFilter('type'), fn ($query, $type) => $query->where('type', $type));
    }

    public function filters(): array
    {
        return [
            'required' => Filter::make('Required')
                ->select([
                    '' => 'Any',
                    'Y' => 'Yes',
                    'N' => 'No',
                ]),
            'type' => Filter::make('Type')
                ->select([
                    '' => 'Any',
                    'text_field' => 'Text Field',
                    'link_field' => 'Link Field',
                    'text_area' => 'Text Area',
                    'drop_down' => 'Drop Down',
                    'check_box' => 'Check Box',
                    'radio' => 'Radio',
                    'editor' => 'Editor',
                    'date_picker' => 'Date Picker',
                ]),
        ];
    }

    public function columns(): array
    {
        return [
            Column::make(__('ID'), 'id')
                ->sortable()
                ->searchable(),
            Column::make(__('Field Set')),
            Column::make(__('Type'), 'type')
                ->sortable()
                ->searchable(),
            Column::make(__('Name'), 'name')
                ->sortable()
                ->searchable(),
            Column::make(__('Placeholder'), 'placeholder')
                ->sortable()
                ->searchable(),
            Column::make(__('Placeholder 2'), 'placeholder_2')
                ->sortable()
                ->searchable(),
            Column::make(__('Options'), 'options')
                ->sortable()
                ->searchable(),
            Column::make(__('Required'), 'required')
                ->sortable(),
            Column::make(__('Position'), 'position')
                ->sortable()
                ->searchable(),
            Column::make(__('Actions')),
        ];
    }

    public function rowView(): string
    {
        return 'backend.fields.includes.row';
    }
}
