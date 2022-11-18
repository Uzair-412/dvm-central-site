@extends('frontend.layouts.app')
@section('title', 'Vet Tech CE | Free Online Veterinary Courses | DVM Central')
@section('meta_description', 'Stay updated with the veterinary treatment protocols, connect with veterinary professionals and earn CE credits with VetandTech.')
@section('meta_keywords', 'Vet Tech Certification, Vet Tech Courses, Vet Tech CE, Vet Nurse Course, Vet Tech')
@push('after-styles')
    <link rel="stylesheet" href="/assets/styles/courses-category.css" />
@endpush
@section('content')
    <!-- page content -->
    <main id="courses-category-page" class="relative bg-gray-50">
        <div class="courses-category-container width flex flex-col justify-center items-center">
            <div class="w-full flex flex-col sm:flex-row justify-between mt-20">
                <h1 class="text-2xl font-semibold sm:mt-2">Take Your Skills To Another Level</h1>
                <a class="relative btn blue-btn text-white inline-block px-3 py-2 lite-blue-bg-color font-semibold w-max sm:ml-h mt-2 sm:mt-0" href="/courses/cart">View cart</a>
            </div>
            <div class="courses-category-wrapper grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4 mt-6 w-full">
                @foreach ($data['course_categories'] as $category)
                {{-- {{dd($category->getCourses()->slug)}} --}}
                    <a href="{{'/courses/categories/'.$category->slug}}"
                        class="course-category-card inline-flex flex-col justify-center relative border border-solid border-gray-200 overflow-hidden bg-white p-4 z-10">
                        <div
                            class="course-category-title font-semibold text-xl mb-4 transition-all duration-500 ease-in-out">
                            {{ $category['name'] }}</div>
                        <div class="course-category-info text-gray-500 text-xs transition-all duration-500 ease-in-out">
                            {{ $category['short_description'] }}</div>
                        <div class="flex justify-between items-center mt-4 border-t border-solid border-gray-200 pt-4">
                            <div class="course-category-no">
                                <div class="no text-sm md:text-base font-semibold transition-all duration-500 ease-in-out">{{$category->getCourses->count()}}
                                </div>
                                <div class="text-xs text-gray-500 transition-all duration-500 ease-in-out">Courses</div>
                            </div>
                            <div class="course-category-enrollments">
                                <div class="no text-sm md:text-base font-semibold transition-all duration-500 ease-in-out">{{ $category->enrolments($category->id) }}</div>
                                <div class="text-xs text-gray-500 transition-all duration-500 ease-in-out">Enrollments</div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            <div class="flex flex-col sm:flex-row justify-between items-center mt-12 w-full text-gray-500 text-xs md:text-sm lg:text-base courses-metrics">
                <div class="flex items-center">
                    <img class="mr-2" src="{{ asset('assets/icons/people.svg') }}" alt="Over 1,000 Students" />
                    <div>Over 200,000 Students</div>
                </div>
                <div class="flex items-center sm:mx-2 md:mx-4">
                    <img class="mr-2" src="{{ asset('assets/icons/teacher.svg') }}" alt="Teach By Industry Professionals" />
                    <div>Teach By Industry Professionals</div>
                </div>
                <div class="flex items-center">
                    <img class="mr-2" src="{{ asset('assets/icons/cell-phone.svg') }}" alt="Learn At Your Own Pace" />
                    <div>Learn At Your Own Pace</div>
                </div>
            </div>
        </div>
    </main>
@endsection
