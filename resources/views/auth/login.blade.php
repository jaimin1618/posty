@extends('layouts.app')

@section('content')
    
    <div class="flex justify-center">
        <div class="w-4/12 bg-white p-6 rounded-lg">
            
            {{-- WHEN LOGIN FAILS => SHOW ERROR --}}
            @if (session('status'))
                {{-- OR you can use => session()->has('status') --}}
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                  <strong class="font-bold">What did you do! </strong>
                  <span class="block sm:inline">{{session('status')}}</span>
                </div>
            @endif
            
            
            <form action="{{route('login')}}" method="post">
                
                @csrf
                                     
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
                    <div class="flex items-center">
                        <input type="checkbox" name="remember" id="remember" class="mr-2">
                        <label for="remember"> Remember me </label>
                        
                    </div>
                    
                </div>
                
                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full" name="button">Login</button>
                </div>
    
            </form>
            
        </div>
    </div>

@endsection