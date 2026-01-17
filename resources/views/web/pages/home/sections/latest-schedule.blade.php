<!-- Agenda Terbaru -->
<div class="mt-6">
    <div class="p-4">
        <h3 class="text-lg sm:text-xl font-bold text-gray-900 dark:text-slate-100 mb-4 flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6 text-green-700 dark:text-green-500"
                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            Agenda Terbaru
        </h3>
        @php
            $agendaData = isset($agendaTerbaru) && $agendaTerbaru->count() > 0 ? $agendaTerbaru : collect();
        @endphp
        <div class="space-y-3">
            @if($agendaData->count() > 0)
                @foreach($agendaData->take(5) as $item)
                    <div class="pb-3 border-b border-gray-100 dark:border-slate-700 last:border-0 last:pb-0">
                        <a href="{{ route('informasi.agenda.show', $item->id) }}"
                            class="block hover:text-green-700 dark:hover:text-green-400 transition-colors">
                            <div class="flex items-start gap-3">
                                <div
                                    class="shrink-0 bg-green-700 dark:bg-green-600 text-white rounded-lg p-2 text-center min-w-12.5">
                                    <div class="text-xs sm:text-base font-bold">{{ $item->tanggal_mulai->format('d') }}</div>
                                    <div class="text-[10px] sm:text-xs uppercase">{{ $item->tanggal_mulai->format('M') }}</div>
                                </div>
                                <div class="grow">
                                    <h4
                                        class="text-base sm:text-lg font-semibold text-gray-900 dark:text-slate-100 mb-1 line-clamp-2 hover:text-green-700 dark:hover:text-green-400">
                                        {{ $item->judul }}
                                    </h4>
                                    <p
                                        class="text-sm sm:text-base text-gray-600 dark:text-slate-300 line-clamp-2 mb-1 text-justify">
                                        {{ \Illuminate\Support\Str::limit(strip_tags($item->deskripsi), 80, '...') }}
                                    </p>
                                    <p class="text-xs sm:text-sm text-gray-500 dark:text-slate-400">
                                        @if($item->waktu_mulai)
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 inline mr-1" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            @php
                                                $start = \Carbon\Carbon::parse($item->waktu_mulai)->format('H.i');
                                                $endTime = $item->waktu_selesai ? \Carbon\Carbon::parse($item->waktu_selesai)->format('H:i') : null;
                                                $end = ($endTime && $endTime !== '00:00') ? str_replace(':', '.', $endTime) : 'Selesai';
                                                $hasEndTime = $endTime && $endTime !== '00:00';
                                            @endphp
                                            {{ $start }} {{ $hasEndTime ? '– ' . $end . ' WIB' : 'WIB – Selesai' }}
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            @else
                <div class="flex items-center justify-center min-h-50">
                    <p class="text-sm sm:text-xl font-semibold text-gray-400 dark:text-slate-500 text-center">
                        Belum Ada Agenda
                    </p>
                </div>
            @endif
        </div>
        <div class="mt-2 text-center">
            <a href="{{ route('informasi.agenda') }}"
                class="inline-flex items-center gap-1 text-green-700 dark:text-green-500 hover:text-green-800 dark:hover:text-green-400 font-semibold text-xs sm:text-base transition-colors duration-300 group">
                Selengkapnya
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="h-3 w-3 sm:h-4 sm:w-4 group-hover:translate-x-1 transition-transform duration-300"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>
        </div>
    </div>
</div>