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
                @foreach($items as $item)
                <div class="col mb-5">
                    <x-card itemName="Item 1" sale="true" star="4" price="20.12"  cutPrice="30.00" />
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

@push('css')

@endpush

