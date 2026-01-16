@extends('web.layouts.website')

@section('title', 'Sejarah')

@section('content')
    <div class="container mx-auto px-3 sm:px-4 lg:px-6 xl:px-8 max-w-7xl py-8">
        <x-breadcrumb :items="[
            ['label' => 'Beranda', 'url' => route('web.home')],
            ['label' => 'Profil', 'url' => route('profil')],
            ['label' => 'Sejarah Sekolah']
        ]" />
        <x-page-title title="Sejarah Sekolah" />

        <div class="mt-6">
            <div class="prose prose-base max-w-none dark:prose-invert text-black dark:text-slate-100">
                @if($schoolProfile && $schoolProfile->sejarah)
                    {!! $schoolProfile->sejarah !!}
                @else
                    <div
                        class="w-full py-12 flex items-center justify-center bg-gray-50 dark:bg-slate-800/50 border border-dashed border-gray-200 dark:border-slate-700">
                        <p class="text-gray-500 dark:text-slate-400 italic text-center mb-0">
                            Belum ada sejarah sekolah.
                        </p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
