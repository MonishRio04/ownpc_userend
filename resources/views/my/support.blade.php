@extends('layout.app')

@section('content')
<div class="max-w-5xl mx-auto px-4 py-10 space-y-10">

    <!-- Support Info Section -->
    <div class="bg-white p-6 rounded-lg shadow">
        <h1 class="text-3xl font-bold text-indigo-700 mb-6"> Support</h1>

        <p class="text-gray-700 mb-4">
            Need help? Our support team is here for you! You can reach us via the methods below.
        </p>

        <ul class="text-gray-700 space-y-3">
            <li><strong>Email:</strong> <a href="mailto:support@ownpc.com" class="text-blue-600 hover:underline">support@ownpc.com</a></li>
            <li><strong>Phone:</strong> +91-9876543210</li>
            <li><strong>Working Hours:</strong> Mon–Sat, 10 AM to 6 PM</li>
            <li><strong>Live Chat:</strong> Coming Soon</li>
        </ul>

        <p class="text-gray-600 mt-6">We usually respond within 24 hours.</p>
    </div>

    <!-- Contact Form Section -->
    <div class="bg-white p-6 rounded-lg shadow">
        <h2 class="text-3xl font-bold text-indigo-700 mb-6"> Contact Support</h2>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('support.submit') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="name" class="block font-medium text-gray-700">Full Name</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}"
                       class="w-full mt-1 border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                @error('name')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="email" class="block font-medium text-gray-700">Email Address</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}"
                       class="w-full mt-1 border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                @error('email')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="message" class="block font-medium text-gray-700">Your Message</label>
                <textarea id="message" name="message" rows="5"
                          class="w-full mt-1 border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">{{ old('message') }}</textarea>
                @error('message')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <div class="text-right">
                <button type="submit"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded-lg font-medium">
                    Send Message
                </button>
            </div>
        </form>
    </div>

</div>
@endsection
