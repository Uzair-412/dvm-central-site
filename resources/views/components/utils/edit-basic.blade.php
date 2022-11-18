@props(['href' => '#', 'permission' => false])

<x-utils.link :href="$href" class="dropdown-item mb-lg-n2" :text="__('Basic Info')" permission="{{ $permission }}" />
