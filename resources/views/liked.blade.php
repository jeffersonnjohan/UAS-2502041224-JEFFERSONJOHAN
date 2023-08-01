@extends('template.master')

@section('title', 'Your Friend')

@section('content')

<h1 class="text-3xl w-full text-center my-10">Your Friend</h1>

<div class="grid grid-cols-6 p-10">

    @foreach ($users as $user)
        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 m-auto">
            <a href="#">
                <img class="rounded-t-lg" src="{{ asset('storage/'.$user->image) }}" alt="" />
            </a>
            <div class="p-5 flex flex-col items-center">
                @php
                    $id1 = Illuminate\Support\Facades\Auth::user()->id;
                    $id2 = $user->id;

                    $id1Likeid2 = count(\App\Models\Like::where('user_id', $id1)->where('receiver_id', $id2)->get()) > 0;
                    $id2Likeid1 = count(\App\Models\Like::where('user_id', $id2)->where('receiver_id', $id1)->get()) > 0;
                    if($id1Likeid2 && $id2Likeid1){
                        $likeEachOther = true;
                    } else{
                        $likeEachOther = false;
                    }
                @endphp
                @if($likeEachOther)
                    <div class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Chat Now!
                    </div>
                @else
                    <button type="button" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Pending Friend</button>
                @endif
            </div>
        </div>
    @endforeach
</div>
@endsection