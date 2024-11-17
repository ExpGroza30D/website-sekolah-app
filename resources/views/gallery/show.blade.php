<x-app-layout>
    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8">
                    <!-- Image Section -->
                    <div class="relative aspect-video mb-8 rounded-xl overflow-hidden shadow-lg group">
                        <img 
                            src="{{ asset('storage/' . $gallery->image) }}" 
                            alt="{{ $gallery->title }}" 
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                        >
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>

                    <!-- Content Section -->
                    <div class="max-w-4xl mx-auto">
                        <h1 class="text-3xl md:text-4xl font-bold mb-4 text-gray-900">{{ $gallery->title }}</h1>
                        <div class="prose max-w-none mb-12 text-gray-700">
                            {!! $gallery->content !!}
                        </div>

                        <!-- Back Button (Moved here) -->
                        <div class="mb-12 border-t pt-8">
                            <a href="{{ route('gallery.index') }}" 
                               class="inline-flex items-center px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors group">
                                <svg xmlns="http://www.w3.org/2000/svg" 
                                     class="h-5 w-5 mr-2 transform transition-transform group-hover:-translate-x-1" 
                                     viewBox="0 0 20 20" 
                                     fill="currentColor">
                                    <path fill-rule="evenodd" 
                                          d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" 
                                          clip-rule="evenodd" />
                                </svg>
                                <span>Back to Gallery</span>
                            </a>
                        </div>

                        <!-- Comments Section -->
                        <div x-data="{ 
                            comments: {{ Js::from($gallery->comments) }},
                            newComment: '',
                            name: '',
                            isSubmitting: false,
                            async addComment() {
                                if (this.isSubmitting) return;
                                this.isSubmitting = true;
                                
                                try {
                                    const response = await fetch('/api/gallery/{{ $gallery->id }}/comment', {
                                        method: 'POST',
                                        headers: {
                                            'Content-Type': 'application/json',
                                            'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
                                        },
                                        body: JSON.stringify({
                                            name: this.name,
                                            comment: this.newComment
                                        })
                                    });
                                    const data = await response.json();
                                    this.comments.unshift(data);
                                    this.newComment = '';
                                    this.name = '';
                                } catch (error) {
                                    console.error('Error adding comment:', error);
                                } finally {
                                    this.isSubmitting = false;
                                }
                            }
                        }">
                            <h2 class="text-2xl font-semibold mb-6 text-gray-900 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                                </svg>
                                Comments
                                <span class="text-sm font-normal text-gray-500" x-text="'(' + comments.length + ')'"></span>
                            </h2>
                            
                            <!-- Comment Form -->
                            <form @submit.prevent="addComment" class="mb-8 bg-gray-50 p-6 rounded-xl shadow-sm hover:shadow-md transition-shadow duration-300">
                                <div class="mb-4">
                                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Name (optional)</label>
                                    <input 
                                        id="name"
                                        type="text" 
                                        x-model="name" 
                                        placeholder="Enter your name" 
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                    >
                                </div>
                                <div class="mb-4">
                                    <label for="comment" class="block text-sm font-medium text-gray-700 mb-1">Comment</label>
                                    <textarea 
                                        id="comment"
                                        x-model="newComment" 
                                        placeholder="Share your thoughts..." 
                                        rows="4"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                        required
                                    ></textarea>
                                </div>
                                <button 
                                    type="submit" 
                                    class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors disabled:opacity-50 disabled:cursor-not-allowed flex items-center gap-2"
                                    :disabled="isSubmitting"
                                >
                                    <span x-show="!isSubmitting">Post Comment</span>
                                    <span x-show="isSubmitting">
                                        <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                        </svg>
                                        Posting...
                                    </span>
                                </button>
                            </form>

                            <!-- Comments List -->
                            <div class="space-y-4">
                                <template x-for="comment in comments" :key="comment.id">
                                    <div class="bg-gray-50 p-6 rounded-xl shadow-sm hover:shadow-md transition-all duration-300 hover:bg-gray-100">
                                        <div class="flex items-center gap-3 mb-3">
                                            <div class="h-10 w-10 rounded-full bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center text-white shadow-inner">
                                                <span class="font-semibold" x-text="comment.name.charAt(0).toUpperCase()"></span>
                                            </div>
                                            <div>
                                                <span class="font-semibold text-gray-900" x-text="comment.name || 'Anonymous'"></span>
                                                <p class="text-sm text-gray-500" x-text="new Date(comment.created_at).toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' })"></p>
                                            </div>
                                        </div>
                                        <p class="text-gray-700 pl-13" x-text="comment.comment"></p>
                                    </div>
                                </template>
                                
                                <!-- No Comments Message -->
                                <div x-show="comments.length === 0" class="text-center py-12 bg-gray-50 rounded-xl">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                    </svg>
                                    <p class="text-gray-500 font-medium">No comments yet.</p>
                                    <p class="text-gray-400 text-sm">Be the first to share your thoughts!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>