@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12">
            
            <div class="p-6">
                <h1 class="text-2xl font-medium mb-1">{{$user->name}}</h1>
                <p>Posted {{ $num = $posts->count() }}
                @if ($num < 2)
                    Post
                @else
                    Posts
                @endif
                and received {{ $user->receivedLikes->count() }} likes
                </p>
            </div>
            
            
            <div class="bg-white p-6 rounded-lg">
                
                @if ($posts->count()) {{-- OR use count($posts) --}}
                    @foreach($posts as $post)
                        {{-- Using Post Component --}}
                        <x-post :post="$post" />
                                            
                    @endforeach
                    {{ $posts->links() }}
                                    
                @else
                    <p>{{ $user->name }} does not have any post.</p>
                @endif
                
            </div>
        </div>
    </div>

@endsection