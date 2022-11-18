<x-livewire-tables::bs4.table.cell>
    {{ $row->id }}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    <img src="{{ asset('/up_data/courses/videos/thumbnails/'.$row->thumbnail) }}" width="80px">
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    {{ $row->title }}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    @if($row->is_free) <span class="badge badge-success">Yes</span> @else <span
        class="badge badge-warning">No</span> @endif
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    @if($row->status == 'Y') <span class="badge badge-success">Active</span> @else <span
        class="badge badge-warning">In-active</span> @endif
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    <x-utils.edit-button :href="url('admin/manage-courses/course/module/'.$row->module->slug.'/video/edit/'.$row->id)" />
    <x-utils.delete-button :href="route('admin.manage-courses.course.module.video.destroy',$row)" />
</x-livewire-tables::bs4.table.cell>