<x-user-layout>
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-wrap w-full mb-20 flex-col items-center text-center">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">ユーザートップ</h1>
                <p class="lg:w-1/2 w-full leading-relaxed text-red-400">※初めてお使いの場合は事前に「設定」から体調サインの登録を行ってください</p>
            </div>
            <div class="flex flex-wrap -m-4">
                <div class="xl:w-1/3 p-4 w-full">
                    <div class="border border-gray-200 p-6 rounded-lg">
                        <div class="w-10 h-10 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-4">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-6 h-6" viewBox="0 0 24 24">
                                <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                            </svg>
                        </div>
                        <a href="{{ route('conditions.create', ['user_id' => Auth::id()]) }}" class="block text-lg text-gray-900 font-medium title-font mb-2">体調を新規登録</a>
                        {{-- <p class="leading-relaxed text-base">Fingerstache flexitarian street art 8-bit waist co, subway tile poke farm.</p> --}}
                    </div>
                </div>
                <div class="xl:w-1/3 p-4 w-full">
                    <div class="border border-gray-200 p-6 rounded-lg">
                        <div class="w-10 h-10 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-4">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-6 h-6" viewBox="0 0 24 24">
                                <circle cx="6" cy="6" r="3"></circle>
                                <circle cx="6" cy="18" r="3"></circle>
                                <path d="M20 4L8.12 15.88M14.47 14.48L20 20M8.12 8.12L12 12"></path>
                            </svg>
                        </div>
                        <a href="{{ route('conditions.index', ['user_id' => Auth::id()]) }}" class="block text-lg text-gray-900 font-medium title-font mb-2">過去の記録一覧</a>
                        {{-- <p class="leading-relaxed text-base">Fingerstache flexitarian street art 8-bit waist co, subway tile poke farm.</p> --}}
                    </div>
                </div>
                <div class="xl:w-1/3 p-4 w-full">
                    <div class="border border-gray-200 p-6 rounded-lg">
                        <div class="w-10 h-10 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-4">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-6 h-6" viewBox="0 0 24 24">
                                <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                        </div>
                        <a href="{{route('signs.index', ['user_id' => Auth::id()])}}" class="block text-lg text-gray-900 font-medium title-font mb-2">設定</a>
                        {{-- <p class="leading-relaxed text-base">Fingerstache flexitarian street art 8-bit waist co, subway tile poke farm.</p> --}}
                    </div>
                </div>
            </div>
            {{-- <button class="flex mx-auto mt-16 text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Button</button> --}}
        </div>
    </section>
</x-user-layout>
