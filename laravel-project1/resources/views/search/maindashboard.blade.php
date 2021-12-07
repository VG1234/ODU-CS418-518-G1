<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
    .chip {
        display: inline-block;
        background: #f3ebdb !important;
        padding: 0px 25px;
        height: 35px;
        font-size: 18px;
        line-height: 35px;
        border-radius: 25px;
        background-color: #f1f1f1;
        color: #5aa60d;
    }
    
    .closebtn {
      padding-left: 10px;
      color: #888;
      font-weight: bold;
      float: right;
      font-size: 25px;
      cursor: pointer;
      color: #e15555;
    }
    
    .closebtn:hover {
      color: #000;
    }
    </style>
</head>
<x-app-layout>
    <x-slot name="header">
        <div>
            <form action="{{ route('esearch') }}">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight" >
                {{ __('ARTIClES') }} <span class="text-gray-400" style="color: #cf8b0f;">({{ $count }})</span>
                @if ($esearch != '')
                    
                        <div style="display: inline-block; margin-left:50%">
                            Searched Keywords: 
                            
                                <div class="chip" >
                                    {{ $esearch }}
                                    <button title="click to clear" class="closebtn" type="submit">&times;</button>
                                </div>
                            
                            {{-- <span style="color:#e13838 ">
                                {{ $esearch }}
                            </span>  --}}
                        </div>
                    
                @endif 
            </h2>
        </form>
        </div>
    </x-slot>
    {{-- <div class="mt-8 mt-8">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" style="height: 620px;overflow-y: auto;">
                @forelse ($response as $article)
                    <div class="bg-white border-b border-gray-200 space-y-8">
                        <article class="space-y-1" style="padding:20px !important;  border-bottom: 1px solid #f3d8a7;">
                            <h2 class="font-semibold text-2xl" style="color: #cf8b0f !important;"><a href="{{ url('article/'.$article['_id']) }}">{{$article['_source']['title']}}</a></h2>
                            <p class="m-0">{{ $article['_source']['description']  }}</body>
                            <div>
                                <span class="text-xs px-2 py-1 rounded bg-indigo-50 text-indigo-500" style="font-size: 13px;font-weight: 600;color:#f3bf60 !important; background-color:#262525db !important">Author: {{$article['_source']['author']}}</span>
                            </div>
                        </article>
                        @empty
                        <p style="margin: 21%;margin-left: 44%;">No articles found</p>
                @endforelse  
                </div>
            </div>
        </div>
    </div> --}}
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" style="height: 685px;overflow-y: auto;">
        <div style="padding:10px" class="p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-5">
            @forelse ($response as $article)
                <div class="rounded overflow-hidden shadow-lg" style="margin-right: 5px;margin-bottom: 10px">
                    {{-- <img class="w-full" src="/mountain.jpg" alt="Mountain"> --}}
                    @if ($esearch != '')
                        <div class="px-6 py-4" style="height: 75%">
                            <div class="font-bold text-xl mb-2" style="color: #5aa506 !important;">
                                {{-- {{$items}} --}}
                                {{-- <a href="{{ url('article/'.$article['_id']) }}">{{$article['_source']['title']}}</a> --}}                                
                                <a href="{{ url('article/'.$article['_id'].'/survey') }}"><div class="highlight"><p>{{$article['highlight']['title'][0]}}</p></div></a>
                            </div>
                            <div class="high_desc">
                                <p class="text-gray-700 text-base">
                                    {{-- {{ $article['_source']['description']  }} --}}
                                    {{$article['highlight']['title'][0]}}
                                </p>
                            </div>
                        </div>
                    @else
                        <div class="px-6 py-4" style="height: 75%">
                            <div class="font-bold text-xl mb-2" style="color: #5aa506 !important;">
                                <a href="{{ url('article/'.$article['_id'].'/survey') }}">{{$article['_source']['title']}}</a>
                            </div>
                            <p class="text-gray-700 text-base" >
                                {{ $article['_source']['description']  }}
                                {{-- {{$article['highlight']['description'][0]}} --}}
                            </p>
                        </div>
                    @endif
                    <div class="px-6 pt-4 pb-2" style="margin-bottom: 10px">
                        <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2" style="font-size: 13px;font-weight: 600;color:#f3bf60 !important; background-color:#262525db !important">Author: {{$article['_source']['author']}}</span>
                    </div>
                </div>
                @empty
                <p style="margin: 21%;margin-left: 44%;">No articles found</p>
            @endforelse
            {{-- @endforelse --}}
        </div>
    </div>
</x-app-layout>
{{-- <div class="footer" style="background-color: #5a5a5c;">
    <p style="color:#ede0e0"><b style="color: #85c240;">About ODU:</b> Old Dominion University, located in Norfolk, is Virginia's forward-focused public doctoral research university with more than 24,000 students, rigorous academics, an energetic residential community and initiatives that contribute $2.6 billion 
        annually to Virginia's economy.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;
        <b style="color: #85c240;text-decoration: underline" title="Click to know about project"><a href="{{ url('/projectinfo') }}">About Project</a></b><b style="color: #85c240;">&nbsp;&nbsp;&nbsp;Contact me: </b>gopal.hello12@gmail.com </p>
</div> --}}
<script>
    var high = document.getElementsByClassName("highlight")
    // console.log(high[0].innerHTML)
    for (let index = 0; index < high.length; ++index) {
        // const element = high[index];
        var highlightText = high[index].innerHTML;
        // console.log("Highlight Text :- ", highlightText);
        var doc = new DOMParser().parseFromString(highlightText, "text/xml");
        high[index].innerHTML = doc.firstChild.firstChild.data;
        // console.log("document ",doc);
    }
    var high_des = document.getElementsByClassName("high_desc")
    // console.log(high_des.length)
    for (let index1 = 0; index1 < high_des.length; ++index1) {
        // const element1 = high_des[index1];
        var highlightDesc = high_des[index1].innerHTML;
        // console.log(highlightDesc.trim());
        var doc1 = new DOMParser().parseFromString(highlightDesc, "text/xml");
        high_des[index1].innerHTML = doc1.firstChild.firstChild.data;
        // console.log(doc1.firstChild);
    }
</script>
