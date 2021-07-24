@extends('layouts.app')

@section('content')
    
    <div class="flex justify-center">
        <div class="w-4/12 bg-white p-6 rounded-lg">
            
            <form action="{{route('register')}}" method="post">
                
                @csrf
                <div class="mb-4">
                    <label for="name" class="sr-only">Name</label>
                    <input type="text" name="name" id="name" placeholder="your name" class="bg-gray-100 border-2 w-full p-4 rounded-lg" value="{{old('name')}}">
                </div>
                @error('name')
                    <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                    </div>
                @enderror
                
                <div class="mb-4">
                    <label for="username" class="sr-only">Username</label>
                    <input type="text" name="username" id="username" placeholder="Username" class="bg-gray-100 border-2 w-full p-4 rounded-lg" value="{{old('username')}}">
                </div>
                @error('username')
                    <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                    </div>
                @enderror
                
                <div class="mb-4">
                    <label for="email" class="sr-only">Email</label>
                    <input type="text" name="email" id="email" placeholder="your Email" class="bg-gray-100 border-2 w-full p-4 rounded-lg" value="{{old('email')}}">
                </div>
                @error('email')
                    <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                    </div>
                @enderror
                
                <div class="mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" placeholder="choose a Password" class="bg-gray-100 border-2 w-full p-4 rounded-lg" value="{{old('password')}}">
                </div>
                @error('password')
                    <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                    </div>
                @enderror
                
                <div class="mb-4">
                    <label for="password_confirmation" class="sr-only">Password Again</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Repeat Password" class="bg-gray-100 border-2 w-full p-4 rounded-lg" value="{{old('password_confirmation')}}">
                </div>
                @error('password_confirmation')
                    <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                    </div>
                @enderror
                
                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full" name="button">Register</button>
                </div>
    
            </form>
            
        </div>
    </div>

@endsection