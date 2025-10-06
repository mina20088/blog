
<x-card>
    <section class="font-bold text-xl">
        <h1>User Account Information</h1>
    </section>

    <section class="grid xs:grid-cols-1 md:grid-cols-2 md:gap-3">
        <div>
            <x-label for="email" content="Email"/>
            <x-input type="text" id="email" name="email" placeholder="Email" />
        </div>
        <div>
            <x-label for="username" content="Username"/>
            <x-input type="text" id="username" name="username" placeholder="Username" />
        </div>
    </section>
    <section class="grid xs:grid-cols-1 md:grid-cols-2 md:gap-3">
        <div class="xs:col-span-2">
            <x-label for="password" content="Password"/>
            <x-input type="password" id="password" name="password" placeholder="Password" />
        </div>
    </section>

</x-card>
