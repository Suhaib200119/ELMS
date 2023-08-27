@yield("css")

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }} 
            ||
            <a href="{{ route("leaves.index") }}">{{__("Leaves")}}</a>
            ||
            <a href="{{ route("users.index") }}">{{__("employees")}}</a>
            ||
            <a href="{{ route("indexRequest_admin") }}">{{__("request")}}</a>
            || 
            <a href="{{route("changeLang",["lang"=>"ar"])}}">{{__("arabic")}}</a>
            ||
            <a href="{{route("changeLang",["lang"=>"en"])}}">{{__("english")}}</a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @yield("page-content")
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
@yield("js")
