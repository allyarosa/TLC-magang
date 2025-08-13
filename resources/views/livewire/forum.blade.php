<div class="container mx-auto p-4">
    <div class="bg-white shadow-md rounded-lg p-6 mb-8">
        <h2 class="text-xl font-bold mb-4">Create a New Thread</h2>
        <form wire:submit.prevent="postThread">
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" id="title" wire:model.defer="title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="What's the topic?">
            </div>
            <div class="mb-4">
                <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
                <textarea id="content" rows="4" wire:model.defer="content" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Start the conversation..."></textarea>
            </div>
            <button type="submit" wire:loading.attr="disabled" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-md">
                Post Thread
            </button>
        </form>
    </div>

    <div class="bg-white shadow-md rounded-lg p-6">
        {{-- <h2 class="text-2xl font-bold mb-4">Threads</h2> --}}
        <div class="threads-container">
            @forelse ($threads as $thread)
            <div class="mb-4 pb-4 border-b border-gray-200">
                <div class="flex justify-between items-center">
                    <h3 class="text-xl font-bold">{{ $thread->title }}</h3>
                    @can('delete', $thread)
                    <button wire:click="deleteThread({{ $thread->id }})" class="text-red-500 hover:text-red-700 text-sm font-bold">Delete</button>
                    @endcan
                </div>
                <p class="text-gray-500 text-end">Posted by {{ $thread->user->name }} on {{ $thread->created_at->format('M d, Y') }}</p>
                <p class="mt-2">{{ $thread->content }}</p>

                <div class="mt-4 flex items-center">
                    @if ($thread->likes->contains('user_id', auth()->id()))
                    <button wire:click="unlikeThread({{ $thread->id }})" class="flex items-center text-sm text-blue-500 hover:text-blue-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.787l.25.125a2 2 0 002.278-.697l3.58-4.596a2 2 0 00.382-1.234V9.5a2 2 0 00-2-2h-2.03a2 2 0 01-1.938-1.522l-.256-.912A2 2 0 009.23 3.5h-1.46a2 2 0 00-1.937 1.522l-.256.912A2 2 0 013.62 7.5H2a.5.5 0 00-.5.5v2.5a.5.5 0 00.5.5h4z" />
                        </svg>
                        <span>Unlike</span>
                    </button>
                    @else
                    <button wire:click="likeThread({{ $thread->id }})" class="flex items-center text-sm text-gray-500 hover:text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                            <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.787l.25.125a2 2 0 002.278-.697l3.58-4.596a2 2 0 00.382-1.234V9.5a2 2 0 00-2-2h-2.03a2 2 0 01-1.938-1.522l-.256-.912A2 2 0 009.23 3.5h-1.46a2 2 0 00-1.937 1.522l-.256.912A2 2 0 013.62 7.5H2a.5.5 0 00-.5.5v2.5a.5.5 0 00.5.5h4z" />
                        </svg>
                        <span>Like</span>
                    </button>
                    @endif
                    <span class="ml-2 text-sm text-gray-500">{{ $thread->likes->count() }} {{ Str::plural('like', $thread->likes->count()) }}</span>
                </div>

                <div class="mt-4">
                    <button wire:click="toggleComments({{ $thread->id }})" class="flex items-center text-sm text-gray-500 hover:text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd" />
                        </svg>
                        <span>{{ count($thread->comments) }} Comments</span>
                    </button>

                    @if ($activeThreadId === $thread->id)
                    <div class="mt-4 space-y-4">
                        @forelse ($thread->comments as $comment)
                        <div class="flex {{ $comment->user_id === auth()->id() ? 'justify-end' : 'justify-start' }}">
                            <div class="w-2/3">
                                <div class="{{ $comment->user_id === auth()->id() ? 'bg-green-100' : 'bg-gray-100' }} rounded-lg p-3">
                                    <div class="flex justify-between items-center">
                                        <p class="text-sm font-semibold">{{ $comment->user->name }}</p>
                                        @can('delete', $comment)
                                        <button wire:click="deleteComment({{ $comment->id }})" class="text-red-500 hover:text-red-700 text-xs font-bold">Delete</button>
                                        @endcan
                                    </div>
                                    <p class="text-sm mt-1">{{ $comment->content }}</p>
                                    <div class="mt-2 flex items-center">
                                        @if ($comment->likes->contains('user_id', auth()->id()))
                                        <button wire:click="unlikeComment({{ $comment->id }})" class="flex items-center text-sm text-blue-500 hover:text-blue-700">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.787l.25.125a2 2 0 002.278-.697l3.58-4.596a2 2 0 00.382-1.234V9.5a2 2 0 00-2-2h-2.03a2 2 0 01-1.938-1.522l-.256-.912A2 2 0 009.23 3.5h-1.46a2 2 0 00-1.937 1.522l-.256.912A2 2 0 013.62 7.5H2a.5.5 0 00-.5.5v2.5a.5.5 0 00.5.5h4z" />
                                            </svg>
                                            <span>Unlike</span>
                                        </button>
                                        @else
                                        <button wire:click="likeComment({{ $comment->id }})" class="flex items-center text-sm text-gray-500 hover:text-gray-700">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.787l.25.125a2 2 0 002.278-.697l3.58-4.596a2 2 0 00.382-1.234V9.5a2 2 0 00-2-2h-2.03a2 2 0 01-1.938-1.522l-.256-.912A2 2 0 009.23 3.5h-1.46a2 2 0 00-1.937 1.522l-.256.912A2 2 0 013.62 7.5H2a.5.5 0 00-.5.5v2.5a.5.5 0 00.5.5h4z" />
                                            </svg>
                                            <span>Like</span>
                                        </button>
                                        @endif
                                        <span class="ml-2 text-xs text-gray-500">{{ $comment->likes->count() }} {{ Str::plural('like', $comment->likes->count()) }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <p class="text-gray-500">No comments yet.</p>
                        @endforelse

                        <form wire:submit.prevent="postComment({{ $thread->id }})" class="mt-4">
                            <div class="mb-2">
                                <textarea wire:model.defer="comment" rows="2" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Add a comment..."></textarea>
                            </div>
                            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-1 px-3 rounded-md text-sm">Post Comment</button>
                        </form>
                    </div>
                    @endif
                </div>
            </div>
            @empty
            <p class="text-gray-500 no-threads-message">No threads yet. Be the first to post!</p>
            @endforelse
        </div>
    </div>
</div>
