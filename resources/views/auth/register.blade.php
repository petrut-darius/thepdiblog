<x-layout>
    <x-slot:header>
        register file title
    </x-slot:header>
    <x-slot:body>
        
        <form action="/register" method="post" class="flex flex-col w-40 mx-auto items-center">
            @csrf

            <x-form.input label="First name" name="first_name"/>
            <x-form.input label="Last name" name="last_name"/>
            <x-form.input label="Email" name="email" type="email"/>
            <x-form.input label="Password" name="password" type="password"/>
            <x-form.input label="Confirm password" name="password_confirmation" type="password"/>


            <x-form.button >Register...</x-form.button>
        </form>
    </x-slot:body>
</x-layout>