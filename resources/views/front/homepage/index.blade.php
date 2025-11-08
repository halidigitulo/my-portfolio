@extends('front.partials.app')
@section('title', 'Homepage')
@section('content')

    @include('front.homepage.hero')
    @include('front.homepage.about')
    @include('front.homepage.skills')
    @include('front.homepage.resume')
    @include('front.homepage.services')
    @include('front.homepage.products')
    @include('front.homepage.portfolio')
    @include('front.homepage.client')
    @include('front.homepage.testimonials')
    @include('front.homepage.faq')
    @include('front.homepage.contact')

@endsection
