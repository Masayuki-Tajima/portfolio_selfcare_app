<x-user-layout>
    <section class="body-font text-gray-600">
        <div class="container mx-auto px-5 py-24">
            {{-- フラッシュメッセージ --}}
            <div class="mb-4 flex w-full flex-col text-left text-red-500">
                @if (session('flash_message'))
                    <p>{{ session('flash_message') }}</p>
                @endif
            </div>

            {{-- chatGPTによる返信コメント --}}
            @if (session('responseMessage'))
                <div class="mb-8 h-24 flex w-full flex-col text-left text-black border bg-white">
                        <h2>chatGPTからのコメント</h2>
                        <p>{{ session('responseMessage') }}</p>
                </div>
            @endif

            <div class="mb-20 flex w-full flex-col text-center">
                <h1 class="title-font mb-2 text-3xl font-medium text-gray-900 sm:text-4xl">過去の体調の記録</h1>
            </div>

            {{-- 検索フォーム --}}
            <form action="{{ route('conditions.index', ['user_id' => Auth::id()]) }}" method="GET">
                @csrf
                <div class="mx-auto p-4 w-full overflow-auto lg:w-2/3 mb-12 bg-white rounded">
                    <details class="group mt-0 cursor-pointer open:hover:bg-transparent open:cursor-auto open:opacity-100">
                        <summary class="text-black">絞り込み検索</summary>

                        {{-- 体調サイン --}}
                        <h2 class="text-2xl">良好サイン</h2>
                        <ul>
                            @foreach ($allSigns as $sign)
                                @if ($sign->sign_type == 0)
                                    <li class="px-4 py-3 text-lg text-gray-900">
                                        <input name="good_signs[]" value="{{ $sign->id }}"
                                            type="checkbox">{{ $sign->sign }}
                                    </li>
                                @endif
                            @endforeach
                        </ul>

                        <h2 class="text-2xl">注意サイン</h2>
                        <ul>
                            @foreach ($allSigns as $sign)
                                @if ($sign->sign_type == 1)
                                    <li class="px-4 py-3 text-lg text-gray-900">
                                        <input name="caution_signs[]" value="{{ $sign->id }}"
                                            type="checkbox">{{ $sign->sign }}
                                    </li>
                                @endif
                            @endforeach
                        </ul>

                        <h2 class="text-2xl">悪化サイン</h2>
                        <ul>
                            @foreach ($allSigns as $sign)
                                @if ($sign->sign_type == 2)
                                    <li class="px-4 py-3 text-lg text-gray-900">
                                        <input name="bad_signs[]" value="{{ $sign->id }}"
                                            type="checkbox">{{ $sign->sign }}
                                    </li>
                                @endif
                            @endforeach
                        </ul>

                        <input
                            class="rounded border-0 bg-gray-300 px-8 py-2 text-lg text-black hover:bg-gray-400 focus:outline-none"
                            type="submit" value="検索">
                    </details>
                </div>
            </form>

            <button type="button"
                class="mx-auto flex rounded border-0 bg-indigo-500 px-8 py-2 text-lg text-white hover:bg-indigo-600 focus:outline-none"
                onclick="location.href='{{ route('conditions.create', ['user_id' => Auth::id()]) }}' ">体調を新規登録
            </button>
            {{-- 絞り込み検索用モーダルウィンドウ --}}
            {{-- @livewire('modal') --}}

            <div class="mx-auto mt-12 h-[40rem] w-full overflow-scroll lg:w-3/4">
                <table class="whitespace-no-wrap w-full table-auto text-left">
                    <thead>
                        <tr>
                            <th
                                class="title-font sticky top-0 rounded-bl rounded-tl bg-gray-100 px-4 py-3 text-sm font-medium tracking-wider text-gray-900">
                                日付
                            </th>
                            <th
                                class="title-font sticky top-0 whitespace-nowrap bg-gray-100 px-4 py-3 text-sm font-medium tracking-wider text-gray-900">
                                良好サイン
                            </th>
                            <th
                                class="title-font sticky top-0 whitespace-nowrap bg-gray-100 px-4 py-3 text-sm font-medium tracking-wider text-gray-900">
                                注意サイン
                            </th>
                            <th
                                class="title-font sticky top-0 whitespace-nowrap bg-gray-100 px-4 py-3 text-sm font-medium tracking-wider text-gray-900">
                                悪化サイン
                            </th>
                            <th
                                class="title-font sticky top-0 bg-gray-100 px-4 py-3 text-sm font-medium tracking-wider text-gray-900">
                                天気
                            </th>
                            <th
                                class="title-font sticky top-0 bg-gray-100 px-4 py-3 text-sm font-medium tracking-wider text-gray-900">
                                気温
                            </th>
                            <th
                                class="title-font sticky top-0 bg-gray-100 px-4 py-3 text-sm font-medium tracking-wider text-gray-900">
                                湿度
                            </th>
                            <th
                                class="title-font sticky top-0 bg-gray-100 px-4 py-3 text-sm font-medium tracking-wider text-gray-900">
                                就寝時刻
                            </th>
                            <th
                                class="title-font sticky top-0 bg-gray-100 px-4 py-3 text-sm font-medium tracking-wider text-gray-900">
                                起床時刻
                            </th>
                            <th
                                class="title-font sticky top-0 bg-gray-100 px-4 py-3 text-sm font-medium tracking-wider text-gray-900">
                                睡眠時間
                            </th>
                            <th
                                class="title-font sticky top-0 bg-gray-100 px-4 py-3 text-sm font-medium tracking-wider text-gray-900">
                                運動
                            </th>
                            <th
                                class="title-font sticky top-0 bg-gray-100 px-4 py-3 text-sm font-medium tracking-wider text-gray-900">
                                朝食
                            </th>
                            <th
                                class="title-font sticky top-0 bg-gray-100 px-4 py-3 text-sm font-medium tracking-wider text-gray-900">
                                昼食
                            </th>
                            <th
                                class="title-font sticky top-0 bg-gray-100 px-4 py-3 text-sm font-medium tracking-wider text-gray-900">
                                夕食
                            </th>
                            <th
                                class="title-font sticky top-0 bg-gray-100 px-4 py-3 text-sm font-medium tracking-wider text-gray-900">
                                コメント
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($conditions as $condition)
                            <tr>
                                <td class="px-4 py-3">{{ $condition->date }}</td>
                                <td>
                                    <ul>
                                        @foreach ($condition->signs as $sign)
                                            @if ($sign->sign_type == 0)
                                                <li>{{ $sign->sign }}</li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    <ul>
                                        @foreach ($condition->signs as $sign)
                                            @if ($sign->sign_type == 1)
                                                <li>{{ $sign->sign }}</li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    <ul>
                                        @foreach ($condition->signs as $sign)
                                            @if ($sign->sign_type == 2)
                                                <li>{{ $sign->sign }}</li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </td>
                                <td class="px-4 py-3">{{ $condition->weather->weather }}</td>
                                <td class="px-4 py-3">{{ $condition->weather->temperature }}</td>
                                <td class="px-4 py-3">{{ $condition->weather->humidity }}</td>
                                <td class="px-4 py-3">{{ $condition->sleep_time }}</td>
                                <td class="px-4 py-3">{{ $condition->wakeup_time }}</td>
                                <td class="px-4 py-3">{{ $condition->sleep_duration }}</td>
                                <td class="px-4 py-3">{{ $condition->exercise }}</td>
                                <td class="px-4 py-3">{{ $condition->breakfast }}</td>
                                <td class="px-4 py-3">{{ $condition->lunch }}</td>
                                <td class="px-4 py-3">{{ $condition->dinner }}</td>
                                <td class="px-4 py-3">{{ $condition->comment }}</td>
                                <td>
                                    <button type="button"
                                        onclick="location.href='{{ route('conditions.edit', ['user_id' => Auth::id(), 'condition_id' => $condition->id]) }}'"
                                        class="rounded border-0 bg-indigo-500 px-8 py-2 text-lg text-white hover:bg-indigo-600 focus:outline-none">
                                        編集
                                    </button>
                                </td>
                                <td>
                                    <form
                                        action="{{ route('conditions.destroy', ['user_id' => Auth::id(), 'condition_id' => $condition->id]) }}"
                                        method="POST" onsubmit="return confirm('本当に削除してもよろしいですか？');">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            class="rounded border-0 bg-red-500 px-8 py-2 text-lg text-white hover:bg-red-600 focus:outline-none"
                                            type="submit">削除</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</x-user-layout>
