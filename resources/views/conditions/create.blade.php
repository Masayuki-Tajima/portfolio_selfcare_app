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
                <h1 class="title-font mb-4 text-2xl font-medium text-gray-900 sm:text-3xl">体調の新規登録</h1>
                {{-- <p class="mx-auto text-base leading-relaxed lg:w-2/3">Whatever cardigan tote bag tumblr hexagon brooklyn
                    asymmetrical gentrify.</p> --}}
            </div>
            <div class="mx-auto md:w-2/3 lg:w-1/2">
                <form action="{{ route('conditions.store', ['user_id' => Auth::id()]) }}" method="POST">
                    @csrf
                    <div class="-m-2 flex flex-wrap">
                        <div class="w-full p-2">
                            <div class="relative">
                                <label for="date" class="text-sm leading-7 text-gray-600">日付</label>
                                    <p>{{ now()->format('Y-m-d') }}</p>
                            </div>
                        </div>
                        <div class="w-full p-2">
                            <div class="relative">
                                <label for="good_sign" class="text-sm leading-7 text-gray-600">良好サイン</label>
                                <ul class="whitespace-no-wrap w-full text-left">
                                    @foreach ($signs as $sign)
                                        @if ($sign->sign_type == 0)
                                            <li class="px-4 py-3 text-lg text-gray-900">{{ $sign->sign }}<input
                                                    name="good_signs[]" value="{{ $sign->id }}" type="checkbox">
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="w-full p-2">
                            <div class="relative">
                                <label for="good_sign" class="text-sm leading-7 text-gray-600">注意サイン</label>
                                <ul class="whitespace-no-wrap w-full text-left">
                                    @foreach ($signs as $sign)
                                        @if ($sign->sign_type == 1)
                                            <li class="px-4 py-3 text-lg text-gray-900">{{ $sign->sign }}<input
                                                    name="caution_signs[]" value="{{ $sign->id }}" type="checkbox">
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="w-full p-2">
                            <div class="relative">
                                <label for="good_sign" class="text-sm leading-7 text-gray-600">悪化サイン</label>
                                <ul class="whitespace-no-wrap w-full text-left">
                                    @foreach ($signs as $sign)
                                        @if ($sign->sign_type == 2)
                                            <li class="px-4 py-3 text-lg text-gray-900">{{ $sign->sign }}<input
                                                    name="bad_signs[]" value="{{ $sign->id }}" type="checkbox"></li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="w-full p-2">
                            <div class="relative">
                                <label for="exercise" class="text-sm leading-7 text-gray-600">天気情報収集地点</label>
                                <select name="area" id="area">
                                    <option value="東京" selected>東京</option>
                                    <option value="大阪">大阪</option>
                                    <option value="名古屋">名古屋</option>
                                    <option value="札幌">札幌</option>
                                    <option value="仙台">仙台</option>
                                    <option value="調布市">調布市</option>
                                    <option value="多摩市">多摩市</option>
                                    <option value="小平市">小平市</option>
                                    <option value="国分寺市">国分寺市</option>
                                    <option value="新潟">新潟</option>
                                    <option value="京都">京都</option>
                                    <option value="広島">広島</option>
                                    <option value="高松">高松</option>
                                    <option value="福岡">福岡</option>
                                </select>
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
                            <button type="submit"
                                class="mx-auto flex rounded border-0 bg-indigo-500 px-8 py-2 text-lg text-white hover:bg-indigo-600 focus:outline-none">登録</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-user-layout>
