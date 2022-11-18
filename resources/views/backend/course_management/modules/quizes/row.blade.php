<x-livewire-tables::bs4.table.cell>
      {{ $row->id }}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
      {{ $row->question }}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
      <x-utils.edit-button :href="url('admin/manage-courses/course/'.$row->module->course->slug.'/module/'.$row->module->slug.'/quizes/'.$row->id.'/edit')" />
      <x-utils.delete-button :href="route('admin.manage-courses.course.module.quiz.destroy',$row->id)" />
      <a href="{{ url('admin/manage-courses/course/'.$row->module->course->slug.'/module/'.$row->module->slug.'/quiz/'.$row->id.'/options') }}" class="btn btn-primary btn-sm">Options</a>
</x-livewire-tables::bs4.table.cell>