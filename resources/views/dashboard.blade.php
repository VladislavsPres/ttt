@extends('layouts.app')

@section('content')
<div class="px-4 sm:px-6 lg:px-8 py-8 bg-gray-100 min-h-screen">
    <h1 class="text-3xl font-bold text-gray-900 mb-6">{{ __('dashboard.title') }}</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="p-5 bg-white rounded-lg shadow flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500">{{ __('dashboard.users') }}</p>
                <p class="text-2xl font-semibold text-gray-800">{{ $usersCount }}</p>
            </div>
            <svg class="w-8 h-8 text-blue-500" ...></svg>
        </div>
        <div class="p-5 bg-white rounded-lg shadow flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500">{{ __('dashboard.photos') }}</p>
                <p class="text-2xl font-semibold text-gray-800">{{ $photosCount }}</p>
            </div>
            <svg class="w-8 h-8 text-pink-500" ...></svg>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-semibold mb-4">{{ __('dashboard.quick_actions') }}</h2>
            <div class="space-y-3">
                @if(auth()->user()->role->name === 'admin')
                    <a href="{{ route('user.create') }}"
                       class="block px-4 py-2 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-lg transition">
                        {{ __('dashboard.add_user') }}
                    </a>
                @endif

                <a href="{{ route('photos.my') }}"
                   class="block px-4 py-2 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-lg transition">
                    {{ __('dashboard.my_photos') }}
                </a>

                <a href="{{ route('galleries.create') }}"
                   class="block px-4 py-2 text-sm font-medium text-white bg-green-600 hover:bg-green-700 rounded-lg transition">
                   {{ __('dashboard.add_gallery') }}
                </a>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-semibold mb-4">{{ __('dashboard.about_title') }}</h2>
            <p class="text-gray-700 text-sm leading-relaxed">
                {{ __('dashboard.about_line1') }}<br>
                {{ __('dashboard.about_line2') }}
            </p>
        </div>
    </div>
</div>
@endsection
