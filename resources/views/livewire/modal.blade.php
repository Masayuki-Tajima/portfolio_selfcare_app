<div>
    <button wire:click="openModal()" type="button"
        class="rounded bg-blue-500 px-4 py-2 font-bold text-white hover:bg-blue-700">
        絞り込み検索
    </button>

    @if ($showModal)
        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex min-h-screen items-end justify-center px-4 pb-20 pt-4 text-center sm:block sm:p-0">
                {{-- <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div> --}}
                <form wire:submit.prevent="submit">
                    <div
                        class="inline-block transform overflow-hidden rounded-lg bg-white text-left align-bottom shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg sm:align-middle">
                        <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">
                                絞り込み検索
                            </h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">
                                    モーダルの内容をここに記述します。
                                </p>
                            </div>
                            <div class="mx-auto w-full overflow-auto lg:w-2/3">
                                <h2 class="text-2xl">良好サイン</h2>
                                <ul>
                                    @foreach ($signs as $sign)
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
                                    @foreach ($signs as $sign)
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
                                    @foreach ($signs as $sign)
                                        @if ($sign->sign_type == 2)
                                            <li class="px-4 py-3 text-lg text-gray-900">
                                                <input name="bad_signs[]" value="{{ $sign->id }}"
                                                    type="checkbox">{{ $sign->sign }}
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                            <button wire:click="" type="submit"
                                class="mt-3 inline-flex w-full justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm">
                                検索
                            </button>
                            <button wire:click="closeModal()" type="button"
                                class="mt-3 inline-flex w-full justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm">
                                閉じる
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>
