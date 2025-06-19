<form method="post" action="{{ route('profile.update') }}" class="space-y-4" novalidate>
    @csrf
    @method('patch')

    <div>
        <label for="name" class="uppercase text-xs font-bold">Name</label>
        <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}"
               class="block w-full border-2 border-black p-2">
    </div>

    <div>
        <label for="email" class="uppercase text-xs font-bold">Email</label>
        <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}"
               class="block w-full border-2 border-black p-2">
    </div>

    <div>
        <button type="submit"
                class="uppercase px-4 py-2 border-2 border-black hover:bg-black hover:text-white transition">
            Save Changes
        </button>
    </div>
</form>
