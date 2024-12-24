@extends('layouts.userLayout')

@section('title','My Images')

@push('css')

@endpush


@section('content')
   <div class="container">
       <div class="row">
        <div class="col-8 offset-2 mt-4">
            @include('errors.error')
             My Images :
             <hr>

                <!-- Section-->
                <section class="py-2">
                    <div class="container px-4 px-lg-5 mt-5">
                        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-3 justify-content-center">
                            @foreach($userImages as $image)
                            <div class="col mb-5">
                                <x-card :imageData="$image" :imageName="$image->name" :imageDetails="$image->details" :image="$image->image" :status="$image->status" />
                            </div>
                            @endforeach
                        </div>
                        {{ $userImages->links() }}
                    </div>
                </section>

           </div>
       </div>
   </div>
@endsection

@push('js')

@endpush

