@props(['href' => '#', 'permission' => false])

<x-utils.link :href="$href" class="dropdown-item mb-lg-n2" :text="__('Update Details')" permission="{{ $permission }}" />
