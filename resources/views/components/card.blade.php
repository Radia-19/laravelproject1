<div class="card h-100">
    <!-- Sale badge-->
    @if($sale)
    <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
    @endif
    <!-- Product image-->
    <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
    <!-- Product details-->
    <div class="card-body p-4">
        <div class="text-center">
            <!-- Product name-->
            <h5 class="fw-bolder">{{ $itemName  }}</h5>
            <!-- Product reviews-->
            <div class="d-flex justify-content-center small text-warning mb-2">
                @if($star > 0)
                    @for($i=1; $i<=$star; $i++)
                        <div class="bi-star-fill"></div>
                    @endfor
                @endif
            </div>
            <!-- Product price-->
            @if($cutPrice)
            <span class="text-muted text-decoration-line-through">${{ $cutPrice }}</span>
            @endif
            ${{ $price ?? '0.00' }}
        </div>
    </div>
    <!-- Product actions-->
    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
    </div>
</div>
