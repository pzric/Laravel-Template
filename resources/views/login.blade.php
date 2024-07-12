@extends('layouts.template')
@section('title', 'Login')
@section('content')
<div class="w-full flex flex-wrap">
    <!-- Login Section -->
    <div class="w-full md:w-1/2 flex flex-col">
        <div class="flex flex-col justify-center md:justify-start my-auto pt-8 md:pt-0 px-8 md:px-24 lg:px-32">
            <p class="text-center text-3xl">Bienvenido.</p>
            <form class="flex flex-col pt-3 md:pt-8" method="post" action="{{route('home')}}">
                @csrf
                <div class="flex flex-col pt-4">
                    <label for="code" class="text-lg">Nombre de usuario</label>
                    <input type="text" required autofocus name="username" value="{{ old('username') }}" placeholder="Nombre de usuario " class="appearance-none shadow border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline">
                    @error ('username')<small class="text-red-700">{{$message}}</small>@enderror
                </div>
                <div class="flex flex-col pt-4">
                    <label for="password" class="text-lg">Contraseña</label>
                    <input type="password" required name="password" placeholder="Contraseña" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline">
                    @error ('password')<small class="text-red-700">{{$message}}</small>@enderror
                </div>
                @error ('credentials')<small class="text-red-700">{{$message}}</small>@enderror
                <div class="pt-4 text-center">
                    <input class="form-check-input" name="remember" value="1" type="checkbox">
                    <label class="form-check-label">Mantener la sesión iniciada</label>
                </div>
                <input type="submit" value="Iniciar seccion" class="bg-black text-white font-bold text-lg hover:bg-gray-700 p-2 mt-8">
            </form>
        </div>
    </div>
    <!-- Image Section -->
    <div class="w-1/2 shadow-2xl">
        <img class="object-cover w-full h-screen hidden md:block" src="https://picsum.photos/200/300/?blur=2">
    </div>
</div>
@endsection
<!-- menseje de error login-->
