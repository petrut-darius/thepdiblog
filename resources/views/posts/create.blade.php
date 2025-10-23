<x-layout>
    <x-slot:header>
        <x-title>Create a new post...</x-title>
    </x-slot:header>
    <x-slot:body>
        <form action="/posts" method="POST" class="flex flex-col w-60 mx-auto items-center">
            @csrf
            <x-form.input label="post name" name="name"/>
            <x-form.textarea label="post content" name="content"/>

            <x-form.button>Create the post...</x-form.button>
        </form>
    </x-slot:body>
</x-layout>