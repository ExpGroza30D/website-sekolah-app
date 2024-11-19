@php
    $visionMission = App\Models\VisionMission::where('is_active', true)->first();
@endphp

@if($visionMission)
<section id="visi-misi" class="relative bg-gradient-to-b from-white via-blue-50 to-white py-12 md:py-24 overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 bg-[url('/img/grid.svg')] opacity-10"></div>
    
    <div class="container mx-auto px-4"
         x-data="{
            currentIndex: 0,
            items: [
                { 
                    title: '{{ $visionMission->vision_title }}', 
                    content: '{{ $visionMission->vision_content }}',
                    imgSrc: '{{ Storage::url($visionMission->vision_image) }}'
                },
                { 
                    title: '{{ $visionMission->mission_title }}',
                    content: '{{ $visionMission->mission_content }}',
                    imgSrc: '{{ Storage::url($visionMission->mission_image) }}'
                }
            ]
         }"
         x-cloak>
    
        <!-- Header Section -->
        <div class="text-center mb-8 md:mb-16 relative px-4">
            <!-- Decorative Elements -->
            <div class="absolute inset-0 flex items-center justify-center">
                <div class="w-[300px] md:w-[500px] h-[300px] md:h-[500px] bg-blue-200 rounded-full opacity-10 blur-3xl"></div>
            </div>
            
            <h2 class="text-4xl md:text-6xl font-bold relative z-10 mb-4 md:mb-6 animate-fadeIn">
                <span class="bg-gradient-to-r from-blue-600 via-blue-700 to-blue-800 bg-clip-text text-transparent">
                    Visi & Misi
                </span>
            </h2>
            
            <div class="flex items-center justify-center gap-2 md:gap-3">
                <span class="h-1 w-16 md:w-24 bg-gradient-to-r from-blue-500 to-blue-600 rounded-full"></span>
                <div class="flex space-x-1">
                    <span class="h-1.5 md:h-2 w-1.5 md:w-2 bg-blue-500 rounded-full animate-bounce"></span>
                    <span class="h-1.5 md:h-2 w-1.5 md:w-2 bg-blue-600 rounded-full animate-bounce" style="animation-delay: 0.2s"></span>
                    <span class="h-1.5 md:h-2 w-1.5 md:w-2 bg-blue-700 rounded-full animate-bounce" style="animation-delay: 0.4s"></span>
                </div>
                <span class="h-1 w-16 md:w-24 bg-gradient-to-l from-blue-500 to-blue-600 rounded-full"></span>
            </div>
        </div>

        <div class="flex flex-col lg:flex-row items-center gap-8 md:gap-16 relative">

        <!-- Content Section -->
        <div class="flex flex-col lg:flex-row items-center gap-8 md:gap-16 relative">
            <!-- Image Section - Hidden on mobile when showing MISI -->
            <div class="lg:w-1/2 w-full" x-show="!(currentIndex === 1 && window.innerWidth < 1024)" x-transition>
                <div class="relative rounded-2xl overflow-hidden shadow-2xl group perspective">
                    <div class="relative">
                        <img 
                            :src="items[currentIndex].imgSrc" 
                            class="w-full h-[300px] md:h-[500px] object-cover transform transition-all duration-700 group-hover:scale-110"
                            alt="Education Vision"
                            onerror="this.src='https://i.pinimg.com/736x/a6/f1/ed/a6f1ed77e5f666c4ef0b6901a5cef52a.jpg'"
                        />
                        <!-- Gradient Overlay - Always visible on mobile -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/50 to-transparent opacity-100 lg:opacity-70"></div>
                        <!-- Content Overlay - Always visible on mobile -->
                        <div class="absolute bottom-0 left-0 right-0 p-4 md:p-8 transform lg:translate-y-6 lg:group-hover:translate-y-0 transition-all duration-500">
                            <h4 class="text-2xl md:text-3xl font-bold text-white mb-2" x-text="items[currentIndex].title"></h4>
                            <div class="w-16 md:w-20 h-1 bg-blue-500 rounded-full"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Text Content -->
            <div class="lg:w-1/2 w-full space-y-6 md:space-y-8">
                <div class="space-y-3 md:space-y-4">
                    <h3 
                        class="text-3xl md:text-5xl font-bold text-gray-800 transition-all duration-500 relative pl-6 md:pl-8 animate-fadeIn"
                        x-text="items[currentIndex].title"
                    >
                        <span class="absolute left-0 top-1/2 -translate-y-1/2 w-2 md:w-3 h-8 md:h-12 bg-gradient-to-b from-blue-500 to-blue-700 rounded-full transform transition-transform duration-300 hover:scale-y-110"></span>
                    </h3>
                    <div class="flex gap-2">
                        <span class="h-1 w-24 md:w-32 bg-gradient-to-r from-blue-500 to-blue-600 rounded-full"></span>
                        <span class="h-1 w-3 md:w-4 bg-blue-500 rounded-full animate-pulse"></span>
                    </div>
                </div>

                <p 
                    class="text-base md:text-lg text-gray-600 leading-relaxed whitespace-pre-line transition-all duration-500 prose prose-blue max-w-none animate-fadeIn"
                    x-text="items[currentIndex].content"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 transform translate-y-4"
                    x-transition:enter-end="opacity-100 transform translate-y-0"
                ></p>

                <!-- Navigation -->
                <div class="flex items-center gap-3 md:gap-4 pt-4 md:pt-6">
                    <button 
                        @click="currentIndex = 0"
                        class="flex-1 md:flex-none px-6 md:px-8 py-2.5 md:py-3 rounded-full text-sm font-medium transition-all duration-300 transform hover:scale-105 relative overflow-hidden group"
                        :class="currentIndex === 0 ? 'bg-gradient-to-r from-blue-600 to-blue-700 text-white shadow-lg shadow-blue-500/30' : 'bg-gray-100 text-gray-600 hover:bg-blue-50'"
                    >
                        <span class="relative z-10">VISI</span>
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-400 to-blue-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </button>
                    <button 
                        @click="currentIndex = 1"
                        class="flex-1 md:flex-none px-6 md:px-8 py-2.5 md:py-3 rounded-full text-sm font-medium transition-all duration-300 transform hover:scale-105 relative overflow-hidden group"
                        :class="currentIndex === 1 ? 'bg-gradient-to-r from-blue-600 to-blue-700 text-white shadow-lg shadow-blue-500/30' : 'bg-gray-100 text-gray-600 hover:bg-blue-50'"
                    >
                        <span class="relative z-10">MISI</span>
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-400 to-blue-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </button>
                </div>
             </div>
            </div>
        </div>
    </div>
</section>
@endif