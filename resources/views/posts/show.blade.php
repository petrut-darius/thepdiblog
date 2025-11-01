<x-layout>
    <x-slot:header>
        <h1 class="text-3xl font-bold text-coffee-espresso text-center mt-6 tracking-tight">
            {{ $post->name }}
        </h1>
    </x-slot:header>

    <x-slot:body>
        <div class="max-w-3xl mx-auto mt-8 mb-4 bg-coffee-latte text-coffee-espresso p-8 rounded-2xl shadow-md border border-coffee-cream">
            <p class="text-base leading-relaxed whitespace-pre-line">
                {{ $post->content }}
            </p>

            <div class="mt-8 text-right text-sm text-coffee-mocha italic">
                — {{ $post->user->first_name }} {{ $post->user->last_name }}
            </div>

            <div>
                @auth
                    <livewire:post-comment :post="$post" />
                @endauth                    

                <div>
                    <p>Comments:</p>
                    @foreach ($comments as $comment)
                        <p>{{ $comment->content }} - {{ $comment->user->first_name }} {{ $comment->user->last_name }}</p>
                    @endforeach
                </div>
            
            
            </div>

            <div class="mt-10 text-center">
                <a href="/posts" class="inline-block px-6 py-2 rounded-lg bg-coffee-caramel text-coffee-espresso font-semibold hover:bg-coffee-cream transition-all duration-300">
                    ← Back to Posts
                </a>
            </div>
        </div>
        @if(auth()->user() && auth()->user()->isAdmin())
            <div class="text-center">
                <a class="inline-block w-80 bg-coffee-dark rounded py-2 px-6 font-bold mt-2 mb-1" href="/posts/{{ $post->id }}/edit">Edit the post</a><br>
                <x-form.button class="w-80" form="delete_form">Delete the post</x-form.button>
                <form method="POST" id="delete_form" action="/posts/{{ $post->id }}">
                    @csrf
                    @method("DELETE")
                </form>
            </div>
        @endif
    </x-slot:body>
</x-layout>
