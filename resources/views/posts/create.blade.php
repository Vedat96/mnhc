F<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ceate Post') }}
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
                    <form method="POST" action="{{ route('posts.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="post-title">Title<span class="required">*</span></label>
                            <input   placeholder="Title"  
                                      id="post-title"
                                      required
                                      name="title"
                                      spellcheck="false"
                                      class="form-control"
                                      value=""
                                      type="text" 
                                       />
                        </div>
                        <div class="form-group">
                            <label for="post_text">Post text</label>
                            <textarea class="form-control" id="post_text" name="post_text" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select class="form-control" name="category_id">
                                @foreach($categories as $category)
                                <option value="{{$category->id}}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">Save</button>                     
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
