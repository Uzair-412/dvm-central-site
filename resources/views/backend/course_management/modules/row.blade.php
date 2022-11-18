<x-livewire-tables::bs4.table.cell>
    {{ $row->id }}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    {{ $row->title }}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    {{ $row->watch_hours }}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    <a href="{{ url('admin/manage-courses/course/module/'.$row->slug.'/videos') }}" class="badge alert-primary">{{ $row->videos->count() }}</a>
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
    <x-utils.edit-button :href="url('admin/manage-courses/course/'.$row->course->slug.'/module/edit/'.$row->id)" />
    <x-utils.delete-button :href="route('admin.manage-courses.course.module.destroy',$row)" />
    @if($row->allow_quiz)
        <a href="{{ url('admin/manage-courses/course/'.$row->course->slug.'/module/'.$row->slug.'/quizes') }}" class="btn btn-primary btn-sm">Add Quiz</a>
    @endif
</x-livewire-tables::bs4.table.cell>