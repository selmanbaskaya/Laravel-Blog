@extends('front.layouts.master')
@section('title', 'İletişim')
@section('bg', 'data:image/jpeg;base64,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')
@section('content')
    <div class="col-lg-8 col-md-7 mx-auto">
        <p>Bizimle İletişime Geçebilirsiniz!</p>
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
        <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
        <!-- To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
        <form method="post" action="{{ route('contact.post') }}">
            @csrf
            <div class="control-group">
                <div class="form-group controls">
                    <label>Ad Soyad</label>
                    <input type="text" class="form-control" value="{{ old('name') }}" placeholder="Ad Soyad" name="name" required>
                    <p class="help-block text-danger"></p>
                </div>
            </div>
            <div class="control-group">
                <div class="form-group controls">
                    <label>Email Adresi</label>
                    <input type="email" class="form-control" value="{{ old('email') }}" placeholder="Email Adresi" name="email" required>
                    <p class="help-block text-danger"></p>
                </div>
            </div>
            <div class="control-group">
                <div class="form-group col-xs-12 controls">
                    <label>Konu</label>
                    <select class="form-control" name="topic">
                        <option>Bilgi</option>
                        <option>Destek</option>
                        <option>Genel</option>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <div class="form-group controls">
                    <label>Mesaj</label>
                    <textarea rows="5" class="form-control" placeholder="Mesaj" name="message" required></textarea>
                    <p class="help-block text-danger"></p>
                </div>
            </div>
            <br>
            <div id="success"></div>
            <button type="submit" class="btn btn-primary" value="{{ old('message') }}" id="sendMessageButton">Gönder</button>
        </form>
    </div>
    @include('front.widgets.categoryWidget')
    <div class="col-md-1"></div>
@endsection
