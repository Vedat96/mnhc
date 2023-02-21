<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Category') }}
        </h2>
    </x-slot>
    <div class="links">
        <a href="{{ route('dashboard') }}">Home</a> > 
        <a href="{{ route('categories.index') }}">Categories</a> > 
        <a href="">{{$category->name}}</a>
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
                    <form method="POST" action="{{ route('categories.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="category-name">Name<span class="required">*</span></label>
                            <input   placeholder="Name"  
                                      id="category-name"
                                      required
                                      name="name"
                                      spellcheck="false"
                                      class="form-control"
                                      value=""
                                      type="text" 
                                       />
                        </div>
                        <button class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">Save</button>                     
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
