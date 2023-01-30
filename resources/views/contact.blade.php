@extends('layouts.base')

@section('title')
    Contact Us
@endsection

@section('content')
    <section class="container-fluid" id="hero">
        <div class="row">
            <div class="col-md-12 heading_text">
                <h1>Contact Us</h1>
            </div>
        </div>
    </section>
    <section class="container-fluid" id="contact-page">
        <div class="row">
            <div class="col-md-6 mt-4 offset-md-1">
                <div class="contact_card">
                    <h2 class="title mb-3">
                        magical umbrella pvt. ltd.
                    </h2>
                    {{-- <div class="card_subtitle mb-3">
                        <span>landline no. : </span>

                        <a href="tel:07172257803">07172-257803</a><span class="hide">,</span><a
                            href="tel:07172257804">07172-257804</a><span class="hide">,</span><a
                            href="tel:7410132639">7410132639</a>
                    </div> --}}

                    <div class="card_subtitle mb-3">
                        <span>email address : </span>
                        <a href="mailto:explore@magicalumbrella.com"
                            style="text-transform: lowercase">explore@magicalumbrella.com</a>
                    </div>

                    {{-- <div class="card_subtitle mb-3 card_change">
                        <span>office address : </span>
                        <a>2<sup>nd</sup> floor nagari sahkari pathsanstha, beside sultan biryani house, azad
                            chowk, tukum, chandrapur - 442401
                        </a>
                    </div> --}}

                    <div class="card_subtitle card_change">
                        <span>registered address : </span>
                        <a>plot no. 27/a, behind S.P.Law collage, vidya vihar school road, tukum, chandrapur -
                            442401</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="space-20"></div>
    <section class="container-fluid" id="contact-page">
        <div class="row">
            <div class="mt-2 col-md-6 mt-1 offset-md-1">
                <div class="social_card">
                    <a class="social_link" target="_blank" href="{{ config('setting.links.facebook') }}">
                        <img id="facebook" src="{{ asset('images/social/facebook.png') }}" alt="">
                        <span for="facebook">facebook</span>
                    </a>
                    <a class="social_link" target="_blank" href="{{ config('setting.links.instagram') }}">
                        <img id="instagram" src="{{ asset('images/social/instagram.png') }}" alt="">
                        <span for="instagram">instagram</span>
                    </a>
                    <a class="social_link" target="_blank" href="{{ config('setting.links.youtube') }}">
                        <img id="youtube" src="{{ asset('images/social/youtube.png') }}" alt="">
                        <span for="youtube">YouTube</span>
                    </a>
                    <a class="social_link" target="_blank" href="{{ config('setting.links.twitter') }}">
                        <img id="twitter" src="{{ asset('images/social/twitter.png') }}" alt="">
                        <span for="twitter">Twitter</span>
                    </a>
                    <a class="social_link" target="_blank" href="{{ config('setting.links.telegram') }}">
                        <img id="telegram" src="{{ asset('images/social/telegram.png') }}" alt="">
                        <span for="telegram">Telegram</span>
                    </a>
                    {{-- <a class="social_link" href="#">
                            <img id="whatsapp" src="{{ asset('images/social/whatsapp.png') }}" alt="">
                            <span for="whatsapp">whatsapp</span>
                        </a>
                        <a class="social_link" href="#">
                            <img id="linkedin" src="{{ asset('images/social/linkedin.png') }}" alt="">
                            <span for="linkedin">linkedin</span>
                        </a> --}}
                </div>
            </div>
        </div>
    </section>
    <section class="container-fluid" id="gmap">
        <div class="row">
            <div class="col-md-12">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d234.37003328852362!2d79.29866937055223!3d19.96984397210277!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bd2d5f71c8c39b9%3A0xd8720fa3b0287144!2sMagical%20umbrella%20pvt%20ltd.!5e0!3m2!1sen!2sin!4v1640419825105!5m2!1sen!2sin"
                    allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </section>
@endsection
