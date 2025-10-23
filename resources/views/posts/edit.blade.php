<x-layout>
    <x-slot:header>
        <x-title>Edit {{ $post->name }}</x-title>
    </x-slot:header>

    <x-slot:body>
        <form action="/posts/{{ $post->id }}" method="POST" class="flex flex-col w-full max-w-3xl mx-auto items-center mt-6">
            @csrf
            @method("PATCH")

            <x-form.textarea label="Post Content" name="content" :value="$post->content"/>

            <x-form.button>Save changes</x-form.button>
        </form>
    </x-slot:body>
</x-layout>
