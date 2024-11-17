<x-app-layout>
    <div class="py-12 bg-gray-50">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8">
                    @if(isset($blog->image))
                        <img src="{{ asset('storage/' . $blog->image) }}" 
                             alt="{{ $blog->title }}" 
                             class="w-full h-64 object-cover rounded-xl mb-8">
                    @endif
                    
                    <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $blog->title }}</h1>
                    
                    <div class="prose max-w-none">
                        {!! $blog->content !!}
                    </div>

                    <div class="mt-8 pt-4 border-t">
                        <a href="{{ route('blog.index') }}" class="inline-flex items-center text-blue-600 hover:text-blue-800">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                            </svg>
                            Kembali ke Blog
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>