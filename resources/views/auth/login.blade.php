<x-layout>
    <x-slot:header>
        login file title
    </x-slot:header>
    <x-slot:body>
        <form action="/login" method="post" class="flex flex-col w-40 mx-auto items-center">
            @csrf
            <x-form.input label="Email" name="email" type="email"/>
            <x-form.input label="Password" name="password" type="password"/>

            <x-form.button>Log in...</x-form.button>
        </form>
    </x-slot:body>
</x-layout>