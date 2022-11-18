<x-livewire-tables::bs4.table.cell>
  {{$row->id}} 
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    {{$row->user_id}}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    @php
        $user= \App\Models\Customer::find($row->user_id);
    @endphp
    {{$user->email}}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    {{$row->level + 1}}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
   <span > <a href="/up_data/users/{{$row->name}}" target="_blank">{{$row->name}}</a></span>
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    {{$row->created_at}}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    <span class="@if($row->status=='pending')badge badge-warning @elseif($row->status=='approved')badge badge-success @elseif($row->status=='declined')badge badge-danger @endif">{{$row->status}}</span>
   
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    <span > <a href="/admin/user-level/approve/{{$row->user_id}}/{{$row->level}}"><i class="fas fa-thumbs-up font-2xl"></i></a></span>
    <span > <a href="/admin/user-level/decline/{{$row->id}}"><i class="fas fa-thumbs-down font-2xl ml-2"></i></a></span>
</x-livewire-tables::bs4.table.cell>