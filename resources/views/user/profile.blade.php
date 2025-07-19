@extends('layout.app')

@section('content')
    <button id="goTopBtn" class="fixed bottom-6 right-6 text-orange-400 text-3xl font-bold z-50 hidden">
        <i class="fa-solid fa-arrow-up-from-bracket"></i>
    </button>
    <div class="max-w-3xl mx-auto px-6 py-10">
        <h2 class="text-3xl font-bold mb-8 text-center text-gray-800">Edit Profile</h2>

        <div
            class="bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-lg space-y-8 border border-gray-100 dark:border-gray-700">


            @foreach (['name' => 'Full Name', 'email' => 'Email Address', 'phone' => 'Phone Number'] as $field => $label)
                <form method="POST" action="{{ route('user.updateField', $field) }}" class="profile-field"
                    data-field="{{ $field }}">
                    @csrf
                    @method('PUT')
                    <label
                        class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-1">{{ $label }}</label>
                    <div class="flex gap-4 items-center">
                        <div class="relative w-full">
                            <input type="{{ $field == 'email' ? 'email' : 'text' }}" name="value"
                                value="{{ old($field, $user->$field) }}"
                                class="w-full p-3 pl-10 border border-gray-300 dark:border-gray-600 rounded-xl shadow-sm 
                                focus:outline-none focus:ring-2 focus:ring-orange-300 
                                 focus:bg-orange-50 dark:bg-gray-900 dark:text-white"
                                placeholder="Enter {{ strtolower($label) }}" disabled>

                            <span class="absolute left-3 top-3 text-gray-400">
                                @if ($field == 'name')
                                    <i class="fa-solid fa-user"></i>
                                @elseif($field == 'email')
                                    <i class="fa-solid fa-envelope"></i>
                                @else
                                    <i class="fa-solid fa-phone"></i>
                                @endif
                            </span>
                        </div>
                        <button type="button"
                            class="edit-btn bg-[#0B1D51]  text-white font-bold py-2 px-4 rounded-xl shadow"
                            data-target="{{ $field }}">
                            Edit
                        </button>

                        <button type="submit"
                            class="save-btn bg-orange-500  text-white font-bold py-2 px-4 rounded-xl shadow hidden"
                            data-target="{{ $field }}">
                            Save
                        </button>
                        <button type="button"
                            class="cancel-btn bg-gray-400 text-white font-bold py-2 px-4 rounded-xl shadow hidden"
                            data-target="{{ $field }}">
                            Cancel
                        </button>

                    </div>
                </form>
            @endforeach

        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.edit-btn').on('click', function() {
                var field = $(this).data('target');
                var form = $('form[data-field="' + field + '"]');
                var input = form.find('input');

                input.prop('disabled', false).focus();
                form.find('.save-btn, .cancel-btn').removeClass('hidden');
                $(this).addClass('hidden');
            });

            $('.cancel-btn').on('click', function() {
                var field = $(this).data('target');
                var form = $('form[data-field="' + field + '"]');
                var input = form.find('input');

                input.prop('disabled', true);
                form.find('.save-btn, .cancel-btn').addClass('hidden');
                form.find('.edit-btn').removeClass('hidden');
            });

            const goTopBtn = $('#goTopBtn');

            $(window).scroll(function() {
                goTopBtn.toggleClass('hidden', $(window).scrollTop() <= 300);
            });

            goTopBtn.click(function() {
                $('html, body').animate({
                    scrollTop: 0
                }, 'slow');
            });

        });
    </script>
@endpush
