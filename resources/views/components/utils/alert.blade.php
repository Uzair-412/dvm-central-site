@props(['dismissable' => true, 'type' => 'success', 'ariaLabel' => __('Close')])
@php
    $classes = 'w-full bg-opacity-70 ';
    if($type=='danger' || $type=='error')
    {
        $classes .= 'text-red-500 bg-red-100 flex justify-between d-flex justify-content-between';
    }
    else if($type=='success')
    {
        $classes .= 'text-green-500 bg-green-100 flex justify-between d-flex justify-content-between';
    }
    else if($type=='info')
    {
        $classes .= 'text-blue-500 bg-blue-100 flex justify-between d-flex justify-content-between';
    }
    else
    {
        $classes .= 'text-yellow-500 bg-yellow-100 flex justify-between d-flex justify-content-between';
    }
@endphp
<div {{ $attributes->merge(['class' => 'alert '.$classes]) }} role="alert">
    {{ $slot }}
    @if ($dismissable)
        <button type="button" class="close-alert bg-transparent border-0" data-dismiss="alert" aria-label="{{ $ariaLabel }}">
            <span aria-hidden="true" class=" font-lg text-2xl text-body border-0">&times;</span>
        </button>
    @endif
    
</div>
<script>
     var alert_del = document.querySelectorAll('.close-alert');
        alert_del.forEach((x) =>
            x.addEventListener('click', function () {
            x.parentElement.classList.add('hidden');
        })
    );
</script>