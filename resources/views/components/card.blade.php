<div class="card h-100">
    {{-- <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div> --}}

    <!-- Product image-->
    <img class="card-img-top" src="{{ asset('uploads').'/'.$image }}" alt="..." />
    <!-- Product details-->
    <div class="card-body p-4">
        <div class="text-center">
            <!-- Product name-->
            <h5 class="fw-bolder">{{ $imageName }}</h5>
            <!-- Product reviews-->
            <p>{{ $imageDetails }} </p>

    </div>
    </div>
    <!-- Product actions-->
    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
        @if($status == 'approved')
           <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{ route('user.myImages.sale')
            }}">Send Sale Request</a></div>
        @else
           <div class="text-center"><a class="btn btn-outline-dark mt-auto disabled" href="#">{{ strtoupper($status) }}</a></div>
        @endif
    </div>
</div>
