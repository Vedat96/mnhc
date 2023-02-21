<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $post->title }}
        </h2>
    </x-slot>
    <div class="links">
        <a href="{{ route('dashboard') }}">Home</a> > 
        <a href="{{ route('posts.index') }}">Posts</a> > 
        <a href="">{{$post->title}}</a>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                </div>
                    <div class="card-body">
                        <a href="{{ route('posts.edit', $post) }}" class="btn btn-success">Edit</a>
                        <form method="POST" action="{{ route('posts.destroy',$post->id) }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE')}} 
                            <button type="btn" class="btn btn-danger" onclick="
                                      var result = confirm('Are you sure you want to delete this post?');" value="Delete">Delete
                            </button>
                        </form>
                        {{ $post->post_text }} 
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
