<form method="post" action="{{ route('profile.destroy') }}" class="space-y-4">
    @csrf
    @method('delete')

    <div>
        <label for="password" class="uppercase text-xs font-bold text-red-700">Confirm Password</label>
        <input id="password" name="password" type="password"
               class="block w-full border-2 border-red-600 p-2">
    </div>

    <div>
        <button type="submit"
                class="uppercase px-4 py-2 border-2 border-red-600 text-red-600 hover:bg-red-600 hover:text-white transition">
            Delete Account
        </button>
    </div>
</form>
