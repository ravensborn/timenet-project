<div>

    <form action="">
        <!-- Input Card -->
        <div class="input-card input-card-pill input-card-sm border ">
            <div class="input-card-form">
                <label for="subscribeForm" class="form-label visually-hidden">Enter email</label>
                <input type="text" class="form-control form-control-lg" id="subscribeForm"
                       placeholder="Enter email" aria-label="Enter email" wire:model="email">
            </div>

            <button type="button" class="btn btn-dark btn-lg" wire:loading.attr="disabled" wire:click.prevent="add">
                Subscribe
            </button>
        </div>

        <div class="mb-3 mt-3">
            @error('email')
            <small class="text-danger">{{ $message  }}</small>
            @endif
            @if($messageContext)
                <small class="text-{{ $messageType }}">{{ $messageContext  }}</small>
            @endif
        </div>


        <!-- End Input Card -->
    </form>


</div>
