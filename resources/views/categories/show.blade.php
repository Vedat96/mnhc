<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <!-- {{ __('Categories') }} -->
            {{ $category->name }}
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
                    @if(Session::has('category_deleted'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('category_deleted')}}
                        </div>
                    @endif
                     <main class="my-5">
    <div class="container">
      <!--Grid row-->
      <div class="row">
        <!--Grid column-->
        <div class="col-md-9 mb-4">
          <!--Section: Content-->
          <section>
            @foreach($category->posts as $category->post)

            <!-- Post -->
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="bg-image hover-overlay shadow-1-strong rounded ripple" data-mdb-ripple-color="light">
                        <img src="https://mdbootstrap.com/img/new/standard/nature/111.jpg" class="img-fluid" />
                            <a href="#!">
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                            </a>
                    </div>
                </div>                        
                <div class="col-md-8 mb-4">
                    <h4>{{$category->post->title}}</h4>
                    <p>
                        {{ Illuminate\Support\Str::limit($category->post->post_text, 300)}}
                    </p>

                    <button type="button" class="btn btn-primary">Read</button>
                </div>
            </div>
            @endforeach
          </section>
          <!--Section: Content-->
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-3 mb-4">
          <!--Section: Sidebar-->
          <section class="sticky-top" style="top: 80px;">
            <!--Section: Ad-->
            <section class="text-center border-bottom pb-4 mb-4">
              <div class="bg-image hover-overlay ripple mb-4">
                <img
                  src="https://mdbootstrap.com/wp-content/themes/mdbootstrap4/content/en/_mdb5/standard/about/assets/mdb5-about.webp"
                  class="img-fluid" />
                <a href="https://mdbootstrap.com/docs/standard/" target="_blank">
                  <div class="mask" style="background-color: rgba(57, 192, 237, 0.2);"></div>
                </a>
              </div>
              <h5>Material Design for Bootstrap 5</h5>

              <p>
                500+ components, free templates, 1-min installation, extensive tutorial, huge
                community. MIT license - free for personal & commercial use
              </p>
              <a role="button" class="btn btn-primary" href="https://mdbootstrap.com/docs/standard/"
                target="_blank">Download for free<i class="fas fa-download ms-2"></i></a>
            </section>
            <!--Section: Ad-->

            <!--Section: Video-->
            <section class="text-center">
              <h5 class="mb-4">Learn the newest Bootstrap 5</h5>

              <div class="embed-responsive embed-responsive-16by9 shadow-4-strong">
                <iframe class="embed-responsive-item rounded" src="https://www.youtube.com/embed/c9B4TPnak1A"
                  allowfullscreen></iframe>
              </div>
            </section>
            <!--Section: Video-->
          </section>
          <!--Section: Sidebar-->
        </div>
        <!--Grid column-->
      </div>
      <!--Grid row-->

      <!-- Pagination -->
      <nav class="my-4" aria-label="...">
        <ul class="pagination pagination-circle justify-content-center">
          <li class="page-item">
            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
          </li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item active" aria-current="page">
            <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
          </li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item">
            <a class="page-link" href="#">Next</a>
          </li>
        </ul>
      </nav>
    </div>
  </main>
                    <!-- <a href="{{ route('categories.create') }}" class="btn btn-primary" style="float: right;">Create Category</a></div> -->
                     <form method="POST" action="{{ route('categories.destroy',$category->id) }}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE')}} 
                        <button type="btn" class="btn btn-danger" style="float: right;" onclick="
                            var result = confirm('Are you sure you want to delete this category?');" value="Delete">Delete
                        </button>
                    </form>
                    <a href="{{ route('categories.edit', $category) }}" class="btn btn-success" style="float: right;">Edit</a>
                    <!-- <div class="card-body"> -->


                   
                        <!-- {{ $category->posts }} -->


                        <!-- foreach posts... -->
                        <!-- $category->posts -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
