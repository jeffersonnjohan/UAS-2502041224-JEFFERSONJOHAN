@extends('template.master')

@section('title', 'Register')

@section('content')

@if(session()->has('error'))
<div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
    {{ session('error') }}
</div>
@endif


<h1 class="text-3xl my-10 text-center w-full">Register</h1>
<form action="/register" method="POST" class="w-1/2 m-auto" enctype="multipart/form-data">
    @csrf
    <div class="mb-6">
        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your name</label>
        <input type="text" name="name" value="{{ old('name') }}" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        @error('name')
            <div class="text-red-600">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-6">
        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your password</label>
        <input type="password" name="password" value="{{ old('password') }}" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        @error('password')
            <div class="text-red-600">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-6">
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your gender</label>
        <input type="radio" name="is_male" id="male" value="1" {{ old('is_male') == '1' ? 'checked' : '' }}> <label for="male">Male</label>
        <input type="radio" name="is_male" id="female" value="0" {{ old('is_male') == '0' ? 'checked' : '' }}> <label for="female">Female</label>
        @error('is_male')
            <div class="text-red-600">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-6">
        <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your image</label>
        <input type="file" name="image" id="image" onchange="previewImage()">
        <img class="img-preview" src="" alt="">
        @error('image')
            <div class="text-red-600">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-6">
        <input type="hidden" name="price" value="{{ $price }}">
        <label for="payment" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your price is {{ $price }}</label>
        <input type="text" name="payment" value="{{ old('payment') }}" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        @error('payment')
            <div class="text-red-600">{{ $message }}</div>
        @enderror   
    </div>
    <div class="mb-6">
        <label for="hobby_1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Choose your first hobby</label>
        <select name="hobby_1" id="hobby_1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            @php
                $hobbies = \App\Models\Hobby::all();
            @endphp
            @foreach ($hobbies as $hobby)
                <option value="{{ $hobby->id }}">{{ $hobby->name }}</option>
            @endforeach
        </select>
        @error('hobby_1')
            <div class="text-red-600">{{ $message }}</div>
        @enderror   
    </div>
    <div class="mb-6">
        <label for="hobby_2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Choose your second hobby</label>
        <select name="hobby_2" id="hobby_2" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            @php
                $hobbies = \App\Models\Hobby::all();
            @endphp
            @foreach ($hobbies as $hobby)
                <option value="{{ $hobby->id }}">{{ $hobby->name }}</option>
            @endforeach
        </select>
        @error('hobby_2')
            <div class="text-red-600">{{ $message }}</div>
        @enderror   
    </div>
    <div class="mb-6">
        <label for="hobby_3" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Choose your third hobby</label>
        <select name="hobby_3" id="hobby_3" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            @php
                $hobbies = \App\Models\Hobby::all();
            @endphp
            @foreach ($hobbies as $hobby)
                <option value="{{ $hobby->id }}">{{ $hobby->name }}</option>
            @endforeach
        </select>
        @error('hobby_3')
            <div class="text-red-600">{{ $message }}</div>
        @enderror   
    </div>
    <div class="mb-6">
        <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your phone</label>
        <input type="text" name="phone" value="{{ old('phone') }}" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        @error('phone')
            <div class="text-red-600">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    <p class="my-5">If you already have an account, <a href="/login" class="text-blue-500">Login here</a></p>
</form>


<script>
    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvenet) {
            imgPreview.src = oFREvenet.target.result;
        }
    }
</script>
@endsection