@php
    $currentView = request('view', $viewPreference);
    $currentType = request('type', 'berita');
    $createRoute = $currentType === 'artikel' ? 'cpanel.artikel.create' : 'cpanel.berita.create';
@endphp

@if($currentView === 'grid')
    {{-- Grid View --}}
    <div class="px-6 py-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 relative min-h-105">
        @forelse($posts as $post)
            <div class="bg-white dark:bg-slate-700 border border-gray-300 dark:border-slate-600 overflow-hidden hover:shadow-lg transition-shadow publikasi-grid-item cursor-pointer rounded"
                data-post-id="{{ $post->id }}" data-type="{{ $post->type }}" data-status="{{ $post->status }}"
                data-published="{{ $post->published_at?->timestamp ?? 0 }}"
                data-time="{{ (($post->status === 'published') ? ($post->published_at ?? $post->updated_at ?? $post->created_at) : ($post->updated_at ?? $post->created_at))->timestamp }}"
                data-title="{{ e($post->title) }}">
                {{-- Thumbnail gambar --}}
                @if($post->thumbnail_path)
                    <div class="w-full aspect-video overflow-hidden">
                        <img src="{{ asset('storage/' . $post->thumbnail_path) }}" alt="{{ $post->title }}"
                            class="w-full h-full object-cover">
                    </div>
                @endif
                <div class="p-4">
                    {{-- Badge status dan tipe --}}
                    <div class="flex items-center gap-2 mb-2 flex-wrap">
                        <span
                            class="inline-flex items-center px-2 py-1 text-xs font-semibold rounded-full
                                    {{ $post->type === 'berita' ? 'bg-blue-50 dark:bg-blue-900/30 text-blue-700 dark:text-blue-300' : 'bg-purple-50 dark:bg-purple-900/30 text-purple-700 dark:text-purple-300' }}">
                            {{ ucfirst($post->type) }}
                        </span>
                        <span
                            class="inline-flex items-center px-2 py-1 text-xs font-semibold rounded-full
                                    {{ $post->status === 'published' ? 'bg-green-50 dark:bg-green-900/30 text-green-700 dark:text-green-300' : ($post->status === 'unpublished' ? 'bg-red-50 dark:bg-red-900/30 text-red-700 dark:text-red-300' : 'bg-amber-50 dark:bg-amber-900/30 text-amber-700 dark:text-amber-300') }}">
                            {{ $post->status === 'published' ? 'Publikasi' : ($post->status === 'unpublished' ? 'Nonaktif' : 'Draft') }}
                        </span>
                        @if($post->type === 'berita' && $post->is_featured && $post->status === 'published')
                            <span
                                class="inline-flex items-center px-2 py-1 text-xs font-semibold rounded-full bg-yellow-50 dark:bg-yellow-900/30 text-yellow-700 dark:text-yellow-300">
                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                Highlight
                            </span>
                        @endif
                    </div>
                    <h3 class="font-semibold text-slate-900 dark:text-slate-100 mb-2 line-clamp-2">{{ $post->title }}</h3>
                    @if($post->excerpt)
                        <p class="text-xs text-slate-500 dark:text-slate-400 mb-3 line-clamp-2">{{ $post->excerpt }}</p>
                    @endif
                    <div class="mb-4">
                        @php
                            $displayTime = null;
                            if ($post->status === 'published') {
                                // Prioritaskan published_at jika status published/scheduled
                                // Ini agar waktu yang tampil konsisten dengan jadwal yang diset user
                                $displayTime = $post->published_at ?? $post->updated_at ?? $post->created_at;
                            } else {
                                // Untuk draft/unpublished, tampilkan updated_at
                                $displayTime = $post->updated_at ?? $post->created_at;
                            }
                        @endphp
                        <p class="text-xs text-slate-500 dark:text-slate-400">
                            {{ $displayTime ? $displayTime->translatedFormat('d F Y H:i') : 'Belum dijadwalkan' }}</p>
                    </div>
                    <div class="flex gap-2" data-stop-propagation>
                        @php
                            $isScheduled = $post->status === 'published' && $post->published_at && $post->published_at->isFuture();
                        @endphp
                        @if($isScheduled)
                            <button type="button"
                                class="edit-btn inline-flex items-center justify-center px-3 py-1.5 text-xs font-semibold text-white bg-gray-400 cursor-not-allowed min-w-21 flex-1 rounded"
                                title="Menunggu jadwal terbit" disabled>
                                Ubah
                            </button>
                        @else
                            <a href="{{ route(($post->type === 'artikel' ? 'cpanel.artikel.edit' : 'cpanel.berita.edit'), array_merge(['post' => $post], request()->query())) }}"
                                class="edit-btn inline-flex items-center justify-center px-3 py-1.5 text-xs font-semibold text-white bg-yellow-500 hover:bg-yellow-600 min-w-21 flex-1 rounded"
                                data-post-id="{{ $post->id }}" data-type="{{ $post->type }}" title="Ubah">
                                Ubah
                            </a>
                        @endif
                        <button type="button"
                            class="delete-btn inline-flex items-center justify-center px-3 py-1.5 text-xs font-semibold text-white bg-red-700 hover:bg-red-800 min-w-21 flex-1 rounded"
                            data-delete-trigger
                            data-action="{{ route(($post->type === 'artikel' ? 'cpanel.artikel.destroy' : 'cpanel.berita.destroy'), $post) }}"
                            data-title="{{ e($post->title) }}" data-message="Apakah Anda yakin ingin menghapus konten ini?"
                            title="Hapus">
                            Hapus
                        </button>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full">
                <div class="flex items-center justify-center min-h-105 py-12">
                    <div class="text-center w-full">
                        @if(request('q'))
                            {{-- Jika ada pencarian (q) --}}
                            <div class="flex flex-col items-center justify-center gap-3">
                                <svg class="w-16 h-16 text-gray-400 dark:text-slate-500 mx-auto" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                                <h3 class="text-lg font-semibold text-slate-700 dark:text-slate-300">Hasil Pencarian Tidak Ditemukan
                                </h3>
                                <p class="text-sm text-slate-500 dark:text-slate-400">
                                    Tidak ada konten yang sesuai dengan pencarian "<strong>{{ request('q') }}</strong>"
                                </p>

                            </div>
                        @elseif(request()->hasAny(['type', 'status']) && isset($totalPostsWithoutFilter) && $totalPostsWithoutFilter > 0)
                            <div class="flex flex-col items-center justify-center gap-3">
                                <svg class="w-16 h-16 text-gray-400 dark:text-slate-500 mx-auto" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                    </path>
                                </svg>
                                <h3 class="text-lg font-semibold text-slate-700 dark:text-slate-300">Konten tidak ditemukan</h3>
                                <p class="text-sm text-slate-500 dark:text-slate-400">Data tidak tersedia untuk kriteria yang
                                    dipilih.</p>
                            </div>
                        @else
                            {{-- Jika tidak ada filter sama sekali --}}
                            <div class="flex flex-col items-center justify-center gap-3">
                                <svg class="w-16 h-16 text-gray-400 dark:text-slate-500 mx-auto" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                    </path>
                                </svg>
                                <h3 class="text-lg font-semibold text-slate-700 dark:text-slate-300">Belum Ada Konten</h3>
                                <p class="text-sm text-slate-500 dark:text-slate-400">Mulai dengan menambahkan berita atau artikel
                                    baru</p>
                                <div class="flex items-center justify-center mt-2">
                                    <a href="{{ route($createRoute, request()->query()) }}"
                                        class="inline-flex items-center justify-center px-3 py-1.5 text-base font-semibold text-white bg-green-700 hover:bg-green-800 transition-colors rounded">
                                        <svg class="w-4 h-4 sm:mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 4v16m8-8H4"></path>
                                        </svg>
                                        <span class="hidden sm:inline">Tambah Konten</span>
                                    </a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endforelse
    </div>
@else
    <!-- Table View -->
    <div class="px-6 py-4 overflow-x-auto relative min-h-105">
        <table class="min-w-full border-collapse border border-gray-300 dark:border-slate-600 text-sm">
            <thead class="bg-slate-50 dark:bg-slate-700 text-xs uppercase tracking-wide text-slate-500 dark:text-slate-400">
                <tr>
                    <th class="px-4 py-3 border border-gray-300 dark:border-slate-600 text-center">Judul</th>
                    <th class="px-4 py-3 border border-gray-300 dark:border-slate-600 text-center">Tipe</th>
                    <th class="px-4 py-3 border border-gray-300 dark:border-slate-600 text-center">Status</th>
                    <th class="px-4 py-3 border border-gray-300 dark:border-slate-600 text-center">Waktu</th>
                    <th class="px-4 py-3 border border-gray-300 dark:border-slate-600 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 dark:divide-slate-600">
                @forelse($posts as $post)
                    <tr class="hover:bg-slate-200 dark:hover:bg-slate-700/50 transition-colors publikasi-table-item cursor-pointer"
                        data-post-id="{{ $post->id }}" data-type="{{ $post->type }}" data-status="{{ $post->status }}"
                        data-published="{{ $post->published_at?->timestamp ?? 0 }}"
                        data-time="{{ (($post->status === 'published') ? ($post->published_at ?? $post->updated_at ?? $post->created_at) : ($post->updated_at ?? $post->created_at))->timestamp }}"
                        data-title="{{ e($post->title) }}">
                        <td class="px-4 py-3 border border-gray-300 dark:border-slate-600 text-left">
                            @if($post->type === 'berita' && $post->is_featured && $post->status === 'published')
                                <div class="flex items-center gap-1 mb-1">
                                    <span
                                        class="inline-flex items-center px-2 py-0.5 text-xs font-semibold rounded-full bg-yellow-50 dark:bg-yellow-900/30 text-yellow-700 dark:text-yellow-300"
                                        title="Berita Highlight">
                                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                            </path>
                                        </svg>
                                        Highlight
                                    </span>
                                </div>
                            @endif
                            <div>
                                <p class="font-semibold text-slate-900 dark:text-slate-100 mb-1">{{ $post->title }}</p>
                                <p class="text-xs text-slate-500 dark:text-slate-400 line-clamp-1">{{ $post->excerpt }}</p>
                            </div>
                        </td>
                        <td class="px-4 py-3 border border-gray-300 dark:border-slate-600 text-center">
                            <span
                                class="inline-flex items-center px-2 py-1 text-xs font-semibold rounded-full
                                    {{ $post->type === 'berita' ? 'bg-blue-50 dark:bg-blue-900/30 text-blue-700 dark:text-blue-300' : 'bg-purple-50 dark:bg-purple-900/30 text-purple-700 dark:text-purple-300' }}">
                                {{ ucfirst($post->type) }}
                            </span>
                        </td>
                        <td class="px-4 py-3 border border-gray-300 dark:border-slate-600 text-center">
                            <span
                                class="inline-flex items-center px-2 py-1 text-xs font-semibold rounded-full
                                    {{ $post->status === 'published' ? 'bg-green-50 dark:bg-green-900/30 text-green-700 dark:text-green-300' : ($post->status === 'unpublished' ? 'bg-red-50 dark:bg-red-900/30 text-red-700 dark:text-red-300' : 'bg-amber-50 dark:bg-amber-900/30 text-amber-700 dark:text-amber-300') }}">
                                {{ $post->status === 'published' ? 'Publikasi' : ($post->status === 'unpublished' ? 'Nonaktif' : 'Draft') }}
                            </span>
                        </td>
                        <td
                            class="px-4 py-3 border border-gray-300 dark:border-slate-600 text-slate-600 dark:text-slate-300 text-center">
                            @php
                                $displayTime = null;
                                if ($post->status === 'published') {
                                    // Prioritaskan published_at untuk konsistensi
                                    $displayTime = $post->published_at ?? $post->updated_at ?? $post->created_at;
                                } else {
                                    $displayTime = $post->updated_at ?? $post->created_at;
                                }
                            @endphp
                            {{ $displayTime ? $displayTime->translatedFormat('d F Y H:i') : 'Belum dijadwalkan' }}
                        </td>
                        <td class="px-4 py-3 border border-gray-300 dark:border-slate-600 text-center"
                            data-stop-propagation>
                            @php
                                $isScheduled = $post->status === 'published' && $post->published_at && $post->published_at->isFuture();
                            @endphp
                            <div class="flex flex-col items-center gap-1.5">
                                @if($isScheduled)
                                    <button type="button"
                                        class="edit-btn w-20 text-center px-3 py-1.5 text-xs font-bold text-white bg-gray-400 cursor-not-allowed whitespace-nowrap"
                                        title="Menunggu jadwal terbit" disabled>Ubah</button>
                                @else
                                    <a href="{{ route(($post->type === 'artikel' ? 'cpanel.artikel.edit' : 'cpanel.berita.edit'), array_merge(['post' => $post], request()->query())) }}"
                                        class="edit-btn w-20 text-center px-3 py-1.5 text-xs font-bold text-white bg-yellow-500 hover:bg-yellow-600 whitespace-nowrap rounded"
                                        data-post-id="{{ $post->id }}" data-type="{{ $post->type }}" title="Ubah">Ubah</a>
                                @endif
                                    <button type="button"
                                    class="delete-btn w-20 text-center px-3 py-1.5 text-xs font-bold text-white bg-red-700 hover:bg-red-800 whitespace-nowrap rounded"
                                    data-delete-trigger
                                    data-action="{{ route(($post->type === 'artikel' ? 'cpanel.artikel.destroy' : 'cpanel.berita.destroy'), $post) }}"
                                    data-title="{{ e($post->title) }}"
                                    data-message="Apakah Anda yakin ingin menghapus konten ini?"
                                    title="Hapus">Hapus</button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="p-0">
                            <div class="min-h-105 flex items-center justify-center py-12">
                                <div class="text-center w-full">
                                    @if(request('q'))
                                        <div class="flex flex-col items-center justify-center gap-3">
                                            <svg class="w-16 h-16 text-gray-400 dark:text-slate-500 mx-auto" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                            </svg>
                                            <h3 class="text-lg font-semibold text-slate-700 dark:text-slate-300">Hasil Pencarian
                                                Tidak Ditemukan</h3>
                                            <p class="text-sm text-slate-500 dark:text-slate-400">
                                                Tidak ada konten yang sesuai dengan pencarian "<strong>{{ request('q') }}</strong>"
                                            </p>

                                        </div>
                                    @elseif(request()->hasAny(['type', 'status']) && isset($totalPostsWithoutFilter) && $totalPostsWithoutFilter > 0)
                                        <div class="flex flex-col items-center justify-center gap-3">
                                            <svg class="w-16 h-16 text-gray-400 dark:text-slate-500 mx-auto" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                                </path>
                                            </svg>
                                            <h3 class="text-lg font-semibold text-slate-700 dark:text-slate-300">Konten tidak
                                                ditemukan</h3>
                                            <p class="text-sm text-slate-500 dark:text-slate-400">Data tidak tersedia untuk kriteria
                                                yang dipilih.</p>
                                        </div>
                                    @else
                                        {{-- Jika tidak ada filter sama sekali --}}
                                        <div class="flex flex-col items-center justify-center gap-3">
                                            <svg class="w-16 h-16 text-gray-400 dark:text-slate-500 mx-auto" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                                </path>
                                            </svg>
                                            <h3 class="text-lg font-semibold text-slate-700 dark:text-slate-300">Belum Ada Konten
                                            </h3>
                                            <p class="text-sm text-slate-500 dark:text-slate-400">Mulai dengan menambahkan berita
                                                atau artikel baru</p>
                                            <div class="flex items-center justify-center mt-2">
                                                <a href="{{ route($createRoute, request()->query()) }}"
                                                    class="inline-flex items-center justify-center px-3 py-1.5 text-base font-semibold text-white bg-green-700 hover:bg-green-800 transition-colors rounded">
                                                    <svg class="w-4 h-4 sm:mr-1.5" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M12 4v16m8-8H4"></path>
                                                    </svg>
                                                    <span class="hidden sm:inline">Tambah Konten</span>
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endif

<!-- Pagination -->
@if($posts->hasPages())
    <div class="px-4 py-3 border-t border-gray-100 dark:border-slate-700">
        {{ $posts->links() }}
    </div>
@endif
