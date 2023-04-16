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
                            <h4 class="card-header-title">Order #{{ $order->number  }}</h4>
                        </div>

                        <div class="card-body">

                            <ul class="list-group">
                                <li class="list-group-item">
                                    <span class="fw-bold">Name:</span>
                                    #{{ $order->name }}
                                </li>
                                <li class="list-group-item">
                                    <span class="fw-bold">Status:</span>
                                    {{ $order->getStatusName() }}
                                </li>
                            </ul>

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
