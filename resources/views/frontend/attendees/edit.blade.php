@extends('frontend.layouts.virtual')
@section('content')
@push('after-styles')
    <style>
        .tab > a.active {
            background-color: rgba(219, 39, 119, var(--tw-bg-opacity));
            color: white;
        }
    </style>
@endpush
<div class="container content-container pt-6 mx-auto xl:px-10 pb-24">
    
    <div class="grid grid-cols-12 bg-white ">
  
        <div id="tabs" class="col-span-12 flex md:col-span-2 md:flex-col md:justify-start md:space-x-0 md:space-y-4 overflow-hidden rounded space-x-4 w-full">
            <div class="bg-white border flex flex-col overflow-hidden rounded tab w-full">
                <script>
                    var ProfileSettingPage = localStorage.getItem('ProfileSettingPage');
                    if(ProfileSettingPage == 'first'){
                        document.write(`<a class="text-left text-xs font-bold uppercase px-5 py-4 text-pink-600 cursor-pointer tablinks" onclick="openTabs(event, 'first')" id="defaultOpen">Basic Information</a>`);
                    }else if(ProfileSettingPage != 'first' && ProfileSettingPage != 'second' && ProfileSettingPage != 'third' && ProfileSettingPage != 'fourth'){
                        document.write(`<a class="text-left text-xs font-bold uppercase px-5 py-4 text-pink-600 cursor-pointer tablinks" onclick="openTabs(event, 'first')" id="defaultOpen">Basic Information</a>`);
                    }else{
                        document.write(`<a class="text-left text-xs font-bold uppercase px-5 py-4 text-pink-600 cursor-pointer tablinks" onclick="openTabs(event, 'first')">Basic Information</a>`);
                    }
                    if(ProfileSettingPage == 'second'){
                        document.write(`<a class="text-left text-xs font-bold uppercase px-5 py-4 text-pink-600 cursor-pointer tablinks" onclick="openTabs(event, 'second')"  id="defaultOpen">Another Information</a>`);
                    }else{
                        document.write(`<a class="text-left text-xs font-bold uppercase px-5 py-4 text-pink-600 cursor-pointer tablinks" onclick="openTabs(event, 'second')">Another Information</a>`);
                    }
                    if(ProfileSettingPage == 'third'){
                        document.write(`<a class="text-left text-xs font-bold uppercase px-5 py-4 text-pink-600 cursor-pointer tablinks" onclick="openTabs(event, 'third')" id="defaultOpen">Social Links</a>`);
                    }else{
                        document.write(`<a class="text-left text-xs font-bold uppercase px-5 py-4 text-pink-600 cursor-pointer tablinks" onclick="openTabs(event, 'third')">Social Links</a>`);
                    }
                </script>
            </div>
            <div class="bg-white border flex flex-col overflow-hidden rounded tab w-full">
                <a href="{{route('frontend.events.attendees.show', [$event->slug, $data['attendee']->id])}}" class="text-left text-xs font-bold uppercase px-5 py-4 text-pink-600 cursor-pointer">
                    View Profile
                </a><hr>
                <script>
                    var ProfileSettingPage = localStorage.getItem('ProfileSettingPage');
                    if(ProfileSettingPage == 'fourth'){
                        document.write(`<a class="text-left text-xs font-bold uppercase px-5 py-4 text-pink-600 cursor-pointer tablinks" onclick="openTabs(event, 'fourth')" id="defaultOpen">Events</a>`);
                    }else{
                        document.write(`<a class="text-left text-xs font-bold uppercase px-5 py-4 text-pink-600 cursor-pointer tablinks" onclick="openTabs(event, 'fourth')">Events</a>`);
                    }
                </script>
            </div>
        </div>
        
        <div id="tab-contents" class="col-span-12 h-full md:col-span-10 ml-4">
            <div id="first" class="w-full tabcontent">
                @include('frontend.attendees.forms._basic')
            </div>
            <div id="second" class="flex w-full align-item-center tabcontent">
                @include('frontend.attendees.forms._additional-info')
            </div>
            <div id="third" class="flex w-full tabcontent">
                @include('frontend.attendees.forms._social')
            </div>
            <div id="third" class="flex w-full tabcontent">
                @include('frontend.attendees.forms._social')
            </div>
            <div id="fourth" class="flex w-full tabcontent">
                @include('frontend.attendees.forms._events')
            </div>
        </div>
  
  
    </div>
</div>

  @push('after-scripts')

    <script>
        function openTabs(evt, tabsName){
            localStorage.setItem('ProfileSettingPage', tabsName);
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(tabsName).style.display = "block";
            evt.currentTarget.className += " active";
        }
        document.getElementById("defaultOpen").click();
    </script>
    
@endpush
@endsection