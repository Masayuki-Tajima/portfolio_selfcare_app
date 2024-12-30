<x-user-layout>
    <section class="body-font text-gray-600">
        <div class="container mx-auto px-5 py-24">
            {{-- メッセージ欄 --}}
            <div class="mb-20 flex w-full flex-col text-center text-red-500">
                @if (session('flash_message'))
                    <p>{{ session('flash_message') }}</p>
                @endif
            </div>
            <div class="mb-20 flex w-full flex-col text-center">
                <h1 class="title-font mb-2 text-3xl font-medium text-gray-900 sm:text-4xl">設定</h1>
                {{-- <p class="mx-auto text-base leading-relaxed lg:w-2/3">Banh mi cornhole echo park skateboard authentic
                    crucifix neutra tilde lyft biodiesel artisan direct trade mumblecore 3 wolf moon twee</p> --}}
            </div>
            {{-- 新規登録ボタン --}}
            <button type="button"
                class="mx-auto flex rounded border-0 bg-indigo-500 px-8 py-2 text-lg text-white hover:bg-indigo-600 focus:outline-none"
                onclick="location.href='{{ route('signs.create', ['user_id' => Auth::id()]) }}' ">体調サインを新規登録</button>
            <div class="mx-auto w-full overflow-auto lg:w-2/3">
                <h2 class="text-2xl">良好サイン</h2>
                <ul>
                    @foreach ($signs as $sign)
                        @if ($sign->sign_type == 0)
                            <li class="px-4 py-3">
                                <p class="inline">{{ $sign->sign }}</p>
                                <form class="inline"
                                    action="{{ route('signs.destroy', ['user_id' => Auth::id(), 'sign_id' => $sign->id]) }}"
                                    method="POST" onsubmit="return confirm('本当に削除してもよろしいですか？');">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        class="rounded border-0 bg-red-500 px-8 py-2 text-lg text-white hover:bg-red-600 focus:outline-none"
                                        type="submit">削除</button>
                                </form>
                            </li>
                        @endif
                    @endforeach
                </ul>
                {{-- <table class="whitespace-no-wrap w-full table-auto text-left">
                    <thead>
                        <tr>
                            <th
                                class="title-font rounded-bl rounded-tl bg-gray-100 px-4 py-3 text-sm font-medium tracking-wider text-gray-900">
                                良好サイン
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach ($signs as $sign)
                                <td class="px-4 py-3">{{ $sign->sign_type == 0 ? $sign->sign : '無' }}</td>
                                <td class="w-10 text-center">
                                    <input name="plan" type="radio">
                                </td>
                            @endforeach
                        </tr>
                    </tbody>
                </table> --}}

                <h2 class="text-2xl">注意サイン</h2>
                <ul>
                    @foreach ($signs as $sign)
                        @if ($sign->sign_type == 1)
                            <li class="px-4 py-3">
                                <p class="inline">{{ $sign->sign }}</p>
                                <form class="inline"
                                    action="{{ route('signs.destroy', ['user_id' => Auth::id(), 'sign_id' => $sign->id]) }}"
                                    method="POST" onsubmit="return confirm('本当に削除してもよろしいですか？');">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        class="rounded border-0 bg-red-500 px-8 py-2 text-lg text-white hover:bg-red-600 focus:outline-none"
                                        type="submit">削除</button>
                                </form>
                            </li>
                        @endif
                    @endforeach
                </ul>

                <h2 class="text-2xl">悪化サイン</h2>
                <ul>
                    @foreach ($signs as $sign)
                        @if ($sign->sign_type == 2)
                            <li class="px-4 py-3">
                                <p class="inline">{{ $sign->sign }}</p>
                                <form class="inline"
                                    action="{{ route('signs.destroy', ['user_id' => Auth::id(), 'sign_id' => $sign->id]) }}"
                                    method="POST" onsubmit="return confirm('本当に削除してもよろしいですか？');">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        class="rounded border-0 bg-red-500 px-8 py-2 text-lg text-white hover:bg-red-600 focus:outline-none"
                                        type="submit">削除</button>
                                </form>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
</x-user-layout>
