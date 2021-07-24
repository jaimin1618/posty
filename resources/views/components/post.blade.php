@props(['post' => $post])

<div class="mb-4">
    
    {{-- button for showing user profile / posts --}}
    <a href="{{ route('users.posts', $post->user) }}" class="font-bold">{{$post->user->name}}</a> <span class="text-gray-600 text-sm">{{$post->created_at->diffForHumans()}}</span>
    <p class="mb-2">{{$post->body}}</p>
    
    
    @can('delete', $post) {{-- We can use this @can() because we have added into POLICY to ask before delete--}}
    {{-- @if ($post->ownedBy(auth()->user())) BECAUSE WE HAVE ADDED PERMISSION --}}
        <div class="">
            {{-- Deleting My/User Post --}}
            <form class="mr-1" action="{{ route('posts.destroy', $post) }}" method="post">
                @csrf
                @method('DELETE')
                <button class="text-blue-500" type="submit">Delete</button>
            </form>
        </div>
    {{-- @endif --}}
    @endcan
    
    {{-- Adding Liking and dislike button on post --}}
    <div class="flex items-center">
        @auth {{--If USER is authenticated--}}
            
            @if (!$post->likedBy(auth()->user()))
                <form class="mr-1" action="{{ route('posts.likes', $post) }}" method="post">
                    @csrf
                    <button class="text-blue-500" type="submit" name="button">Like</button>
                </form>
            @else
                <form class="mr-1" action="{{ route('posts.likes', $post) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="text-blue-500" type="submit" name="button">Dislike</button>
                </form>
            @endif
            
        @endauth
        {{--If User is NOT authenticated, They cannot access Like/Dislike buttons--}}
        
        <span> {{$num = $post->likes->count()}} @if ($num < 2) Like @else Likes @endif
        </span>
    </div>
</div>