@extends('web.layouts.website')

@section('title', 'Agenda')

@section('content')
    <div class="container mx-auto px-3 sm:px-4 lg:px-6 xl:px-8 max-w-7xl py-8 sm:py-12">
        <x-breadcrumb :items="[
            ['label' => 'Informasi'],
            ['label' => 'Agenda']
        ]" />
        <x-page-title title="Agenda" />

        @php
            $now = \Carbon\Carbon::now();
            $selectedMonth = request()->get('cal_month', $now->month);
            $selectedYear = request()->get('cal_year', $now->year);

            // Validate month and year
            $selectedMonth = max(1, min(12, (int) $selectedMonth));
            $selectedYear = max(2000, min(2100, (int) $selectedYear));

            $firstDay = \Carbon\Carbon::create($selectedYear, $selectedMonth, 1);
            $lastDay = $firstDay->copy()->endOfMonth();
            $startDate = $firstDay->copy()->startOfWeek(\Carbon\CarbonInterface::SUNDAY);
            $endDate = $lastDay->copy()->endOfWeek(\Carbon\CarbonInterface::SATURDAY);

            $months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
            $days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            $daysShort = ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'];

            // Calculate prev/next month
            $prevMonth = $selectedMonth - 1;
            $prevYear = $selectedYear;
            if ($prevMonth < 1) {
                $prevMonth = 12;
                $prevYear--;
            }
            $nextMonth = $selectedMonth + 1;
            $nextYear = $selectedYear;
            if ($nextMonth > 12) {
                $nextMonth = 1;
                $nextYear++;
            }
        @endphp

        <div class="flex flex-col lg:flex-row gap-4 lg:gap-4 mt-8">
            <!-- Kiri: Agenda (70%) -->
            <div class="w-full lg:w-[70%]">
                <form method="GET" class="mb-6" id="schedule-search-form">
                    <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari agenda..." autocomplete="off"
                        class="w-full px-4 py-2 sm:py-2.5 border-2 border-gray-300 dark:border-slate-600 rounded-lg focus:border-green-700 focus:outline-none text-sm sm:text-base bg-white dark:bg-slate-800 text-gray-900 dark:text-slate-100">
                </form>

                <div id="schedule-list">
                    @if($agendas->count() > 0)
                        <div class="space-y-6">
                            @foreach($agendas as $item)
                                <div
                                    class="bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300">
                                    <div class="flex flex-col md:flex-row">
                                        <!-- Konten -->
                                        <div class="w-full p-5 sm:p-6">
                                            <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-4 mb-3">
                                                <h3 class="text-base sm:text-xl font-bold text-gray-900 dark:text-slate-100">
                                                    <a href="{{ route('informasi.agenda.show', $item->id) }}"
                                                        class="hover:text-green-700 dark:hover:text-green-400 transition-colors">
                                                        {{ $item->judul }}
                                                    </a>
                                                </h3>
                                                <div class="shrink-0">
                                                    <span
                                                        class="inline-block px-3 py-1 bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-400 text-[10px] sm:text-sm font-semibold rounded">
                                                        {{ $item->tanggal_mulai?->translatedFormat('d F Y') }}
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="space-y-2 mb-4">
                                                @if($item->waktu_mulai || $item->waktu_selesai)
                                                    <div
                                                        class="flex items-start gap-2 text-xs sm:text-sm text-gray-600 dark:text-slate-400">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="h-4 w-4 sm:h-5 sm:w-5 text-green-700 dark:text-green-400 shrink-0 mt-0.5"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                        </svg>
                                                        <span class="font-medium">Waktu:</span>
                                                        <span>
                                                            @php
                                                                $start = \Carbon\Carbon::parse($item->waktu_mulai)->format('H.i');
                                                                $endTime = $item->waktu_selesai ? \Carbon\Carbon::parse($item->waktu_selesai)->format('H:i') : null;
                                                                $end = ($endTime && $endTime !== '00:00') ? str_replace(':', '.', $endTime) : 'Selesai';
                                                                $hasEndTime = $endTime && $endTime !== '00:00';
                                                            @endphp
                                                            {{ $start }} {{ $hasEndTime ? '– ' . $end . ' WIB' : 'WIB – Selesai' }}
                                                        </span>
                                                    </div>
                                                @endif
                                                @if($item->lokasi)
                                                    <div
                                                        class="flex items-start gap-2 text-xs sm:text-sm text-gray-600 dark:text-slate-400">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="h-4 w-4 sm:h-5 sm:w-5 text-green-700 dark:text-green-400 shrink-0 mt-0.5"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        </svg>
                                                        <span class="font-medium">Lokasi:</span>
                                                        <span>{{ $item->lokasi }}</span>
                                                    </div>
                                                @endif
                                            </div>

                                            @if($item->deskripsi)
                                                <div
                                                    class="text-xs sm:text-base text-gray-700 dark:text-slate-300 leading-relaxed text-justify line-clamp-3">
                                                    {{ strip_tags($item->deskripsi) }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="mt-6">
                            {{ $agendas->links() }}
                        </div>
                    @else
                        <div
                            class="bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded-lg p-12 text-center">
                            @if(request('q'))
                                <p class="text-sm sm:text-lg font-semibold text-slate-700 dark:text-slate-300 mb-2">Hasil Pencarian
                                    Tidak
                                    Ditemukan
                                </p>
                                <p class="text-xs sm:text-base text-slate-500 dark:text-slate-400">Tidak ada agenda yang sesuai
                                    dengan pencarian
                                    "<strong>{{ request('q') }}</strong>"</p>
                            @else
                                <p class="text-sm sm:text-lg text-gray-500 dark:text-slate-400">Belum ada agenda</p>
                            @endif

                        </div>
                    @endif
                </div>
            </div>
            <!-- Kanan: Sidebar (30%) -->
            <div class="w-full lg:w-[30%] lg:-mt-4">
                @php
                    ob_start();
                @endphp
                <!-- Premium Calendar Widget Design -->
                <div class="p-4">
                    <h3 class="text-lg sm:text-xl font-bold text-gray-900 dark:text-slate-100 mb-4 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-700 dark:text-green-500"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        Kalender
                    </h3>
                    <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-md border border-gray-100 dark:border-slate-700 overflow-hidden p-1"
                        data-calendar-init="true" data-selected-month="{{ $selectedMonth }}"
                        data-selected-year="{{ $selectedYear }}" data-now-year="{{ $now->year }}"
                        data-now-month="{{ $now->month }}" data-now-day="{{ $now->day }}">

                        <!-- Minimalist Header -->
                        <div id="calendar-header"
                            class="px-4 py-4 flex items-center justify-between border-b border-gray-100 dark:border-slate-700/50 mb-2">
                            <button type="button" data-calendar-action="prev"
                                class="p-2 text-gray-400 hover:text-green-700 dark:hover:text-green-400 hover:bg-green-50 dark:hover:bg-green-900/20 rounded-xl transition-all duration-200 focus:outline-none group"
                                aria-label="Bulan Sebelumnya">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-5 w-5 transform group-hover:-translate-x-0.5 transition-transform" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                        d="M15 19l-7-7 7-7" />
                                </svg>
                            </button>

                            <h4 id="calendar-title"
                                class="text-lg font-extrabold text-gray-800 dark:text-slate-100 uppercase tracking-tight">
                                {{ $months[$selectedMonth - 1] }} <span
                                    class="text-green-700 dark:text-green-500 font-normal ml-1">{{ $selectedYear }}</span>
                            </h4>

                            <button type="button" data-calendar-action="next"
                                class="p-2 text-gray-400 hover:text-green-700 dark:hover:text-green-400 hover:bg-green-50 dark:hover:bg-green-900/20 rounded-xl transition-all duration-200 focus:outline-none group"
                                aria-label="Bulan Selanjutnya">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-5 w-5 transform group-hover:translate-x-0.5 transition-transform" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </button>
                        </div>

                        <div class="p-3">
                            <!-- Day Names -->
                            <div id="calendar-grid" class="grid grid-cols-7 mb-3">
                                @foreach($daysShort as $day)
                                    <div class="aspect-square p-0.5 flex items-center justify-center">
                                        <span
                                            class="text-base font-bold text-gray-400 dark:text-slate-500 uppercase tracking-widest">{{ $day }}</span>
                                    </div>
                                @endforeach

                                <div class="col-span-7 h-px bg-gray-100 dark:bg-slate-700 my-2"></div>

                                @php
                                    $currentDateCalendar = $startDate->copy();
                                @endphp
                                @while($currentDateCalendar <= $endDate)
                                    @php
                                        $isCurrentMonth = $currentDateCalendar->month == $selectedMonth;
                                        $isToday = $currentDateCalendar->isToday() && $currentDateCalendar->month == $now->month && $currentDateCalendar->year == $now->year;
                                        $isSunday = $currentDateCalendar->dayOfWeek == 0;
                                    @endphp
                                    <div class="aspect-square p-0.5">
                                        <div
                                            class="w-full h-full flex items-center justify-center text-base font-medium rounded-lg transition-all duration-300 cursor-pointer
                                                                {{ $isCurrentMonth ? ($isSunday ? 'text-red-500 font-medium' : 'text-gray-700 dark:text-slate-300') : 'text-gray-300 dark:text-slate-600' }}
                                                                {{ $isToday ? '!bg-gradient-to-br !from-green-600 !to-green-700 !text-white !font-bold shadow-lg shadow-green-200 dark:shadow-none scale-105' : '!hover:bg-green-200 dark:hover:bg-green-900/40 !hover:text-green-900 dark:hover:!text-green-200 !hover:font-semibold' }}">
                                            {{ $currentDateCalendar->day }}
                                        </div>
                                    </div>
                                    @php
                                        $currentDateCalendar->addDay();
                                    @endphp
                                @endwhile
                            </div>
                        </div>
                    </div>
                </div>
                @php
                    $calendarHtml = ob_get_clean();
                @endphp

                @include('web.components.post-sidebar', [
                    'articles' => [],
                    'announcements' => $infoTerkini ?? [],
                    'announcementFirst' => true,
                    'agenda' => null,
                    'calendar' => $calendarHtml,
                    'calendarOrder' => '4',
                    'showSocialMedia' => false,
                    'socialMediaFirst' => false,
                    'schoolProfile' => null
                ])
                </div>
            </div>
        </div>
@endsection
