@props(['href' => '#', 'permission' => false])

<x-utils.link :href="$href" class="dropdown-item" :text="__('Manage Variations')" permission="{{ $permission }}" />
