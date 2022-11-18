<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    <div class="c-sidebar-brand d-lg-down-none">
        <div class="c-sidebar-brand-full">
            <img src="{{ asset('img/brand/vet-and-tech-logo-white.png') }}" width="170" alt="{{ appName() }}">
        </div>
        <div class="c-sidebar-brand-minimized">
            <img src="{{ asset('img/brand/vet-and-tech-logo-white.png') }}" width="46" alt="{{ appName() }}">
        </div>
        {{-- <svg class="c-sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
            <use xlink:href="{{ asset('img/brand/coreui.svg#full') }}"></use>
        </svg> --}}
        {{-- <svg class="c-sidebar-brand-minimized" width="46" height="46" alt="CoreUI Logo">
            <use xlink:href="{{ asset('img/brand/coreui.svg#signet') }}"></use>
        </svg> --}}
    </div>
    <!--c-sidebar-brand-->
    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <x-utils.link class="c-sidebar-nav-link" :href="route('admin.dashboard')" :active="activeClass(Route::is('admin.dashboard'), 'c-active')"
                icon="c-sidebar-nav-icon cil-speedometer" :text="__('Dashboard')" />
        </li>
        @if ($logged_in_user->hasAllAccess() || ($logged_in_user->can('admin.access.user.list') || $logged_in_user->can('admin.access.user.deactivate') || $logged_in_user->can('admin.access.user.reactivate') || $logged_in_user->can('admin.access.user.clear-session') || $logged_in_user->can('admin.access.user.impersonate') || $logged_in_user->can('admin.access.user.change-password')))
            <li class="c-sidebar-nav-dropdown">
                <x-utils.link href="#" icon="c-sidebar-nav-icon cil-dollar" class="c-sidebar-nav-dropdown-toggle"
                    :text="__('Sales')" />
                <ul class="c-sidebar-nav-dropdown-items">
                    <li class="c-sidebar-nav-item">
                        <x-utils.link :href="route('admin.orders.index')" class="c-sidebar-nav-link" :text="__('Orders')" />
                    </li>
                    <li class="c-sidebar-nav-item">
                        <x-utils.link :href="route('admin.invoices.index')" class="c-sidebar-nav-link" :text="__('Invoices')" />
                    </li>
                    <li class="c-sidebar-nav-item">
                        <x-utils.link :href="route('admin.coupons.index')" class="c-sidebar-nav-link" :text="__('Coupons')" />
                    </li>
                </ul>
            </li>
            <li class="c-sidebar-nav-dropdown">
                <x-utils.link href="#" icon="c-sidebar-nav-icon fas fa-tasks" class="c-sidebar-nav-dropdown-toggle"
                    :text="__('Business Management')" />
                <ul class="c-sidebar-nav-dropdown-items">
                    <li class="c-sidebar-nav-item">
                        <x-utils.link :href="route('admin.packages.index')" class="c-sidebar-nav-link" :text="__('Packages')" />
                    </li>
                    <li class="c-sidebar-nav-item">
                        <x-utils.link :href="route('admin.business-type.index')" class="c-sidebar-nav-link" :text="__('Business Type')" />
                    </li>
                    <li class="c-sidebar-nav-item">
                        <x-utils.link :href="route('admin.field-sets.index')" class="c-sidebar-nav-link" :text="__('Field Set')" />
                    </li>
                    <li class="c-sidebar-nav-item">
                        <x-utils.link :href="route('admin.fields.index')" class="c-sidebar-nav-link" :text="__('Fields')" />
                    </li>
                    {{-- <li class="c-sidebar-nav-item">
                        <x-utils.link :href="route('admin.vendors.index')" class="c-sidebar-nav-link" :text="__('Vendors')" />
                    </li> --}}
                </ul>
            </li>
            <li class="c-sidebar-nav-dropdown">
                <x-utils.link href="#" icon="c-sidebar-nav-icon far fa-folder-open"
                    class="c-sidebar-nav-dropdown-toggle" :text="__('Catalog')" />
                <ul class="c-sidebar-nav-dropdown-items">
                    <li class="c-sidebar-nav-item">
                        <x-utils.link :href="route('admin.category-blocks.index')" class="c-sidebar-nav-link" :text="__('Category blocks')" />
                    </li>
                    <li class="c-sidebar-nav-item">
                        <x-utils.link :href="route('admin.category.index')" class="c-sidebar-nav-link" :text="__('Categories')" />
                    </li>
                    <li class="c-sidebar-nav-item">
                        <x-utils.link :href="route('admin.product.index')" class="c-sidebar-nav-link" :text="__('Products')" />
                    </li>
                    <li class="c-sidebar-nav-item">
                        <x-utils.link :href="route('log-viewer::dashboard')" class="c-sidebar-nav-link" :text="__('Product Families')" />
                    </li>
                    <li class="c-sidebar-nav-item">
                        <x-utils.link :href="route('admin.reviews.index')" class="c-sidebar-nav-link" :text="__('Reviews')" />
                    </li>
                </ul>
            </li>
            <li class="c-sidebar-nav-dropdown" id="user-section">
                <x-utils.link href="#" icon="c-sidebar-nav-icon cil-people" class="c-sidebar-nav-dropdown-toggle"
                    :text="__('Users')" />
                <ul class="c-sidebar-nav-dropdown-items">
                    <li class="c-sidebar-nav-item">
                        <x-utils.link :href="route('admin.customers.index')" class="c-sidebar-nav-link" :text="__('Users')" />
                    </li>
                    <li class="c-sidebar-nav-item">
                        <x-utils.link :href="route('admin.groups.index')" class="c-sidebar-nav-link" :text="__('Groups')" />
                    </li>
                    <li class="c-sidebar-nav-item">
                        <x-utils.link :href="route('admin.levels.index')" class="c-sidebar-nav-link" :text="__('Levels')" />
                    </li>
                    {{-- <li class="c-sidebar-nav-item">
                        <x-utils.link :href="route('admin.user-documents')" class="c-sidebar-nav-link" :text="__('User Documents')" />
                    </li> --}}
                    <li class="c-sidebar-nav-item">
                        <x-utils.link :href="route('log-viewer::dashboard')" class="c-sidebar-nav-link" :text="__('Newsletter Subscriptions')" />
                    </li>
                </ul>
            </li>
            <li class="c-sidebar-nav-dropdown">
                <x-utils.link href="#" icon="c-sidebar-nav-icon far fa-file-word" class="c-sidebar-nav-dropdown-toggle"
                    :text="__('Content')" />
                <ul class="c-sidebar-nav-dropdown-items">
                    <li class="c-sidebar-nav-item">
                        <x-utils.link :href="route('admin.pages.index')" class="c-sidebar-nav-link" :text="__('Web Pages')" />
                    </li>
                    <li class="c-sidebar-nav-item">
                        <x-utils.link :href="route('admin.banners.index')" class="c-sidebar-nav-link" :text="__('Banners')" />
                    </li>
                    <li class="c-sidebar-nav-item">
                        <x-utils.link :href="route('admin.flyers.index')" class="c-sidebar-nav-link" :text="__('Flyers')" />
                    </li>
                    <li class="c-sidebar-nav-item">
                        <x-utils.link :href="route('admin.shows.index')" class="c-sidebar-nav-link" :text="__('Trade Shows')" />
                    </li>
                    <li class="c-sidebar-nav-item">
                        <x-utils.link :href="route('admin.file-manager')" class="c-sidebar-nav-link" :text="__('File Manager')" />
                    </li>
                    <li class="c-sidebar-nav-item">
                        <x-utils.link :href="route('admin.videos.index')" class="c-sidebar-nav-link" :text="__('Videos')" />
                    </li>
                    <li class="c-sidebar-nav-item">
                        <x-utils.link :href="route('admin.faqs.index')" class="c-sidebar-nav-link" :text="__('FAQs')" />
                    </li>
                </ul>
            </li>
            <li class="c-sidebar-nav-dropdown">
                <x-utils.link href="#" icon="c-sidebar-nav-icon far fa-calendar-alt"
                    class="c-sidebar-nav-dropdown-toggle" :text="__('Events Management')" />
                <ul class="c-sidebar-nav-dropdown-items">
                    <li class="c-sidebar-nav-item">
                        <x-utils.link :href="route('admin.events.index')" class="c-sidebar-nav-link" :text="__('Events')" />
                    </li>
                    <li class="c-sidebar-nav-item">
                        <x-utils.link :href="route('admin.speakers.index')" class="c-sidebar-nav-link" :text="__('Speakers')" />
                    </li>
                    <li class="c-sidebar-nav-item">
                        <x-utils.link :href="route('admin.webinars.index')" class="c-sidebar-nav-link" :text="__('Webinars')" />
                    </li>
                    <li class="c-sidebar-nav-item">
                        <x-utils.link :href="route('admin.attendees.index')" class="c-sidebar-nav-link" :text="__('Attendees')" />
                    </li>
                </ul>
            </li>
            <li class="c-sidebar-nav-dropdown">
                <x-utils.link href="#" icon="c-sidebar-nav-icon fas fa fa-book" class="c-sidebar-nav-dropdown-toggle"
                    :text="__('Courses Management')" />
                <ul class="c-sidebar-nav-dropdown-items">
                    <li class="c-sidebar-nav-item">
                        <x-utils.link :href="route('admin.manage-courses.category.index')" class="c-sidebar-nav-link" :text="__('Category')" />
                    </li>
                    <li class="c-sidebar-nav-item">
                        <x-utils.link :href="route('admin.manage-courses.types.index')" class="c-sidebar-nav-link" :text="__('Types')" />
                    </li>
                    <li class="c-sidebar-nav-item">
                        <x-utils.link :href="route('admin.manage-courses.courses.index')" class="c-sidebar-nav-link" :text="__('Courses')" />
                    </li>
                </ul>
            </li>
            <li class="c-sidebar-nav-dropdown">
                <x-utils.link href="#" icon="c-sidebar-nav-icon cil-people" class="c-sidebar-nav-dropdown-toggle"
                    :text="__('Jobs Management')" />
                <ul class="c-sidebar-nav-dropdown-items">
                    <li class="c-sidebar-nav-item">
                        <x-utils.link :href="route('admin.manage-jobs.category.index')" class="c-sidebar-nav-link" :text="__('Category')" />
                    </li>
                    <li class="c-sidebar-nav-item">
                        <x-utils.link :href="route('admin.manage-jobs.working-time.index')" class="c-sidebar-nav-link" :text="__('Working Time')" />
                    </li>
                    <li class="c-sidebar-nav-item">
                        <x-utils.link :href="route('admin.manage-jobs.types.index')" class="c-sidebar-nav-link" :text="__('Types')" />
                    </li>
                    <li class="c-sidebar-nav-item">
                        <x-utils.link :href="route('admin.manage-jobs.education-level.index')" class="c-sidebar-nav-link" :text="__('Education Level')" />
                    </li>
                    <li class="c-sidebar-nav-item">
                        <x-utils.link :href="route('admin.manage-jobs.salary-type.index')" class="c-sidebar-nav-link" :text="__('Salary Type')" />
                    </li>
                </ul>
            </li>
            <li class="c-sidebar-nav-dropdown">
                <x-utils.link href="#" icon="c-sidebar-nav-icon fas fa-blog" class="c-sidebar-nav-dropdown-toggle"
                    :text="__('Blog')" />
                <ul class="c-sidebar-nav-dropdown-items">
                    <li class="c-sidebar-nav-item">
                        <x-utils.link :href="route('admin.blog-categories.index')" class="c-sidebar-nav-link" :text="__('Categories')" />
                    </li>
                    <li class="c-sidebar-nav-item">
                        <x-utils.link :href="route('admin.blog-posts.index')" class="c-sidebar-nav-link" :text="__('Posts')" />
                    </li>
                </ul>
            </li>
            <li class="c-sidebar-nav-dropdown">
                <x-utils.link href="#" icon="c-sidebar-nav-icon fas fa-newspaper" class="c-sidebar-nav-dropdown-toggle"
                    :text="__('News')" />
                <ul class="c-sidebar-nav-dropdown-items">
                    <li class="c-sidebar-nav-item">
                        <x-utils.link :href="route('admin.news-categories.index')" class="c-sidebar-nav-link" :text="__('Categories')" />
                    </li>
                    <li class="c-sidebar-nav-item">
                        <x-utils.link :href="route('admin.news-posts.index')" class="c-sidebar-nav-link" :text="__('Posts')" />
                    </li>
                </ul>
            </li>
            <li class="c-sidebar-nav-item">
                <x-utils.link class="c-sidebar-nav-link" :href="route('admin.pets')" :active="activeClass(Route::is('admin.pets'), 'c-active')"
                    icon="c-sidebar-nav-icon fas fa-paw" :text="__('Pets')" />
            </li>
            <li class="c-sidebar-nav-dropdown">
                <x-utils.link href="#" icon="c-sidebar-nav-icon far fa-calendar-alt"
                    class="c-sidebar-nav-dropdown-toggle" :text="__('Programs')" />
                <ul class="c-sidebar-nav-dropdown-items">
                    <li class="c-sidebar-nav-item">
                        <x-utils.link :href="route('admin.programs.types.index')" class="c-sidebar-nav-link" :text="__('Types')" />
                    </li>
                    <li class="c-sidebar-nav-item">
                        <x-utils.link :href="route('admin.programs.directors.index')" class="c-sidebar-nav-link" :text="__('Directors')" />
                    </li>
                    <li class="c-sidebar-nav-item">
                        <x-utils.link :href="route('admin.programs.institutes.index')" class="c-sidebar-nav-link" :text="__('Institutes')" />
                    </li>
                    <li class="c-sidebar-nav-item">
                        <x-utils.link :href="route('admin.programs.associations.index')" class="c-sidebar-nav-link" :text="__('Associations')" />
                    </li>
                    <li class="c-sidebar-nav-item">
                        <x-utils.link :href="route('admin.programs.accreditation-status.index')" class="c-sidebar-nav-link" :text="__('Accreditation Status')" />
                    </li>
                    <li class="c-sidebar-nav-item">
                        <x-utils.link :href="route('admin.programs.program.index')" class="c-sidebar-nav-link" :text="__('Programs')" />
                    </li>
                </ul>
            </li>
            <li class="c-sidebar-nav-dropdown">
                <x-utils.link href="#" icon="c-sidebar-nav-icon fas fa-medkit"
                    class="c-sidebar-nav-dropdown-toggle" :text="__('Surgical Procedures')" />
                <ul class="c-sidebar-nav-dropdown-items">
                    <li class="c-sidebar-nav-item">
                        <x-utils.link :href="route('admin.surgical-procedures-categories.index')" class="c-sidebar-nav-link" :text="__('Categories')" />
                    </li>
                    <li class="c-sidebar-nav-item">
                        <x-utils.link :href="route('admin.surgical-procedures-articles.index')" class="c-sidebar-nav-link" :text="__('Articles')" />
                    </li>
                </ul>
            </li>
            <li class="c-sidebar-nav-dropdown">
                <x-utils.link href="#" icon="c-sidebar-nav-icon fas fa-disease" class="c-sidebar-nav-dropdown-toggle"
                    :text="__('Common Diseases')" />
                <ul class="c-sidebar-nav-dropdown-items">
                    <li class="c-sidebar-nav-item">
                        <x-utils.link :href="route('admin.animal-pets.index')" class="c-sidebar-nav-link" :text="__('Animal Pets')" />
                    </li>
                    <li class="c-sidebar-nav-item">
                        <x-utils.link :href="route('admin.common-diseases.index')" class="c-sidebar-nav-link" :text="__('Diseases')" />
                    </li>
                </ul>   
            </li>
            <li class="c-sidebar-nav-item">
                <x-utils.link class="c-sidebar-nav-link" :href="route('admin.vendors-chat')" icon="c-sidebar-nav-icon fas fa-comments"
                    :text="__('Chats')" />
            </li>
            <li class="c-sidebar-nav-dropdown">
                <x-utils.link href="#" icon="c-sidebar-nav-icon cil-settings" class="c-sidebar-nav-dropdown-toggle"
                    :text="__('Notifications')" />
                <ul class="c-sidebar-nav-dropdown-items">
                    <li class="c-sidebar-nav-item">
                        <x-utils.link :href="route('admin.notifications.index')" class="c-sidebar-nav-link" :text="__('Notifications')" />
                    </li>
                    {{-- <li class="c-sidebar-nav-item">
                        <x-utils.link :href="route('admin.notifications.push')" class="c-sidebar-nav-link" :text="__('Push notifications')" />
                    </li> --}}
                </ul>
            </li>
            {{-- <li class="c-sidebar-nav-dropdown">
                <x-utils.link
                    href="#"
                    icon="c-sidebar-nav-icon cil-notes"
                    class="c-sidebar-nav-dropdown-toggle"
                    :text="__('Micro Sites')" />
                <ul class="c-sidebar-nav-dropdown-items">
                    <li class="c-sidebar-nav-item">
                        <x-utils.link
                            :href="route('admin.micro-sites.index')"
                            class="c-sidebar-nav-link"
                            :text="__('Micro Sites')" />
                    </li>
                </ul>
            </li> --}}
            {{-- <li class="c-sidebar-nav-dropdown">
                <x-utils.link
                    href="#"
                    icon="c-sidebar-nav-icon cil-settings"
                    class="c-sidebar-nav-dropdown-toggle"
                    :text="__('Configure')" />
                <ul class="c-sidebar-nav-dropdown-items">
                    <li class="c-sidebar-nav-item">
                        <x-utils.link
                            :href="route('log-viewer::dashboard')"
                            class="c-sidebar-nav-link"
                            :text="__('Sales')" />
                    </li>
                    <li class="c-sidebar-nav-item">
                        <x-utils.link
                            :href="route('log-viewer::dashboard')"
                            class="c-sidebar-nav-link"
                            :text="__('Catalog')" />
                    </li>
                    <li class="c-sidebar-nav-item">
                        <x-utils.link
                            :href="route('log-viewer::dashboard')"
                            class="c-sidebar-nav-link"
                            :text="__('Customers')" />
                    </li>
                </ul>
            </li> --}}
            <li class="c-sidebar-nav-dropdown">
                <x-utils.link href="#" icon="c-sidebar-nav-icon cil-settings" class="c-sidebar-nav-dropdown-toggle"
                    :text="__('Settings')" />
                <ul class="c-sidebar-nav-dropdown-items">
                    <li class="c-sidebar-nav-item">
                        <x-utils.link :href="route('admin.settings.index')" class="c-sidebar-nav-link" :text="__('Request Session')" />
                    </li>
                    <li class="c-sidebar-nav-item">
                        <x-utils.link :href="route('admin.redirects.index')" class="c-sidebar-nav-link" :text="__('Manage Redirects')" />
                    </li>
                    {{-- <li class="c-sidebar-nav-item">
                        <x-utils.link
                            :href="route('log-viewer::dashboard')"
                            class="c-sidebar-nav-link"
                            :text="__('Sitemap')" />
                    </li> --}}
                </ul>
            </li>
            {{-- <li class="c-sidebar-nav-dropdown">
                <x-utils.link
                    href="#"
                    icon="c-sidebar-nav-icon cil-basket"
                    class="c-sidebar-nav-dropdown-toggle"
                    :text="__('MIS Instruments')" />
                <ul class="c-sidebar-nav-dropdown-items">
                    <li class="c-sidebar-nav-item">
                        <x-utils.link
                            :href="route('log-viewer::dashboard')"
                            class="c-sidebar-nav-link"
                            :text="__('Products')" />
                    </li>
                </ul>
            </li> --}}
            {{-- <li class="c-sidebar-nav-dropdown">
                <x-utils.link
                    href="#"
                    icon="c-sidebar-nav-icon cil-basket"
                    class="c-sidebar-nav-dropdown-toggle"
                    :text="__('GSource')" />
                <ul class="c-sidebar-nav-dropdown-items">
                    <li class="c-sidebar-nav-item">
                        <x-utils.link
                            :href="route('log-viewer::dashboard')"
                            class="c-sidebar-nav-link"
                            :text="__('GSource Products')" />
                    </li>
                </ul>
            </li> --}}
            {{-- <li class="c-sidebar-nav-dropdown">
                <x-utils.link
                    href="#"
                    icon="c-sidebar-nav-icon cil-basket"
                    class="c-sidebar-nav-dropdown-toggle"
                    :text="__('CRM Data')" />
                <ul class="c-sidebar-nav-dropdown-items">
                    <li class="c-sidebar-nav-item">
                        <x-utils.link
                            :href="route('log-viewer::dashboard')"
                            class="c-sidebar-nav-link"
                            :text="__('Dentists Data')" />
                    </li>
                    <li class="c-sidebar-nav-item">
                        <x-utils.link
                            :href="route('log-viewer::dashboard')"
                            class="c-sidebar-nav-link"
                            :text="__('Vetenerians Data')" />
                    </li>
                </ul>
            </li> --}}
            <li class="c-sidebar-nav-title">@lang('System')</li>
            <li class="c-sidebar-nav-item">
                <x-utils.link class="c-sidebar-nav-link" :href="route('admin.help.index')" :active="activeClass(Route::is('admin.help.index'), 'c-active')"
                    icon="c-sidebar-nav-icon fas fa-question" :text="__('Help')" />
            </li>
            <li
                class="c-sidebar-nav-dropdown {{ activeClass(Route::is('admin.auth.user.*') || Route::is('admin.auth.role.*'), 'c-open c-show') }}">
                <x-utils.link href="#" icon="c-sidebar-nav-icon cil-user" class="c-sidebar-nav-dropdown-toggle"
                    :text="__('Access')" />
                <ul class="c-sidebar-nav-dropdown-items">
                    @if ($logged_in_user->hasAllAccess() || ($logged_in_user->can('admin.access.user.list') || $logged_in_user->can('admin.access.user.deactivate') || $logged_in_user->can('admin.access.user.reactivate') || $logged_in_user->can('admin.access.user.clear-session') || $logged_in_user->can('admin.access.user.impersonate') || $logged_in_user->can('admin.access.user.change-password')))
                        <li class="c-sidebar-nav-item">
                            <x-utils.link :href="route('admin.auth.user.index')" class="c-sidebar-nav-link" :text="__('User Management')"
                                :active="activeClass(Route::is('admin.auth.user.*'), 'c-active')" />
                        </li>
                    @endif
                    @if ($logged_in_user->hasAllAccess())
                        <li class="c-sidebar-nav-item">
                            <x-utils.link :href="route('admin.auth.role.index')" class="c-sidebar-nav-link" :text="__('Role Management')"
                                :active="activeClass(Route::is('admin.auth.role.*'), 'c-active')" />
                        </li>
                    @endif
                </ul>
            </li>
        @endif
        @if ($logged_in_user->hasAllAccess())
            <li class="c-sidebar-nav-dropdown">
                <x-utils.link href="#" icon="c-sidebar-nav-icon cil-list" class="c-sidebar-nav-dropdown-toggle"
                    :text="__('Logs')" />

                <ul class="c-sidebar-nav-dropdown-items">
                    <li class="c-sidebar-nav-item">
                        <x-utils.link :href="route('log-viewer::dashboard')" class="c-sidebar-nav-link" :text="__('Dashboard')" />
                    </li>
                    <li class="c-sidebar-nav-item">
                        <x-utils.link :href="route('log-viewer::logs.list')" class="c-sidebar-nav-link" :text="__('Logs')" />
                    </li>
                </ul>
            </li>
        @endif
    </ul>
    <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent"
        data-class="c-sidebar-minimized"></button>
</div>
<!--sidebar-->
{{-- {{ json_encode(url()->current()) }} --}}
@push('after-scripts')
    <script>
        $(document).ready(function() {
            let current_url = '{!! url()->current() !!}';
            document.querySelectorAll('.c-sidebar-nav li ul li a').forEach(element => {
                let link = element.getAttribute('href');
                if(current_url.search(link) > -1)
                {
                    if(!element.classList.contains('c-active'))
                    {
                        element.classList.add('c-active')
                    }
                    element.parentElement.parentElement.parentElement.classList.add('c-show');
                }
            });
        });
    </script>
@endpush
