@extends('layouts.userLayout')

@section('title','Welcome')

@push('css')

@endpush
@section('slider')
    @include('partials.slider')
@endsection

@section('content')
    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @foreach($randomImages as $image)
                <div class="col mb-5">
                    <x-card :imageName="$image->name" :imageDetails="$image->details" :image="$image->image"/>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

@push('css')

@endpush

