<x-layout>
    <x-slot:header>
        Toate postarile
    </x-slot:header>
    <x-slot:body>
        @foreach ($posts as $post)
            <div class="mt-5 relative w-80 mx-auto px-6 pb-6 pt-4 rounded-2xl border border-coffee-cream bg-coffee-latte text-coffee-cream flex flex-col justify-between shadow-md hover:shadow-lg hover:bg-coffee-dark transition-all duration-300">
                <div>
                    <a href="/posts/{{ $post->id }}" class="block text-sm text-coffee-cream hover:text-coffee-espresso transition-colors">
                        <h1 class="text-red font-bold text-coffee-espresso text-lg tracking-tight text-center mb-2">{{ $post->name }}</h1>
                        {{ Str::limit($post->content, 33, '...') }}
                    </a>
                </div>

                <div class="absolute bottom-3 right-4 text-xs text-coffee-mocha italic">
                    — {{ $post->user->first_name }} {{ $post->user->last_name }}
                </div>
            </div>
        @endforeach
    </x-slot:body>
</x-layout>