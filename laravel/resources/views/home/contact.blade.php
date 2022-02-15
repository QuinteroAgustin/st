
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('home.contact') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Form contact -->
                    <div class="max-w-2xl mx-auto">
                        <form action="{{ route('sendContact') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="grid xl:grid-cols-2 xl:gap-6">
                                <div class="relative z-0 mb-6 w-full group">
                                    <label for="nom" class="text-xl text-gray-600">{{ __('home.lastname') }}<span class="text-red-500">*</span></label>
                                    <input type="text" name="nom" id="nom" class="border-2 border-gray-300 p-2 w-full">

                                </div>
                                <div class="relative z-0 mb-6 w-full group">
                                    <label for="prenom" class="text-xl text-gray-600">{{ __('home.firstname') }}<span class="text-red-500">*</span></label>
                                    <input type="text" name="prenom" id="prenom" class="border-2 border-gray-300 p-2 w-full">

                                </div>
                            </div>
                            <div class="relative z-0 mb-6 w-full group">
                                <label for="email" class="text-xl text-gray-600">{{ __('home.email') }}<span class="text-red-500">*</span></label>
                                <input type="text" name="email" id="email" class="border-2 border-gray-300 p-2 w-full">

                            </div>
                            <div class="relative z-0 mb-6 w-full group">
                                <label for="tel" class="text-xl text-gray-600">{{ __('home.tel') }}<span class="text-red-500">*</span></label>
                                <input type="text" name="tel" id="tel" class="border-2 border-gray-300 p-2 w-full">

                            </div>
                            <div class="relative z-0 mb-6 w-full group">
                                <label for="adresse" class="text-xl text-gray-600">{{ __('home.adress') }}<span class="text-red-500">*</span></label>
                                <input type="text" name="adresse" id="adresse" class="border-2 border-gray-300 p-2 w-full">

                            </div>
                            <div class="grid xl:grid-cols-2 xl:gap-6">
                                <div class="relative z-0 mb-6 w-full group">
                                    <label for="ville" class="text-xl text-gray-600">{{ __('home.city') }}<span class="text-red-500">*</span></label>
                                    <input type="text" name="ville" id="ville" class="border-2 border-gray-300 p-2 w-full">

                                </div>
                                <div class="relative z-0 mb-6 w-full group">
                                    <label for="cp" class="text-xl text-gray-600">{{ __('home.cp') }}<span class="text-red-500">*</span></label>
                                    <input type="text" name="cp" id="cp" class="border-2 border-gray-300 p-2 w-full">

                                </div>
                            </div>
                            <div class="relative z-0 mb-6 w-full group">
                                <label for="subject" class="text-xl text-gray-600">{{ __('home.subject') }}<span class="text-red-500">*</span></label>
                                <input type="text" name="subject" id="subject" class="border-2 border-gray-300 p-2 w-full">

                            </div>
                            <div class="relative z-0 mb-6 w-full group">
                                <label for="message" class="text-xl text-gray-600">{{ __('home.message') }}<span class="text-red-500">*</span></label>
                                <textarea name="message" id="message" class="border-2 border-gray-500"></textarea>

                            </div>
                            <div class="relative z-0 mb-6 w-full group">
                                <label for="imgs" class="text-xl text-gray-600">{{ __('home.file') }}</label>
                                <input type="file" name="imgs[]" id="imgs" class="border-2 border-gray-300 p-2 w-full" multiple>

                            </div>
                            <div>
                                <input class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="submit" value="{{ __('home.submit') }}">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

    <script>
        CKEDITOR.replace( 'message' );
    </script>
</x-app-layout>
