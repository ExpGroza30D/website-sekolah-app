<x-app-layout>
    <div class="py-12 bg-gradient-to-b from-gray-50 to-white min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Hero Section -->
            <div class="text-center mb-16 animate-fade-in">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Blog & Artikel</h1>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">Informasi terbaru seputar kegiatan dan prestasi sekolah</p>
                
                <!-- Back Button -->
                <a href="{{ route('welcome') }}" 
                   class="inline-flex items-center px-6 py-3 mt-6 bg-blue-600 text-white rounded-full hover:bg-blue-700 transition-all duration-300 transform hover:scale-105 shadow-md hover:shadow-lg group">
                    <svg xmlns="http://www.w3.org/2000/svg" 
                         class="h-5 w-5 mr-2 transform transition-transform group-hover:-translate-x-1" 
                         viewBox="0 0 20 20" 
                         fill="currentColor">
                        <path fill-rule="evenodd" 
                              d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" 
                              clip-rule="evenodd" />
                    </svg>
                    Kembali ke Halaman Utama
                </a>
            </div>

            <!-- Announcements Section -->
            @if($announcements->count() > 0)
                <div class="mb-16">
                    <h2 class="text-3xl font-bold text-gray-900 mb-8 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mr-3 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                        </svg>
                        Pengumuman Terbaru
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach($announcements as $announcement)
                            <div class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                                <div class="p-8">
                                    <div class="flex items-center mb-4">
                                        <div class="h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center mr-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                            </svg>
                                        </div>
                                        <h2 class="text-xl font-bold text-gray-900">{{ $announcement->title }}</h2>
                                    </div>
                                    <p class="text-gray-600 mb-6 line-clamp-3">{{ strip_tags($announcement->content) }}</p>
                                    <a href="{{ route('blog.show', $announcement->id) }}" 
                                       class="inline-flex items-center text-blue-600 hover:text-blue-800 font-medium group">
                                        Baca selengkapnya
                                        <svg xmlns="http://www.w3.org/2000/svg" 
                                             class="h-5 w-5 ml-1 transform transition-transform group-hover:translate-x-1" 
                                             viewBox="0 0 20 20" 
                                             fill="currentColor">
                                            <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Blog Posts Section -->
            <div class="mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mr-3 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                    </svg>
                    Artikel Terbaru
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($blogs as $blog)
                        <div class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                            @if($blog->image)
                                <div class="relative h-48 overflow-hidden">
                                    <img src="{{ asset('storage/' . $blog->image) }}" 
                                         alt="{{ $blog->title }}" 
                                         class="w-full h-full object-cover transform transition-transform duration-500 hover:scale-110">
                                </div>
                            @endif
                            <div class="p-8">
                                <h2 class="text-xl font-bold text-gray-900 mb-4 line-clamp-2">{{ $blog->title }}</h2>
                                <p class="text-gray-600 mb-6 line-clamp-3">{{ strip_tags($blog->content) }}</p>
                                <a href="{{ route('blog.show', $blog->id) }}" 
                                   class="inline-flex items-center text-blue-600 hover:text-blue-800 font-medium group">
                                    Baca selengkapnya
                                    <svg xmlns="http://www.w3.org/2000/svg" 
                                         class="h-5 w-5 ml-1 transform transition-transform group-hover:translate-x-1" 
                                         viewBox="0 0 20 20" 
                                         fill="currentColor">
                                        <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Pagination -->
            <div class="mt-12">
                {{ $blogs->links() }}
            </div>
        </div>
    </div>
</x-app-layout>