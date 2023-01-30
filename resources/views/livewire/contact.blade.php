<form wire:submit.prevent="saveContact" class="popup_inputs">
    @csrf
    <input type="text" wire:model.lazy="name" placeholder="Enter your Name" />
    @error('name') <small class="text-danger">{{ $message }}</small> @enderror
    <input type="email" wire:model.lazy="email" placeholder="Enter your Email" />
    @error('email') <small class="text-danger">{{ $message }}</small> @enderror
    <input type="number" wire:model.debounce.500ms="phone_number" placeholder="Enter your Number" />
    @error('phone_number') <small class="text-danger">{{ $message }}</small> @enderror
    @if (session()->has('message'))
        <small class="text-success">{{ session('message') }}</small>
    @endif
    <button wire:target="saveContact" wire:loading.attr="disabled" class="custom_btn">Download</button>
    </button>
</form>
