@extends('template.master')

@section('title', 'Profile')

@section('content')

<div class="flex flex-col items-center">
    @if($user->is_visible)
        <img class="rounded-full w-52 h-52" src="{{ asset('storage/'.$user->image) }}" alt="image description" style="object-fit: cover">
    @else
        <img class="rounded-full w-52 h-52" src="/bear.png" alt="image description" style="object-fit: cover">
    @endif
    <h1 class="text-3xl mt-5 mb-3">{{ $user->name }}</h1>
    <p class="mb-2">Your Coin: {{ $user->coin }}</p>

    <form action="/profile/addcoin" method="POST">
        @csrf
        <button type="submit" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">+ Click to add 100 coins</button>
    </form>
    <form action="/profile/changeVisibility" method="POST">
        @csrf
        
        @if($user->is_visible)
            <p class="text-center mt-6">Your status is: <b>VISIBLE</b></p>
            <input type="hidden" name="visibility" value="0">
            <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Hide this account with 1000 coins</button>
        @else
            <p class="text-center mt-6">Your status is: <b>UNVISIBLE</b></p>
            <input type="hidden" name="visibility" value="1">
            <button type="submit" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Restore this account with 1000 coins</button>
        @endif
    </form>
</div>
@endsection