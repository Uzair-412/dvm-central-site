<x-livewire-tables::bs4.table.cell>
    {{ $row->id }}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    {{ $row->quiz_option }}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    @if($row->is_true) <span class="badge bg-success text-white">Yes</span> @else <span class="badge bg-danger text-white">No</span> @endif
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    <x-utils.edit-button :href="url('admin/manage-courses/course/'.$row->quiz->module->course->slug.'/module/'.$row->quiz->module->slug.'/quiz/'.$row->quiz->id.'/option/'.$row->id.'/edit')" />
    <x-utils.delete-button :href="route('admin.manage-courses.course.module.quiz.options.destroy',$row->id)" />
</x-livewire-tables::bs4.table.cell>