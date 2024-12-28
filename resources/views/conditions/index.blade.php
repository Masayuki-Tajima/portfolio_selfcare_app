<x-user-layout>
    <section class="body-font text-gray-600">
        <div class="container mx-auto px-5 py-24">
            <div class="mb-20 flex w-full flex-col text-center">
                <h1 class="title-font mb-2 text-3xl font-medium text-gray-900 sm:text-4xl">過去の体調の記録</h1>
            </div>
            <div class="mx-auto w-full overflow-auto lg:w-2/3">
                <table class="whitespace-no-wrap w-full table-auto text-left">
                    <thead>
                        <tr>
                            <th class="title-font rounded-bl rounded-tl bg-gray-100 px-4 py-3 text-sm font-medium tracking-wider text-gray-900">
                                日付
                            </th>
                            <th class="title-font bg-gray-100 px-4 py-3 text-sm font-medium tracking-wider text-gray-900">
                                良好サイン
                            </th>
                            <th class="title-font bg-gray-100 px-4 py-3 text-sm font-medium tracking-wider text-gray-900">
                                注意サイン
                            </th>
                            <th class="title-font bg-gray-100 px-4 py-3 text-sm font-medium tracking-wider text-gray-900">
                                悪化サイン
                            </th>
                            <th class="title-font bg-gray-100 px-4 py-3 text-sm font-medium tracking-wider text-gray-900">
                                天気
                            </th>
                            <th class="title-font bg-gray-100 px-4 py-3 text-sm font-medium tracking-wider text-gray-900">
                                気温
                            </th>
                            <th class="title-font bg-gray-100 px-4 py-3 text-sm font-medium tracking-wider text-gray-900">
                                湿度
                            </th>
                            <th class="title-font bg-gray-100 px-4 py-3 text-sm font-medium tracking-wider text-gray-900">
                                就寝時刻
                            </th>
                            <th class="title-font bg-gray-100 px-4 py-3 text-sm font-medium tracking-wider text-gray-900">
                                起床時刻
                            </th>
                            <th class="title-font bg-gray-100 px-4 py-3 text-sm font-medium tracking-wider text-gray-900">
                                睡眠時間
                            </th>
                            <th class="title-font bg-gray-100 px-4 py-3 text-sm font-medium tracking-wider text-gray-900">
                                運動
                            </th>
                            <th class="title-font bg-gray-100 px-4 py-3 text-sm font-medium tracking-wider text-gray-900">
                                朝食
                            </th>
                            <th class="title-font bg-gray-100 px-4 py-3 text-sm font-medium tracking-wider text-gray-900">
                                昼食
                            </th>
                            <th class="title-font bg-gray-100 px-4 py-3 text-sm font-medium tracking-wider text-gray-900">
                                夕食
                            </th>
                            <th class="title-font bg-gray-100 px-4 py-3 text-sm font-medium tracking-wider text-gray-900">
                                コメント
                            </th>

                            <th
                                class="title-font w-10 rounded-br rounded-tr bg-gray-100 text-sm font-medium tracking-wider text-gray-900">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($conditions as $condition)
                        <tr>
                            <td class="px-4 py-3">{{ $condition->date }}</td>
                            <td class="px-4 py-3">良好サイン</td>
                            <td class="px-4 py-3">注意サイン</td>
                            <td class="px-4 py-3">悪化サイン</td>
                            <td class="px-4 py-3">天気</td>
                            <td class="px-4 py-3">気温</td>
                            <td class="px-4 py-3">湿度</td>
                            <td class="px-4 py-3">{{ $condition->sleep_time }}</td>
                            <td class="px-4 py-3">{{ $condition->wakeup_time }}</td>
                            <td class="px-4 py-3">睡眠時間</td>
                            <td class="px-4 py-3">{{ $condition->exercise }}</td>
                            <td class="px-4 py-3">{{ $condition->breakfast }}</td>
                            <td class="px-4 py-3">{{ $condition->lunch }}</td>
                            <td class="px-4 py-3">{{ $condition->dinner }}</td>
                            <td class="px-4 py-3">{{ $condition->comment }}</td>
                            <td>
                                <form action="" method="POST">
                                    @csrf
                                    <input type="submit" value="編集">
                                </form>
                            </td>
                            <td>
                                <form action="" method="POST">
                                    @csrf
                                    <input type="submit" value="削除">
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
