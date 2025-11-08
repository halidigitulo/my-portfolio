@php
    use Illuminate\Support\Str;

    $title = isset($data->judul) ? $data->judul : $title ?? $profile->nama;
    $description = isset($data->isi)
        ? Str::words(strip_tags($data->isi), 25, '...')
        : $profile->tagline ?? 'Portfolio profesional di bidang teknologi dan pengembangan web.';
    $image = isset($data->thumbnail) ? asset('uploads/posts/' . $data->thumbnail) : asset('uploads/' . $profile->logo);
@endphp
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>{{ $title }} - {{ $profile->nama ?? config('app.name') }}</title>

<meta name="description" content="{{ $description }}">
<meta name="keywords"
    content="portfolio, teknologi, web developer, software engineer, IT, {{ strtolower($profile->nama ?? '') }}">
<meta name="author" content="{{ $profile->nama ?? 'Admin' }}">
<meta name="robots" content="index, follow">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="content-language" content="id">

<!-- Canonical -->
<link rel="canonical" href="{{ url()->current() }}">

<!-- Open Graph -->
<meta property="og:title" content="{{ $title }}">
<meta property="og:description" content="{{ $description }}">
<meta property="og:image" content="{{ $image }}">
<meta property="og:image:type" content="image/{{ pathinfo($image, PATHINFO_EXTENSION) }}">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:type" content="{{ isset($data->judul) ? 'article' : 'website' }}">
<meta property="og:site_name" content="{{ $profile->nama ?? config('app.name') }}">
<meta property="og:locale" content="id_ID">

<!-- Twitter Card -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $title }}">
<meta name="twitter:description" content="{{ $description }}">
<meta name="twitter:image" content="{{ $image }}">
<meta name="twitter:site" content="@{{ Str::slug($profile - > nama ?? 'user') }}">

<!-- Theme & App -->
<meta name="theme-color" content="#0d6efd">
<meta name="mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="application-name" content="{{ $profile->nama ?? config('app.name') }}">
<meta name="generator" content="Laravel">
