<form method="post" action="{{ route('password.update') }}" class="space-y-4">
    @csrf
    @method('put')

    <div>
        <label for="current_password" class="uppercase text-xs font-bold">Current Password</label>
        <input id="current_password" name="current_password" type="password"
               class="block w-full border-2 border-black p-2">
    </div>

    <div>
        <label for="password" class="uppercase text-xs font-bold">New Password</label>
        <input id="password" name="password" type="password"
               class="block w-full border-2 border-black p-2">
    </div>

    <div>
        <label for="password_confirmation" class="uppercase text-xs font-bold">Confirm Password</label>
        <input id="password_confirmation" name="password_confirmation" type="password"
               class="block w-full border-2 border-black p-2">
    </div>

    <div>
        <button type="submit"
                class="uppercase px-4 py-2 border-2 border-black hover:bg-black hover:text-white transition">
            Update Password
        </button>
    </div>
</form>
