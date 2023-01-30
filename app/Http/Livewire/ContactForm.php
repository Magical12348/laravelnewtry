<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ContactForm extends Component
{
    public $name;
    // public $email;
    public $phone_number;

    protected $rules = [
        'name' => 'required|min:6',
        // 'email' => 'required|email|unique:contacts,email',
        'phone_number' => 'required|digits:10',
    ];

    protected $messages = [
        // 'email.required' => 'The Email Address cannot be empty.',
        // 'email.email' => 'The Email Address format is not valid.',
        // 'email.unique' => 'The Email Already Exists.',
        // 'phone_number.unique' => 'The Phone Number Already Exists.',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function saveContact()
    {
        $validatedData = $this->validate();

        Contact::create($validatedData);

        $this->reset();

        $this->dispatchBrowserEvent('toastr:success');

        // return response()->download(public_path("pdf/brochure.pdf"));
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
