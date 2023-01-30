<?php

namespace App\Http\Livewire;

use App\Models\Contact as ContactModel;
use Livewire\Component;

class Contact extends Component
{
    public $name;
    public $email;
    public $phone_number;

    protected $rules = [
        'name' => 'required|min:6',
        'email' => 'required|email|unique:contacts,email',
        'phone_number' => 'required|digits:10|unique:contacts,phone_number',
    ];

    protected $messages = [
        'email.required' => 'The Email Address cannot be empty.',
        'email.email' => 'The Email Address format is not valid.',
        'email.unique' => 'The Email Already Exists.',
        'phone_number.unique' => 'The Phone Number Already Exists.',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function saveContact()
    {
        $validatedData = $this->validate();

        ContactModel::create($validatedData);

        $this->reset();

        // return response()->download(public_path("pdf/brochure.pdf"));
        return response()->download(public_path("/pdf/Your-Personality-Type.pdf"));
    }

    public function render()
    {
        return view('livewire.contact');
    }
}
