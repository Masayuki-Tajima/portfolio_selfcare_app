<x-top-layout>
    <section class="body-font text-gray-600">
        <div class="container mx-auto px-5 py-24">
            <div class="flex flex-col text-center w-full mb-20">
                <h2 class="text-xs text-indigo-500 tracking-widest font-medium title-font mb-1">ROOF PARTY POLAROID</h2>
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">トップページ</h1>
                <p class="lg:w-2/3 mx-auto leading-relaxed text-base">ようこそ、体調管理アプリへ！</p>
            </div>
            <div class="flex flex-col">
                <div class="h-1 overflow-hidden rounded bg-gray-200">
                    <div class="h-full w-24 bg-indigo-500"></div>
                </div>
                <div class="mb-12 flex flex-col flex-wrap py-6 sm:flex-row">
                    <h1 class="title-font mb-2 text-2xl font-medium text-gray-900 sm:mb-0 sm:w-2/5">3つの特徴</h1>
                    {{-- <p class="pl-0 text-base leading-relaxed sm:w-3/5 sm:pl-10">他の体調管理アプリとは違う3つの特徴があります。</p> --}}
                </div>
            </div>
            <div class="-mx-4 -mb-10 -mt-4 flex flex-wrap sm:-m-4">
                <div class="mb-6 p-4 sm:mb-0 md:w-1/3">
                    <div class="h-64 overflow-hidden rounded-lg">
                        <img alt="content" class="h-full w-full object-cover object-center"
                            src="https://dummyimage.com/1203x503">
                    </div>
                    <h2 class="title-font mt-5 text-xl font-medium text-gray-900">Shooting Stars</h2>
                    <p class="mt-2 text-base leading-relaxed">Swag shoivdigoitch literally meditation subway tile tumblr
                        cold-pressed. Gastropub street art beard dreamcatcher neutra, ethical XOXO lumbersexual.</p>
                    <a class="mt-3 inline-flex items-center text-indigo-500">Learn More
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" class="ml-2 h-4 w-4" viewBox="0 0 24 24">
                            <path d="M5 12h14M12 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
                <div class="mb-6 p-4 sm:mb-0 md:w-1/3">
                    <div class="h-64 overflow-hidden rounded-lg">
                        <img alt="content" class="h-full w-full object-cover object-center"
                            src="https://dummyimage.com/1204x504">
                    </div>
                    <h2 class="title-font mt-5 text-xl font-medium text-gray-900">The Catalyzer</h2>
                    <p class="mt-2 text-base leading-relaxed">Swag shoivdigoitch literally meditation subway tile tumblr
                        cold-pressed. Gastropub street art beard dreamcatcher neutra, ethical XOXO lumbersexual.</p>
                    <a class="mt-3 inline-flex items-center text-indigo-500">Learn More
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" class="ml-2 h-4 w-4" viewBox="0 0 24 24">
                            <path d="M5 12h14M12 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
                <div class="mb-6 p-4 sm:mb-0 md:w-1/3">
                    <div class="h-64 overflow-hidden rounded-lg">
                        <img alt="content" class="h-full w-full object-cover object-center"
                            src="https://dummyimage.com/1205x505">
                    </div>
                    <h2 class="title-font mt-5 text-xl font-medium text-gray-900">The 400 Blows</h2>
                    <p class="mt-2 text-base leading-relaxed">Swag shoivdigoitch literally meditation subway tile tumblr
                        cold-pressed. Gastropub street art beard dreamcatcher neutra, ethical XOXO lumbersexual.</p>
                    <a class="mt-3 inline-flex items-center text-indigo-500">Learn More
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" class="ml-2 h-4 w-4" viewBox="0 0 24 24">
                            <path d="M5 12h14M12 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="flex flex-wrap -m-4">
                <div class="xl:w-1/2 md:w-1/2 p-4">
                    <div class="border border-gray-200 p-6 rounded-lg">
                        <div class="w-10 h-10 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-4">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-6 h-6" viewBox="0 0 24 24">
                                <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                            </svg>
                        </div>
                        <a href="{{ route('login') }}" class="block text-lg text-gray-900 font-medium title-font mb-2">ログイン画面へ</a>
                        {{-- <p class="leading-relaxed text-base">Fingerstache flexitarian street art 8-bit waist co, subway tile poke farm.</p> --}}
                    </div>
                </div>
                <div class="xl:w-1/2 md:w-1/2 p-4">
                    <div class="border border-gray-200 p-6 rounded-lg">
                        <div class="w-10 h-10 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-4">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-6 h-6" viewBox="0 0 24 24">
                                <circle cx="6" cy="6" r="3"></circle>
                                <circle cx="6" cy="18" r="3"></circle>
                                <path d="M20 4L8.12 15.88M14.47 14.48L20 20M8.12 8.12L12 12"></path>
                            </svg>
                        </div>
                        <a href="{{ route('guest.login') }}" class="block text-lg text-gray-900 font-medium title-font mb-2">ゲストユーザーで使ってみる</a>
                        {{-- <p class="leading-relaxed text-base">Fingerstache flexitarian street art 8-bit waist co, subway tile poke farm.</p> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-top-layout>
