<div>
    <div class="heading-wrapper flex justify-between items-center">
        <p class="text-xl font-bold">Products @if ($edit_mode) {{ $counter }} @endif</p>
        <p @click="sb_open('edit_products')" id="add_edit_product_link"></p>
        @if ($edit_mode && $total_products < $max_products)            
            <p @click="openModal('modal-overlay')" wire:click="$emit('addProduct')" class="cursor-pointer text-sm primary-color">Add</p>
        @endif
    </div>

    <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 mt-6">

        @foreach ($products as $product)

            <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
                <div class="flex items-end justify-end h-56 w-full bg-cover"
                    style="background-image: url('up_data/{{ $product->image1 }}')">
                    <span wire:click="open_product({{ $product->id }})" class="@if ($edit_mode) -mb-3 @else -mb-4 @endif bg-blue-400 cursor-pointer hover:bg-blue-500 mx-2 rounded text-center text-white @if ($edit_mode) w-6 h-6 @else w-8 p-1  @endif">
                        <i class="fa fa-eye"></i>
                    </span>
                    @if ($edit_mode)
                        <span @click="openModal('modal-overlay')" wire:click="$emit('editProduct', {{ $product->id }})"
                            class="@if ($edit_mode) -mb-3 @else -mb-4 @endif bg-green-400 cursor-pointer hover:bg-green-500 rounded text-center text-white w-6 h-6">
                            <i class="fas fa-edit"></i>
                        </span>
                        <span wire:click="destroy({{ $product->id }})"
                            class="@if ($edit_mode) -mb-3 @else -mb-4 @endif bg-red-400 cursor-pointer hover:bg-red-500 mx-2 rounded text-center text-white w-6 h-6">
                            <i class="fas fa-trash-alt"></i>
                        </span>
                    @endif
                </div>
                <div class="px-5 py-3">
                    <h3 class="text-gray-700">{{ $product->name }}</h3>
                    <span class="text-gray-500 mt-2">
                        @if ($product->price_sale != null)
                            <span class="text-red-500 line-through">${{ number_format($product->price, 2) }}</span>
                            ${{ number_format($product->price_sale, 2) }}
                        @else
                            ${{ number_format($product->price, 2) }}
                        @endif
                    </span>
                </div>
            </div>

        @endforeach

    </div>

    <div class="product-detail-modal fixed w-full inset-0 z-50 overflow-hidden flex justify-center items-center animated fadeIn faster"
        style="background: rgba(0,0,0,.7); display:none;">

        <div @click.away="closeModal('product-detail-modal')"
            class="md:flex md:mx-auto mx-6 my-40 shadow-lg w-8/12 bg-white rounded">
            <img class="h-full w-full md:w-1/3  object-cover rounded-lg  pb-5/6 zoom" src="" alt=""
                id="pd_main_image">
            <div class="w-full md:w-2/3 px-4 py-4 bg-white rounded-r-lg">
                <div class="flex items-center">
                    <h2 class="text-xl text-gray-800 font-medium mr-auto" id="pd_heading"></h2>
                    <p class="text-gray-800 font-semibold" id="pd_price"></p>
                </div>
                <p class="text-sm text-gray-700 mt-4" id="pd_description"></p>
                <p class="text-sm text-gray-700 mt-4" id="pd_link"></p>

                <div class="grid grid-cols-2 gap-4">
                    <div class="pt-3">

                        <div class="grid grid-cols-3 gap-0">

                            <div><img src="" onclick="setTumbnail(this.src)" id="pd_thumb1"
                                    class="border w-16 h-16 cursor-pointer" /></div>
                            <div id="div_thumb2"><img src="" onclick="setTumbnail(this.src)" id="pd_thumb2"
                                    class="border w-16 h-16 cursor-pointer" /></div>
                            <div id="div_thumb3"><img src="" onclick="setTumbnail(this.src)" id="pd_thumb3"
                                    class="border w-16 h-16 cursor-pointer" /></div>

                        </div>

                    </div>
                    <div>

                    </div>
                </div>

            </div>
            <div class="relative">
                <div onclick="closeModal('product-detail-modal');" class="absolute right-0 top-0 cursor-pointer"
                    style="left: -7px; top: -12px;"><i class="fas fa-times-circle text-white"></i></div>
            </div>
        </div>
    </div>
</div>
