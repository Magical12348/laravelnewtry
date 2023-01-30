<div class="modified_popup" id="modified_popup">
    <div class="popup_container">
        <div class="cross">
            <button onclick="closePopup()">&Cross;</button>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="heading">
                    {{-- <h4>get syllabus</h4> --}}
                    <h4>Personality Test</h4>
                </div>
                @livewire('contact')
            </div>
            <div class="col-md-6 mobile-hide">
                <img src="{{ asset('images/contact.jpg') }}" alt="contact illustration image" />
            </div>
        </div>
    </div>
</div>
