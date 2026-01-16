@extends('web.layouts.website')




@section('content')
@include('web.pages.home.sections.banner', ['banners' => $banners ?? collect()])
@include('web.pages.home.sections.info-bar', ['tickerItems' => $tickerItems ?? collect()])
@include('web.pages.home.sections.latest-news', [
'highlightNews' => $highlightNews ?? collect(),
'latestNews' => $latestNews ?? collect(),
'latestArticles' => $latestArticles ?? collect(),
'infoTerkini' => $infoTerkini ?? collect(),
'agendaTerbaru' => $agendaTerbaru ?? collect(),
'prestasiSiswa' => $prestasiSiswa ?? collect(),
'fotoKegiatan' => $fotoKegiatan ?? collect(),
'videoKegiatan' => $videoKegiatan ?? collect(),
'promosiBannerPath' => $promosiBannerPath ?? null,
'schoolProfile' => $schoolProfile ?? null,
])
@endsection
