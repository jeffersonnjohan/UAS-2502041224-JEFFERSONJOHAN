@extends('template.master')

@section('title', 'Home')

@section('content')

<div class="p-10">
    <h1 class="text-3xl font-bold mb-5">All Users</h1>
    
    <form action="" method="get" class="mb-5">
        <div class="flex">
        <select name="gender" id="" class="text-gray-900 bg-gray-50 rounded-r-lg border-l-gray-50 border-l-2 border border-gray-300 ">
                <option value="all" {{ $request->gender == 'all'? 'selected' : '' }}>
                    <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">All genders</button>
                </option>
                <option value="male" {{ $request->gender == 'male'? 'selected' : '' }}>
                    <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Male</button>
                </option>
                <option value="female" {{ $request->gender == 'female'? 'selected' : '' }}>
                    <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Female</button>
                </option>
        </select>
            <div class="relative w-full">
                <input type="search" name="keyword" value="{{ $request->keyword }}" id="search-dropdown" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-r-lg border-l-gray-50 border-l-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-l-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="Insert name that want to be searched">
                <button type="submit" class="absolute top-0 right-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-r-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                    <span class="sr-only">Search</span>
                </button>
            </div>
        </div>
    </form>

    <div class="grid grid-cols-3">
    
        @foreach ($users as $user)
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 m-auto">
                <a href="#">
                    <img class="rounded-t-lg" src="{{ asset('storage/'.$user->image) }}" alt="" />
                </a>
                <div class="p-5 flex flex-col items-center">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $user->name }}</h5>
                    </a>
                    <a href="/user/{{ $user->id }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg fill="#000000" width="20" height="20" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="64px" height="64px" viewBox="0 0 47 47" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g id="Layer_1_27_"> <g> <path d="M44.732,23.195l-4.528-0.001c-1.25,0.001-2.265,1.014-2.267,2.264v19.164c0,1.252,1.017,2.266,2.267,2.266h4.528 c1.252,0,2.268-1.014,2.268-2.266v-19.16C47,24.21,45.984,23.195,44.732,23.195z M42.927,44.521 c-0.726,0.727-1.903,0.727-2.629,0s-0.726-1.902,0-2.628c0.726-0.728,1.904-0.728,2.629,0 C43.652,42.618,43.652,43.794,42.927,44.521z"></path> <path d="M29.078,9.795c0.197-2.889,0.969-4.351,1.238-7.204c0.154-1.626-1.549-2.479-4.647-2.479 c-3.098,0-4.298,2.773-4.648,3.718c-0.774,2.092,0,8.985,0,12.394c0,2.686-4.805,4.16-10.303,4.169C3.155,20.408,0,18.6,0,23.345 c0,1.642,1.013,2.973,2.265,2.972c-1.252,0-2.266,1.334-2.265,2.974c0,1.64,1.013,2.974,2.265,2.971 C1.013,32.264,0.001,33.595,0,35.233c0,1.645,1.015,2.973,2.265,2.975c-1.25-0.002-2.265,1.33-2.264,2.975 c0,1.643,1.013,2.972,2.264,2.972c0,0,3.219,0.003,15.429,0.003c12.21,0,16.671,0,16.671,0c0.625,0,1.131-0.507,1.132-1.134 V25.82c0.001-0.183-0.045-0.362-0.129-0.524C35.367,25.296,28.535,17.773,29.078,9.795z"></path> </g> </g> </g> </g></svg>
                    </a>
                </div>
            
            </div>
        @endforeach
    </div>

</div>
@endsection