<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>
    <div class="links">
        <a href="{{ route('dashboard') }}">Home</a> > 
        <a href="{{ route('categories.index') }}">Categories</a>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if(Session::has('category_created'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('category_created')}}
                        </div>
                    @endif
                    @if(Session::has('category_deleted'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('category_deleted')}}
                        </div>
                    @endif
                    <a href="{{ route('categories.create') }}" class="btn btn-primary" style="float: right;">Create Category</a></div>
                    <div class="card-body">
                    <div class="table-responsive-sm">                    
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                 <tr>
                                    <td><a href="{{ route('categories.show', $category) }}">{{$category->name}}</a></td>
                                    <td><a href="{{ route('categories.edit', $category) }}" class="btn btn-success">Edit</a></td>
                                    <td>
                                        <form method="POST" action="{{ route('categories.destroy',$category->id) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE')}} 
                                            <button type="btn" class="btn btn-danger" onclick="
                                      var result = confirm('Are you sure you want to delete this category?');" value="Delete">Delete</button>
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
