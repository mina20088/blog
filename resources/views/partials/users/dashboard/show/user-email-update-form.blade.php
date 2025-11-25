<div class="flex xs:flex-col xs:gap-3"
     x-data="{ update:false , hasError: @json(session('errors')) }">
    <div class="flex xs:gap-3 xs:flex-col">
        <h1 class="font-bold">email:</h1>
        <div class="flex xs:gap-3 xs:items-center xs:justify-between">
            <p>{{ $user->email }}</p>
            <x-button @click="update = !update" class="bg-yellow-300 text-white xs:px-2 xs:py-2"
                      :rounded_xl="true" content="edit"/>
        </div>
    </div>
    <template x-if="update || hasError">
        <form method="post"
              action="{{ route('dashboard.users.username.update' , ['user' => $user]) }}"
              class="m-0">
            @method('PATCH')
            @csrf
            <div class="flex gap-3">
                <x-input id="username" type="text" name="username" value="{{ $user->email }}"/>
                <x-button type="submit" class="bg-black text-white xs:px-2 xs:py-2"
                          :rounded_xl="true"
                          content="update"/>
            </div>
        </form>
    </template>
</div>
