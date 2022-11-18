<?php

namespace App\Http\Livewire\Backend;

use App\Models\Attendee;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;

/**
 * Class AttendeesTable.
 */
class AttendeesTable extends DataTableComponent
{
    /**
     * @return Builder
     */
    public function query(): Builder
    {
        return Attendee::query()->when($this->getFilter('search'), fn ($query, $term) => $query->where('id', 'like', '%'.$term.'%')
        ->orWhere('job_title', 'like', '%'.$term.'%')->orWhere('institute', 'like', '%'.$term.'%')->orWhere('profile', 'like', '%'.$term.'%')
        ->orWhere('profession', 'like', '%'.$term.'%')->orWhere('classification', 'like', '%'.$term.'%')->orWhere('specialty', 'like', '%'.$term.'%')
        ->orWhere('employer_type', 'like', '%'.$term.'%')->orWhere('practice_role', 'like', '%'.$term.'%')->orWhere('vets_in_practice', 'like', '%'.$term.'%')
        ->orWhere('techs_in_practice', 'like', '%'.$term.'%')->orWhere('practice_revenue', 'like', '%'.$term.'%')->orWhere('practices_in_group', 'like', '%'.$term.'%')
        ->orWhere('credentials', 'like', '%'.$term.'%')->orWhere('website', 'like', '%'.$term.'%')->orWhere('phone', 'like', '%'.$term.'%')
        ->orWhere('mobile', 'like', '%'.$term.'%')->orWhere('address', 'like', '%'.$term.'%')->orWhere('zip', 'like', '%'.$term.'%')
        ->orWhere('sm_facebook', 'like', '%'.$term.'%')->orWhere('sm_linkedin', 'like', '%'.$term.'%')->orWhere('sm_twitter', 'like', '%'.$term.'%')
        ->orWhere('sm_instagram', 'like', '%'.$term.'%')->orWhere('sm_pinterest', 'like', '%'.$term.'%')->orWhere('sm_youtube', 'like', '%'.$term.'%')
        ->orWhere('sm_vimeo', 'like', '%'.$term.'%'))
        ->when($this->getFilter('status'), fn ($query, $status) => $query->where('status', $status));
    }

    public function filters(): array
    {
        return [
            'status' => Filter::make('Status')
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
            Column::make(__('Name'), ''),
            Column::make(__('Email'), ''),
            Column::make(__('Job Title'), 'job_title')
                ->sortable()
                ->searchable(),
            Column::make(__('Institute'), 'institute')
                ->sortable()
                ->searchable(),
            Column::make(__('Website'), 'website')
                ->sortable()
                ->searchable(),
            Column::make(__('Phone'), 'phone')
                ->sortable()
                ->searchable(),
            Column::make(__('Status'), 'status')
                ->sortable(),
            Column::make(__('Actions')),
        ];
    }

    public function rowView(): string
    {
        return 'backend.attendees.includes.row';
    }
}
