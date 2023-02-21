<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>
    <div class="links">
        <a href="{{ route('dashboard') }}">Home</a> > 
        <a href="{{ route('posts.index') }}">Posts</a>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if(Session::has('post_created'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('post_created')}}
                        </div>
                    @endif
                    @if(Session::has('post_deleted'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('post_deleted')}}
                        </div>
                    @endif
                    <a href="{{ route('posts.create') }}" class="btn btn-primary" style="float: right;">Create post</a></div>
                    <div class="card-body">
                    <div class="table-responsive-sm">                    
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Post text</th>
                                    <th>Category</th>
                                    <th></th>
                                    <th></th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($posts as $post)
                                 <tr>
                                    <td><a href="{{ route('posts.show', $post) }}">{{$post->title}}</a></td>
                                    <td>{{$post->post_text}}</td>
                                    <td><a href="{{ route('categories.show', $post->category_id) }}">{{$post->category->name}}</a></td>

                                    <td><a href="{{ route('posts.edit', $post) }}" class="btn btn-success">Edit</a></td>
                                    <td>
                                        <form method="POST" action="{{ route('posts.destroy',$post->id) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE')}} 
                                            <button type="btn" class="btn btn-danger" onclick="
                                      var result = confirm('Are you sure you want to delete this post?');" value="Delete">Delete</button>
                                        </form>
                                    </td>
                                 </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
