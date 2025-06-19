@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto p-8 space-y-10">

        <h1 class="text-2xl font-bold uppercase border-b-2 border-black pb-2">Profile Settings</h1>

        <section class="border border-black p-6">
            <h2 class="text-lg font-bold uppercase mb-4">Update Profile</h2>

            <form method="POST" action="{{ route('profile.update') }}" class="space-y-4">
                @csrf
                @method('patch')

                <div>
                    <label class="block font-mono uppercase text-sm">Name</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full border border-black p-2">
                </div>

                <div>
                    <label class="block font-mono uppercase text-sm">Email</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" class="w-full border border-black p-2">
                </div>

                <button class="mt-4 px-4 py-2 border border-black uppercase hover:bg-black hover:text-white transition">Save</button>
            </form>
        </section>

        <section class="border border-black p-6">
            <h2 class="text-lg font-bold uppercase mb-4">Change Password</h2>

            <form method="POST" action="{{ route('profile.updatePassword') }}" class="space-y-4">
                @csrf

                <div>
                    <label class="block font-mono uppercase text-sm">Current Password</label>
                    <input type="password" name="current_password" class="w-full border border-black p-2">
                </div>

                <div>
                    <label class="block font-mono uppercase text-sm">New Password</label>
                    <input type="password" name="password" class="w-full border border-black p-2">
                </div>

                <div>
                    <label class="block font-mono uppercase text-sm">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="w-full border border-black p-2">
                </div>

                <button class="mt-4 px-4 py-2 border border-black uppercase hover:bg-black hover:text-white transition">Update</button>
            </form>
        </section>

        <section class="border border-red-600 p-6">
            <h2 class="text-lg font-bold uppercase mb-4 text-red-600">Delete Account</h2>

            <form method="POST" action="{{ route('profile.destroy') }}" class="space-y-4">
                @csrf
                @method('delete')

                <div>
                    <label class="block font-mono uppercase text-sm text-red-600">Confirm Password</label>
                    <input type="password" name="password" class="w-full border border-red-600 p-2">
                </div>

                <button class="mt-4 px-4 py-2 border border-red-600 text-red-600 uppercase hover:bg-red-600 hover:text-white transition">
                    Delete Account
                </button>
            </form>
        </section>

    </div>
@endsection
