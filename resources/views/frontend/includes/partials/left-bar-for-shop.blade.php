<div class="ps-layout__left">
    @if(isset($data['main-categories']))
        <aside class="widget widget_shop">
            <h4 class="widget-title">Categories</h4>
            <ul class="ps-list--categories">
                @foreach($data['main-categories'] as $mc)
                    @php
                        $child_categories = \App\Models\Category::getLeftMenuCategories(['parent_id' => $mc->id]);
                    @endphp
                    <li @if($child_categories) class="menu-item-has-children" @endif>
                        <a href="{{ $mc->slug }}">{{ $mc->name }}</a>
                        @if($child_categories)
                            <span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                            <ul class="sub-menu">
                                @foreach($child_categories as $cc)
                                    <li><a href="{{ $cc->slug }}">{{ $cc->name }}</a></li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ul>
        </aside>
    @endif
    {{-- @if(isset($data['products_tags']) && is_array($data['products_tags']) && count($data['products_tags']) > 0)
        <aside class="widget widget_shop">
            <h4 class="widget-title">TAGS</h4>
            <figure class="sizes">
                @foreach($data['products_tags'] as $tag)
                    <a href="{{ 'search-results?s=' . $tag }}"> {{ $tag }}</a>
                @endforeach
            </figure>
        </aside>
    @endif --}}
    <aside>
        <div class="fixed-img-wrapper">
        {!! \App\Models\Banner::showBanner(12, 'shadow-lg') !!}
        </div>
    </aside>
</div>