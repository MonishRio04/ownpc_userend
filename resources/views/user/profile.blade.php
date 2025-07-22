@extends('layout.app')

@section('content')
    <button id="goTopBtn" class="fixed bottom-4 sm:bottom-6 right-4 sm:right-6 text-orange-400 text-2xl sm:text-3xl font-bold z-50 hidden">
        <i class="fa-solid fa-arrow-up-from-bracket"></i>
    </button>
    
    <div class="max-w-3xl mx-auto px-4 sm:px-6 py-6 sm:py-10">
        <h2 class="text-2xl sm:text-3xl font-bold mb-6 sm:mb-8 text-center text-gray-800 dark:text-white">Edit Profile</h2>

        <div class="bg-white dark:bg-gray-800 p-4 sm:p-6 md:p-8 rounded-xl sm:rounded-2xl shadow-lg space-y-6 sm:space-y-8 border border-gray-100 dark:border-gray-700">
            @foreach (['name' => 'Full Name', 'email' => 'Email Address', 'phone' => 'Phone Number'] as $field => $label)
                <form method="POST" action="{{ route('user.updateField', $field) }}" class="profile-field" data-field="{{ $field }}">
                    @csrf
                    @method('PUT')
                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-1">{{ $label }}</label>
                    <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 items-center">
                        <div class="relative w-full">
                            <input type="{{ $field == 'email' ? 'email' : 'text' }}" name="value"
                                value="{{ old($field, $user->$field) }}"
                                class="w-full p-2 sm:p-3 pl-8 sm:pl-10 border border-gray-300 dark:border-gray-600 rounded-lg sm:rounded-xl shadow-sm 
                                focus:outline-none focus:ring-2 focus:ring-orange-300 
                                focus:bg-orange-50 dark:bg-gray-900 dark:text-white"
                                placeholder="Enter {{ strtolower($label) }}" disabled>

                            <span class="absolute left-2 sm:left-3 top-2 sm:top-3 text-gray-400">
                                @if ($field == 'name')
                                    <i class="fa-solid fa-user text-sm sm:text-base"></i>
                                @elseif($field == 'email')
                                    <i class="fa-solid fa-envelope text-sm sm:text-base"></i>
                                @else
                                    <i class="fa-solid fa-phone text-sm sm:text-base"></i>
                                @endif
                            </span>
                        </div>
                        <div class="flex gap-2 sm:gap-3 w-full sm:w-auto">
                            <button type="button"
                                class="edit-btn bg-[#0B1D51] text-white font-bold py-1 sm:py-2 px-3 sm:px-4 rounded-lg sm:rounded-xl shadow text-sm sm:text-base w-full sm:w-auto"
                                data-target="{{ $field }}">
                                Edit
                            </button>

                            <button type="submit"
                                class="save-btn bg-orange-500 text-white font-bold py-1 sm:py-2 px-3 sm:px-4 rounded-lg sm:rounded-xl shadow hidden text-sm sm:text-base w-full sm:w-auto"
                                data-target="{{ $field }}">
                                Save
                            </button>
                            <button type="button"
                                class="cancel-btn bg-gray-400 text-white font-bold py-1 sm:py-2 px-3 sm:px-4 rounded-lg sm:rounded-xl shadow hidden text-sm sm:text-base w-full sm:w-auto"
                                data-target="{{ $field }}">
                                Cancel
                            </button>
                        </div>
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