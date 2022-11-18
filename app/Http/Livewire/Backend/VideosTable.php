<?php

namespace App\Http\Livewire\Backend;

use App\Models\Video;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;

/**
 * Class RolesTable.
 */
class VideosTable extends DataTableComponent
{
    /**
     * @return Builder
     */
    public function query(): Builder
    {
        return Video::query()->when($this->getFilter('search'), fn ($query, $term) => $query->where('id', 'like', '%'.$term.'%')
        ->orWhere('title', 'like', '%'.$term.'%')->orWhere('source', 'like', '%'.$term.'%')
        ->orWhere('video_id', 'like', '%'.$term.'%')->orWhere('position', 'like', '%'.$term.'%'))
        ->when($this->getFilter('active'), fn ($query, $active) => $query->where('status', $active))
        ->when($this->getFilter('source'), fn ($query, $source) => $query->where('source', $source))
        ->when($this->getFilter('position'), fn ($query, $position) => $query->where('position', $position));
    }

    public function filters(): array
    {
        return [
            'active' => Filter::make('Status')
                ->select([
                    '' => 'Any',
                    'Y' => 'Active',
                    'N' => 'In-active',
                ]),
            'source' => Filter::make('Source')
                ->select([
                    '' => 'Any',
                    'Youtube' => 'Youtube',
                    'Vimeo' => 'Vimeo',
                ]),
            'position' => Filter::make('Position')
                ->select([
                    '' => 'Any',
                    '0' => '0',
                    '1' => '1',
                ]),
        ];
    }

    public function columns(): array
    {
        return [
            Column::make(__('ID'), 'id')
                ->sortable()
                ->searchable(),
            Column::make(__('Thumbnail')),
            Column::make(__('Title'), 'title')
                ->sortable()
                ->searchable(),
            Column::make(__('Source'), 'source')
                ->sortable()
                ->searchable(),
            Column::make(__('Video ID'), 'video_id')
                ->sortable()
                ->searchable(),
            Column::make(__('Position'), 'position')
                ->sortable()
                ->searchable(),
            Column::make(__('Status'), 'status')
                ->sortable(),
            Column::make(__('Actions')),
        ];
    }

    public function rowView(): string
    {
        return 'backend.videos.includes.row';
    }
}
