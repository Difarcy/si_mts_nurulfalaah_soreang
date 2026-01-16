@extends('web.layouts.website')

@section('title', 'Dokumentasi')

@section('content')
    <div class="container mx-auto px-3 sm:px-4 lg:px-6 xl:px-8 max-w-7xl py-8">
        <x-breadcrumb :items="[
            ['label' => 'Beranda', 'url' => route('web.home')],
            ['label' => 'Galeri', 'url' => route('galeri')],
            ['label' => 'Dokumentasi Acara']
        ]" />
        <x-page-title title="Dokumentasi Acara" />
    </div>
@endsection
