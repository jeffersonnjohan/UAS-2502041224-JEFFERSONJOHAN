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
                    <p class="mb-3">You like each other!</p>
                    <button type="button" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Chat now!</button>
                    <a href="/dislike/{{ $user->id }}" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Remove friend</a>
                @else
                    <p class="mb-3">Doesn't like you back!</p>
                    <a href="/dislike/{{ $user->id }}" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Remove friend</a>
                @endif
            </div>
        </div>
    @endforeach
</div>
@endsection