@extends('app')

@section('content')

<!-- Blog Start -->
<div class="container py-5">
    <div class="row g-5">
        <!-- Blog list Start -->
        <div class="col-lg-8">
            @foreach(range(1,6) as $i)
            <div class="blog-item mb-5">
                <div class="row g-0 bg-light overflow-hidden">
                    <div class="col-12 col-sm-5 h-100">
                        <img class="img-fluid h-100" src="{{ asset('assets/img/blog-'.$i.'.jpg') }}" style="object-fit: cover;">
                    </div>
                    <div class="col-12 col-sm-7 h-100 d-flex flex-column justify-content-center">
                        <div class="p-4">
                            <div class="d-flex mb-3">
                                <small class="me-3"><i class="bi bi-bookmarks me-2"></i>Veterinary Tips</small>
                                <small><i class="bi bi-calendar-date me-2"></i>{{ now()->format('d M, Y') }}</small>
                            </div>
                            <h5 class="text-uppercase mb-3">How to Keep Your Pet Healthy</h5>
                            <p>Learn essential tips on pet nutrition, vaccinations, and exercise routines to keep your pets happy and healthy.</p>
                            <a class="text-primary text-uppercase" href="#">Read More <i class="bi bi-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            <!-- Pagination -->
            <div class="col-12">
                <nav aria-label="Page navigation">
                  <ul class="pagination pagination-lg m-0">
                    <li class="page-item disabled">
                      <a class="page-link rounded-0" href="#" aria-label="Previous">
                        <span aria-hidden="true"><i class="bi bi-arrow-left"></i></span>
                      </a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                      <a class="page-link rounded-0" href="#" aria-label="Next">
                        <span aria-hidden="true"><i class="bi bi-arrow-right"></i></span>
                      </a>
                    </li>
                  </ul>
                </nav>
            </div>
        </div>
        <!-- Blog list End -->

        <!-- Sidebar Start -->
        <div class="col-lg-4">
            <!-- Search Form -->
            <div class="mb-5">
                <div class="input-group">
                    <input type="text" class="form-control p-3" placeholder="Search Blog...">
                    <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
                </div>
            </div>

            <!-- Categories -->
            <div class="mb-5">
                <h3 class="text-uppercase border-start border-5 border-primary ps-3 mb-4">Categories</h3>
                <div class="d-flex flex-column justify-content-start">
                    <a class="h5 bg-light py-2 px-3 mb-2" href="#"><i class="bi bi-arrow-right me-2"></i>Pet Nutrition</a>
                    <a class="h5 bg-light py-2 px-3 mb-2" href="#"><i class="bi bi-arrow-right me-2"></i>Pet Training</a>
                    <a class="h5 bg-light py-2 px-3 mb-2" href="#"><i class="bi bi-arrow-right me-2"></i>Vaccinations</a>
                    <a class="h5 bg-light py-2 px-3 mb-2" href="#"><i class="bi bi-arrow-right me-2"></i>Pet Grooming</a>
                    <a class="h5 bg-light py-2 px-3 mb-2" href="#"><i class="bi bi-arrow-right me-2"></i>Pet Diseases</a>
                    <a class="h5 bg-light py-2 px-3 mb-2" href="#"><i class="bi bi-arrow-right me-2"></i>Behavior Tips</a>
                </div>
            </div>

            <!-- Recent Posts -->
            <div class="mb-5">
                <h3 class="text-uppercase border-start border-5 border-primary ps-3 mb-4">Recent Posts</h3>
                @foreach(range(1,4) as $i)
                <div class="d-flex overflow-hidden mb-3">
                    <img class="img-fluid" src="{{ asset('assets/img/blog-'.$i.'.jpg') }}" style="width: 100px; height: 100px; object-fit: cover;" alt="">
                    <a href="#" class="h5 d-flex align-items-center bg-light px-3 mb-0">Tips for Pet Care #{{ $i }}</a>
                </div>
                @endforeach
            </div>

            <!-- Image / Banner -->
            <div class="mb-5">
                <img src="{{ asset('assets/img/blog-1.jpg') }}" alt="" class="img-fluid rounded">
            </div>

            <!-- Tag Cloud -->
            <div class="mb-5">
                <h3 class="text-uppercase border-start border-5 border-primary ps-3 mb-4">Tag Cloud</h3>
                <div class="d-flex flex-wrap m-n1">
                    <a href="#" class="btn btn-primary m-1">Health</a>
                    <a href="#" class="btn btn-primary m-1">Training</a>
                    <a href="#" class="btn btn-primary m-1">Nutrition</a>
                    <a href="#" class="btn btn-primary m-1">Vaccination</a>
                    <a href="#" class="btn btn-primary m-1">Grooming</a>
                    <a href="#" class="btn btn-primary m-1">Behavior</a>
                </div>
            </div>

            <!-- Plain Text / About Sidebar -->
            <div>
                <h3 class="text-uppercase border-start border-5 border-primary ps-3 mb-4">About Our Blog</h3>
                <div class="bg-light text-center p-3">
                    <p>Learn everything about pet health, nutrition, grooming, and training tips from professional veterinarians.</p>
                    <a href="#" class="btn btn-primary py-2 px-4">Read More</a>
                </div>
            </div>

        </div>
        <!-- Sidebar End -->
    </div>
</div>
<!-- Blog End -->

@endsection
