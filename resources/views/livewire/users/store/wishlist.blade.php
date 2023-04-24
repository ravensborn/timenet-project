<div>

    <!-- Content -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-3">
                <!-- Navbar -->
                @livewire('users.account.components.navbar-component', ['active' => 'wishlist'])
                <!-- End Navbar -->
            </div>
            <!-- End Col -->

            <div class="col-lg-9">
                <div class="d-grid gap-3 gap-lg-5">
                    <!-- Card -->
                    <div class="card">
                        <div class="card-header border-bottom">
                            <h4 class="card-header-title">Wishlist</h4>
                        </div>

                        <div class="card-body">
                            @if($items->count())
                                <h5>Items</h5>
                            @endif
                            <ul class="list-group">
                                @forelse($items as $item)
                                    <li class="list-group-item">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex justify-content-start align-items-center">

                                                <a href="{{ route('store.products.show', $item->product->slug) }}">
                                                    <img src="{{ $item->product->getFirstMediaUrl('cover') }}"
                                                         style="width: 64px;" alt="Item image"
                                                         class="img-thumbnail">
                                                </a>
                                                &nbsp;
                                                <div class="fw-bold text-truncate" style="width: 250px">
                                                    <a class="text-dark"
                                                       href="{{ route('store.products.show', $item->product->slug) }}">
                                                        {{ $item->product->name }}
                                                    </a>
                                                </div>
                                            </div>
                                            <div>

                                                <span class="text-danger small d-flex align-items-center"
                                                      style="cursor:pointer;"
                                                        wire:click="removeFromWishlist({{ $item->id }})">
                                                    <i class="d-block bi bi-trash me-1"></i>
                                                    <div>
                                                        Remove
                                                    </div>
                                                </span>
                                            </div>
                                        </div>
                                    </li>
                                @empty
                                    <div>
                                        <p>
                                            We're sorry, but currently, our wishlist page does not have any products
                                            available. However, we are always working to provide you with the latest and
                                            greatest items that will meet your needs and exceed your expectations.
                                            <a class="d-block mt-3" href="{{ route('store.index') }}">Click to navigate
                                                to available products.</a>
                                        </p>
                                    </div>
                                @endforelse
                            </ul>
                            <div class="mt-4">
                                {{ $items->links() }}
                            </div>
                        </div>
                    </div>
                    <!-- End Card -->

                </div>
            </div>
            <!-- End Col -->
        </div>
        <!-- End Row -->
    </div>
    <!-- End Content -->

</div>
