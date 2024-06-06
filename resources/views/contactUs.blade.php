@extends('layouts.app')


@push('head')
    <link rel="stylesheet" href="{{ asset('css/contactUs.css') }}">

@endpush

@section('title', 'Contact Us')

@section('content')

<div class="banner-faq">
    <div class="banner">
        <img src="image/banner.png" alt="" class="full-img">
        <div class="text1">
            <h1>Help Center</h1>
        </div>
    </div>
    <div class="faq">
        <div class="faq-box">
            <h2>Frequently Asked</h2>
            <ul class = "faq-list">
                <li><a href="{{ route('discover') }}" target="_blank">How to Return Groceries?</a></li>
                <li><a href="{{ route('discover') }}" target="_blank">How to Change Profile Picture?</a></li>
                <li><a href="{{ route('discover') }}" target="_blank">How to See Order Status?</a></li>
                <li><a href="{{ route('discover') }}" target="_blank">How to Change Main Address?</a></li>
            </ul>
            <button id = "show-more" onclick="showMore()"> Show More </button>
        </div>
        <div class="subtitle1">
            <h1>
                Find for questions you may need
            </h1>
        </div>
    </div>
</div>
<div class="send-email">
    <div class="subtitle2">
        <h1>
            Let us know your criticism, suggestion, or complaints
        </h1>
    </div>
    <div class="message">
        <form class="feedback-form">
            <div class="field1">
                <input type="email" class="email" placeholder="Your Email">
            </div>
            <div class="separator"></div>
            <div class="field2">
                <input type="send-message" class="send-message" placeholder="Message">
            </div>
            <div class="separator"></div>
            <div class="button">
                <button id = "message-btn" onclick=""> Send Message </button>
            </div>
        </form>
    </div>

</div>




@endsection

@section('script')
    <script src="{{ asset('js/contactUs.js') }}"></script>
@endsection
