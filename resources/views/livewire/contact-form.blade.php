<form class="form" wire:submit.prevent="saveContact">
    @csrf
    <div class="feedback-title">
        <h4>Contact Us</h4>
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Name :</label>
        <input type="text" class="form-control" id="name" wire:model.lazy="name" placeholder="eg. Ram, Ajay " />
        @error('name')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="mb-3">
        <label for="phone_number" class="form-label">Phone Number :</label>
        <input type="number" class="form-control" id="phone_number" wire:model.debounce.500ms="phone_number"
            placeholder="eg. 8784756393" />
        @error('phone_number')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    @if (session()->has('message'))
        <small class="text-success">{{ session('message') }}</small>
    @endif
    <div class="btn-group">
        <button wire:target="saveContact" wire:loading.attr="disabled" class="popup-btn">
            submit
            <img src="{{ asset('images/loader.gif') }}" wire:target="saveContact" wire:loading
                style="width: 20px;margin-left:10px" alt="submit loader">
        </button>
        <button type="button" onclick="contactClosePopup()" class="popup-btn popup-btn-close">Close</button>
    </div>
</form>
