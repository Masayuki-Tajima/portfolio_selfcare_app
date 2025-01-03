<x-user-layout>
    <section class="body-font relative text-gray-600">
        <div class="container mx-auto px-5 py-24">
            @if ($errors->any())
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="mb-12 flex w-full flex-col text-center">
                <h1 class="title-font mb-4 text-2xl font-medium text-gray-900 sm:text-3xl">体調サインの新規登録</h1>
                {{-- <p class="mx-auto text-base leading-relaxed lg:w-2/3">Whatever cardigan tote bag tumblr hexagon brooklyn
                    asymmetrical gentrify.</p> --}}
            </div>
            <form action="{{ route('signs.store', ['user_id' => Auth::id()]) }}" method="POST">
                @csrf
                <div class="mx-auto md:w-2/3 lg:w-1/2">
                    <div class="-m-2 flex flex-wrap">
                        <div class="w-1/2 p-2">
                            <div class="relative">
                                <label for="sign_type" class="text-sm leading-7 text-gray-600">サインの種類</label>
                                <select name="sign_type" id="sign_type">
                                    <option value="0">良好サイン</option>
                                    <option value="1">注意サイン</option>
                                    <option value="2">悪化サイン</option>
                                </select>
                                {{-- <input type="text" id="sign_type" name="sign_type"
                                class="w-full rounded border border-gray-300 bg-gray-100 bg-opacity-50 px-3 py-1 text-base leading-8 text-gray-700 outline-none transition-colors duration-200 ease-in-out focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200"> --}}
                            </div>
                        </div>
                        <div class="w-full p-2">
                            <div class="relative">
                                <label for="sign" class="text-sm leading-7 text-gray-600">詳細</label>
                                <textarea id="sign" name="sign"
                                    class="h-32 w-full resize-none rounded border border-gray-300 bg-gray-100 bg-opacity-50 px-3 py-1 text-base leading-6 text-gray-700 outline-none transition-colors duration-200 ease-in-out focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200"></textarea>
                            </div>
                        </div>
                        <div class="w-full p-2">
                            <button
                                class="mx-auto flex rounded border-0 bg-indigo-500 px-8 py-2 text-lg text-white hover:bg-indigo-600 focus:outline-none">登録</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</x-user-layout>
