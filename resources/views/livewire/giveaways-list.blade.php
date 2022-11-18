<div>
    <div class="heading-wrapper flex justify-between items-center">
        <p class="text-xl font-bold">Giveaways @if ($edit_mode) {{ $counter }} @endif</p>
        <p @click="sb_open('edit_giveaways')" id="add_edit_giveaway_link"></p>
        @if ($edit_mode && $total_giveaways < $max_giveaways)
            <p @click="openModal('modal-overlay')" wire:click="$emit('addGiveaway')" class="cursor-pointer text-sm primary-color">Add</p>
        @endif
    </div>

    @if(count($giveaways) > 0)

    <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 mt-6">

        @foreach ($giveaways as $giveaway)

            <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
                <div class="flex items-end justify-end h-56 w-full bg-cover"
                    style="background-image: url('up_data/{{ $giveaway->image1 }}')">
                    <span wire:click="open_giveaway({{ $giveaway->id }})" class="@if ($edit_mode) -mb-3 @else -mb-4 @endif bg-blue-400 cursor-pointer hover:bg-blue-500 mx-2 rounded text-center text-white @if ($edit_mode) w-6 h-6 @else w-8 p-1  @endif">
                        <i class="fa fa-eye"></i>
                    </span>
                    @if ($edit_mode)
                        <span @click="openModal('modal-overlay')" wire:click="$emit('editGiveaway', {{ $giveaway->id }})"
                            class="@if ($edit_mode) -mb-3 @else -mb-4 @endif bg-green-400 cursor-pointer hover:bg-green-500 rounded text-center text-white w-6 h-6">
                            <i class="fas fa-edit"></i>
                        </span>
                        <span wire:click="destroy({{ $giveaway->id }})"
                            class="@if ($edit_mode) -mb-3 @else -mb-4 @endif bg-red-400 cursor-pointer hover:bg-red-500 mx-2 rounded text-center text-white w-6 h-6">
                            <i class="fas fa-trash-alt"></i>
                        </span>
                    @endif
                </div>
                <div class="px-5 py-3">
                    <h3 class="text-gray-700">{{ $giveaway->name }}</h3>
                </div>
            </div>

        @endforeach

    </div>

    <div class="giveaway-detail-modal fixed w-full inset-0 z-50 overflow-hidden flex justify-center items-center animated fadeIn faster"
        style="background: rgba(0,0,0,.7); display:none;">

        <div @click.away="closeModal('giveaway-detail-modal')"
            class="md:flex md:mx-auto mx-6 my-40 shadow-lg w-8/12 bg-white rounded">
            <img class="h-full w-full md:w-1/3  object-cover rounded-lg pb-5/6 zoom" src="" alt=""
                id="giveaway_main_image">
            <div class="w-full md:w-2/3 px-4 py-4 bg-white rounded-r-lg">
                <div class="flex items-center">
                    <h2 class="text-xl text-gray-800 font-medium mr-auto" id="gv_heading"></h2>
                </div>
                <p class="text-sm text-gray-700 mt-4" id="gv_description"></p>
                <p class="text-sm text-gray-700 mt-4" id="gv_link"></p>
            </div>
            <div class="relative">
                <div onclick="closeModal('giveaway-detail-modal');" class="absolute right-0 top-0 cursor-pointer"
                    style="left: -7px; top: -12px;"><i class="fas fa-times-circle text-white"></i></div>
            </div>
        </div>
    </div>

    @else

        <div class="pt-2 text-gray-500 text-sm">Sorry, no giveaways found.</div>

    @endif
</div>
