<!-- Footer -->
<footer class="bg-gradient-to-b from-blue-900 to-blue-950 text-white py-16">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-12">
            <!-- Announcements -->
            <div class="space-y-6">
                <h3 class="text-xl font-bold border-b-2 border-blue-700 pb-2">Pengumuman Terbaru</h3>
                <ul class="space-y-4">
                    @foreach(\App\Models\Announcement::where('is_active', true)->latest()->take(3)->get() as $announcement)
                        <li>
                            <a href="{{ route('blog.show', $announcement) }}" 
                               class="flex items-center space-x-2 group">
                                <i class="fas fa-chevron-right text-blue-400 group-hover:translate-x-1 transition-transform"></i>
                                <span class="text-gray-300 group-hover:text-white transition-colors duration-300">
                                    {{ $announcement->title }}
                                </span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- School Info -->
            <div class="space-y-6">
                <h3 class="text-xl font-bold border-b-2 border-blue-700 pb-2">Info Sekolah</h3>
                <address class="not-italic space-y-2 text-gray-300">
                    <p class="flex items-center gap-2">
                        <i class="fas fa-school text-blue-400"></i>
                        SMA 2 PSKD
                    </p>
                    <p class="flex items-center gap-2">
                        <i class="fas fa-map-marker-alt text-blue-400"></i>
                        Jl. Slamet Riyadi Kb. Manggis, Matraman, Kota Jakarta Timur
                    </p>
                    <p class="flex items-center gap-2">
                        <i class="fas fa-phone text-blue-400"></i>
                        (021) 8580342
                    </p>
                </address>
            </div>

            <!-- Quick Links -->
            <div class="space-y-6">
                <h3 class="text-xl font-bold border-b-2 border-blue-700 pb-2">Link Terkait</h3>
                <ul class="space-y-3">
                    <li>
                        <a href="{{ route('blog.index') }}" class="text-gray-300 hover:text-white transition-colors duration-300 flex items-center gap-2 group">
                            <i class="fas fa-angle-right text-blue-400 group-hover:translate-x-1 transition-transform"></i>
                            Blog & Artikel
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('curriculum') }}" class="text-gray-300 hover:text-white transition-colors duration-300 flex items-center gap-2 group">
                            <i class="fas fa-angle-right text-blue-400 group-hover:translate-x-1 transition-transform"></i>
                            Kurikulum
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('achievements') }}" class="text-gray-300 hover:text-white transition-colors duration-300 flex items-center gap-2 group">
                            <i class="fas fa-angle-right text-blue-400 group-hover:translate-x-1 transition-transform"></i>
                            Prestasi
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('contact') }}" class="text-gray-300 hover:text-white transition-colors duration-300 flex items-center gap-2 group">
                            <i class="fas fa-angle-right text-blue-400 group-hover:translate-x-1 transition-transform"></i>
                            Hubungi Kami
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Social Media -->
            <div class="space-y-6">
                <h3 class="text-xl font-bold border-b-2 border-blue-700 pb-2">Media Sosial</h3>
                <div class="grid grid-cols-2 gap-4">
                    @foreach([
                        ['Facebook', 'fab fa-facebook-f', '#'],
                        ['Twitter', 'fab fa-twitter', '#'],
                        ['Instagram', 'fab fa-instagram', '#'],
                        ['YouTube', 'fab fa-youtube', '#']
                    ] as [$name, $icon, $link])
                        <a href="{{ $link }}" 
                           class="flex items-center gap-2 text-gray-300 hover:text-white transition-colors duration-300 group">
                            <i class="{{ $icon }} text-blue-400 group-hover:scale-110 transition-transform"></i>
                            {{ $name }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Copyright -->
        <div class="mt-12 pt-8 border-t border-blue-800/50 text-center text-gray-400">
            <p>&copy; {{ date('Y') }} SMA 2 PSKD. All rights reserved.</p>
        </div>
    </div>
</footer>