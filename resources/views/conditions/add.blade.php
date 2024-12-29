<x-user-layout>
    <section class="body-font relative text-gray-600">
        <div class="container mx-auto px-5 py-24">
            <div class="mb-12 flex w-full flex-col text-center">
                <h1 class="title-font mb-4 text-2xl font-medium text-gray-900 sm:text-3xl">体調の新規登録</h1>
                {{-- <p class="mx-auto text-base leading-relaxed lg:w-2/3">Whatever cardigan tote bag tumblr hexagon brooklyn
                    asymmetrical gentrify.</p> --}}
            </div>
            <div class="mx-auto md:w-2/3 lg:w-1/2">
                <div class="-m-2 flex flex-wrap">
                    <div class="w-full p-2">
                        <div class="relative">
                            <label for="date" class="text-sm leading-7 text-gray-600">日付</label>
                            <input type="date" id="date" name="date"
                                class="w-full rounded border border-gray-300 bg-gray-100 bg-opacity-50 px-3 py-1 text-base leading-8 text-gray-700 outline-none transition-colors duration-200 ease-in-out focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
                        </div>
                    </div>
                    <div class="w-full p-2">
                        <div class="relative">
                            <label for="good_sign" class="text-sm leading-7 text-gray-600">良好サイン</label>
                            <ul class="whitespace-no-wrap w-full text-left">
                                @foreach ($signs as $sign)
                                    <li class="px-4 py-3 text-lg text-gray-900">{{ $sign->sign_type == 0 ? $sign->sign : "無" }}<input name="good_sign" type="checkbox"></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="w-full p-2">
                        <div class="relative">
                            <label for="good_sign" class="text-sm leading-7 text-gray-600">注意サイン</label>
                            <ul class="whitespace-no-wrap w-full text-left">
                                @foreach ($signs as $sign)
                                    <li class="px-4 py-3 text-lg text-gray-900">{{ $sign->sign_type == 1 ? $sign->sign : "無" }}<input name="caution_sign" type="checkbox"></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="w-full p-2">
                        <div class="relative">
                            <label for="good_sign" class="text-sm leading-7 text-gray-600">悪化サイン</label>
                            <ul class="whitespace-no-wrap w-full text-left">
                                @foreach ($signs as $sign)
                                    <li class="px-4 py-3 text-lg text-gray-900">{{ $sign->sign_type == 2 ? $sign->sign : "無" }}<input name="bad_sign" type="checkbox"></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="w-1/3 p-2">
                        <div class="relative">
                            <label for="sleep_time" class="text-sm leading-7 text-gray-600">就寝時刻</label>
                            <input type="datetime-local" id="sleep_time" name="sleep_time"
                                class="w-full rounded border border-gray-300 bg-gray-100 bg-opacity-50 px-3 py-1 text-base leading-8 text-gray-700 outline-none transition-colors duration-200 ease-in-out focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
                        </div>
                    </div>
                    <div class="w-1/3 p-2">
                        <div class="relative">
                            <label for="wakeup_time" class="text-sm leading-7 text-gray-600">起床時刻</label>
                            <input type="datetime-local" id="wakeup_time" name="wakeup_time"
                                class="w-full rounded border border-gray-300 bg-gray-100 bg-opacity-50 px-3 py-1 text-base leading-8 text-gray-700 outline-none transition-colors duration-200 ease-in-out focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
                        </div>
                    </div>
                    <div class="w-1/3 p-2">
                        <div class="relative">
                            睡眠時間：
                        </div>
                    </div>
                    <div class="w-full p-2">
                        <div class="relative">
                            <label for="exercise" class="text-sm leading-7 text-gray-600">運動</label>
                            <input type="text" id="exercise" name="exercise"
                                class="w-full rounded border border-gray-300 bg-gray-100 bg-opacity-50 px-3 py-1 text-base leading-8 text-gray-700 outline-none transition-colors duration-200 ease-in-out focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
                        </div>
                    </div>
                    <div class="w-1/3 p-2">
                        <div class="relative">
                            <label for="breakfast" class="text-sm leading-7 text-gray-600">朝食</label>
                            <input type="text" id="breakfast" name="breakfast"
                                class="w-full rounded border border-gray-300 bg-gray-100 bg-opacity-50 px-3 py-1 text-base leading-8 text-gray-700 outline-none transition-colors duration-200 ease-in-out focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
                        </div>
                    </div>
                    <div class="w-1/3 p-2">
                        <div class="relative">
                            <label for="lunch" class="text-sm leading-7 text-gray-600">昼食</label>
                            <input type="text" id="lunch" name="lunch"
                                class="w-full rounded border border-gray-300 bg-gray-100 bg-opacity-50 px-3 py-1 text-base leading-8 text-gray-700 outline-none transition-colors duration-200 ease-in-out focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
                        </div>
                    </div>
                    <div class="w-1/3 p-2">
                        <div class="relative">
                            <label for="dinner" class="text-sm leading-7 text-gray-600">夕食</label>
                            <input type="text" id="dinner" name="dinner"
                                class="w-full rounded border border-gray-300 bg-gray-100 bg-opacity-50 px-3 py-1 text-base leading-8 text-gray-700 outline-none transition-colors duration-200 ease-in-out focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
                        </div>
                    </div>
                    <div class="w-full p-2">
                        <div class="relative">
                            <label for="comment" class="text-sm leading-7 text-gray-600">コメント</label>
                            <textarea id="comment" name="comment"
                                class="h-32 w-full resize-none rounded border border-gray-300 bg-gray-100 bg-opacity-50 px-3 py-1 text-base leading-6 text-gray-700 outline-none transition-colors duration-200 ease-in-out focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200"></textarea>
                        </div>
                    </div>
                    <div class="w-full p-2">
                        <button
                            class="mx-auto flex rounded border-0 bg-indigo-500 px-8 py-2 text-lg text-white hover:bg-indigo-600 focus:outline-none">登録</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-user-layout>
