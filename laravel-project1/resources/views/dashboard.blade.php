<!-- Favicon -->
<link rel="shortcut icon" type="image/png" sizes="32x32" href="/img/favicon.png">
<link rel="icon" type="image/x-icon" href="/img/favicon.png">
<x-app-layout>
    





    <div class="flex" style="margin: 10px;height: 633px;border: 1px solid grey; overfolow-y:auto;background: white !important;">
        <div class="flex-1 ..." style="border-right: 3px solid #f7b338;margin-right: 5px; max-height: 620px; overflow:auto; width: 100% ">
           @if($id)
           @include('opages.fakenews'.$id)
           @endif
        </div>
        <div class="flex-1 ..." style='width: 0px;overflow: auto;height: 620px;'>
            <x-guest-layout>
                <nav x-data="{ open: false }" class="sticky bg-white border-b border-gray-100" style="margin-bottom: 3px">
                    <!-- Primary Navigation Menu -->
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="flex justify-between h-16">
                            <div class="flex">
                                
                                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex" style="width:auto">
                                    <x-jet-nav-link href="{{ url('article/'.$id.'/dashboard') }}" active="{{ str_contains(url()->full(), '/dashboard') ? 'active': '' }}">
                                        Dashboard <br>
                                    (Relevant papers)
                                    </x-jet-nav-link>
                                </div>
                                
                                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex" style="width:auto">
                                    <x-jet-nav-link href="{{ url('article/'.$id.'/snopes') }}" active="{{ str_contains(url()->full(), '/snopes') ? 'active': '' }}">
                                        Snopes Article
                                    </x-jet-nav-link>
                                </div>
                                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex {{ str_contains(url()->full(), '/survey') ? 'active': '' }}" style="width:10.5em">
                                    <x-jet-nav-link href="{{ url('article/'.$id.'/survey') }}" active="{{ str_contains(url()->full(), '/survey') ? 'active': '' }}">
                                        Survey
                                    </x-jet-nav-link>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
                <div style="max-height: 540px; margin-left:2px; overflow-y:auto">
                    @if(str_contains(url()->full(), '/dashboard'))
                        @foreach ($source as $key=>$item)
                            @if ($item['title'] === "")
                                <p style="color: #e13838">No relevant papers</p>
                            @else
                                <div class="w-full my-4">
                                    <div x-data={show:false} class="rounded-sm collapse-plus">
                                        <div class="border border-b-0 bg-gray-100 px-10 py-6" id="headingOne">
                                            <p style="color: #3b6c03">Relevant Paper{{ $key }}:
                                                <button @click="show=!show" class="underline text-blue-500 hover:text-blue-700 focus:outline-none" type="button" style="color:#5c5cd7">
                                                    Details
                                                </button>
                                            </p>
                                        </div>
                                        <div x-show="show" class="border border-b-0 px-10 py-6">
                                            <span style="color: #e13838">Title:</span> <a href="{{ $item['url'] }}" target="_blank" title="click to open link" style="color: #3838dd;text-decoration: underline">{{ $item['title'] }}</a> <br>
                                            <span style="color: #e13838">Authors:</span> {{ $item['authors'] }} <br>
                                            <span style="color: #e13838">Journal:</span> {{ $item['journal'] }} <br>
                                            <span style="color: #e13838">Year:</span> {{ $item['year'] }} <span style="color: #e13838">Citations:</span> {{ $item['citations'] }} <br>
                                            <span style="color: #e13838">Claim:</span> {{ $item['claim'] }}
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @elseif(str_contains(url()->full(), '/snopes'))
                        @include('spages.snopes'.$id)
                    @elseif(str_contains(url()->full(), '/survey'))
                        @include('surveypages.survey')
                    @endif
                </div>
            </x-guest-layout>
        </div>
    </div>
</x-app-layout>
{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script> --}}
