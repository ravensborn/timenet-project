<div>

    <!-- Content -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-3">
                <!-- Navbar -->
                @livewire('users.account.components.navbar-component', ['active' => 'orders'])
                <!-- End Navbar -->
            </div>
            <!-- End Col -->

            <div class="col-lg-9">
                <div class="d-grid gap-3 gap-lg-5">
                    <!-- Card -->
                    <div class="card">
                        <div class="card-header border-bottom">
                            <h4 class="card-header-title">Orders</h4>
                        </div>

                        <div class="card-body">
                            <p>
                                Here you can view all the orders you have previously placed with us. You'll see a list
                                of your past orders, including the order date, item(s) ordered, and order status. You
                                can click on any order to view more details, such as shipping information and tracking
                                numbers. If you need to make changes to an existing order, please contact our customer
                                support team and we will do our best to assist you.
                            </p>

                            @forelse($orders as $order)

                                <div class="p-3 rounded mb-2 shadow-sm border border-opacity-10">

                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <a href="{{  route('users.store.orders.show', ['order' => $order->id])  }}" class="d-flex align-items-center text-dark">
                                                <div class="fw-bold me-2">
                                                    <i class="bi bi-box fs-3 me-1"></i>
                                                </div>
                                                <div class="fw-bold me-2">
                                                    #{{ $order->number }}
                                                </div>
                                                <div>
                                                    /
                                                    {{ $order->created_at->format('Y-m-d') }}
                                                </div>
                                            </a>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="me-2">
                                                <a href="">
                                                    <i class="bi bi-receipt"></i>
                                                    Invoice
                                                </a>
                                            </div>
                                            <div class="badge bg-secondary d-flex align-items-center">
                                                <small class="me-1">
                                                    <i class="fw-bold bi bi-{{ $order->getStatusColorAndIcon()['icon'] }}"></i>
                                                </small>
                                                <div>
                                                    <span class="text-capitalize">
                                                        {{ $order->getStatusName() }}
                                                    </span>

                                                </div>
                                            </div>

                                        </div>
                                    </div>


                                </div>

                            @empty
                                <p>
                                    You dont have any orders at the moment.
                                    <a class="d-block" href="{{ route('store.products.index') }}">Visit our store to see
                                        our products.</a>
                                </p>
                            @endforelse
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
