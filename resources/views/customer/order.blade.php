@extends('layout.layout')

@section('content')
    <div class="container mx-auto mt-10" x-data="{'isModalOpen': false}">
        @foreach($orders as $order)
            <ul class="bg-gray-800 p-5 mb-5 divide-y">
                <div class="flex justify-between">
                    <p class="p-3">
                        Product #{{$order->id}}
                    </p>
                    <div>
                        <a href="#" class="btn btn-primary" x-on:click="isModalOpen = true">
                            Open chat
                        </a>
                    </div>
                </div>
                @foreach($order->products as $product)
                    <li class="flex justify-between gap-x-6 py-5 p-5">
                        <div class="flex flex-col  min-w-0 gap-x-4  w-full">
                            <div class="min-w-0 flex flex-row justify-between items-center mb-5">
                                <div class="flex flex-col gap-1">
                                    <img class="h-12 w-12 flex-none rounded-full bg-gray-50"
                                         src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                         alt="">
                                    <p class="text-sm font-semibold leading-6 text-gray-300">{{$product->user->name}}</p>
                                    <p class="text-sm font-semibold leading-6 text-gray-300">{{$product->user->email}}</p>
                                </div>
                            </div>
                            <p class="mb-2">
                                Technology
                            </p>
                            <div class="flex flex-wrap gap-1">
                                @foreach($product->user->skills as $skill)
                                    <span
                                        class="bg-amber-600 rounded-3xl px-5 h-6 text-sm flex items-center">
                                        {{$skill->technology->technology}} | {{$skill->year}} year
                                    </span>
                                @endforeach
                            </div>
                            <p class="mt-3 mb-2">
                                Available time for call
                            </p>
                            <div class="flex flex-wrap gap-1">
                                @foreach($product->times as $time)
                                    <label class="bg-teal-900 rounded-3xl px-5 h-6 text-sm flex items-center">
                                        {{Carbon\Carbon::parse($time->start)->format('H:m')}}
                                        - {{Carbon\Carbon::parse($time->end)->format('H:m')}}
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        @endforeach
        <div style="box-shadow: 0 0 #0000, 0 0 #0000, 0 1px 2px 0 rgb(0 0 0 / 0.05);"
             x-show="isModalOpen"
             class="fixed bottom-[calc(4rem+1.5rem)] right-0 mr-4 bg-white p-6 rounded-lg border border-[#e5e7eb] w-[440px] h-[634px]">
            <button class="px-2" x-on:click="isModalOpen = false">X</button>
            <div class="flex flex-col space-y-1.5 pb-6">
                <h2 class="font-semibold text-lg tracking-tight">Chatbot</h2>
            </div>

            <!-- Chat Container -->
            <div class="pr-4 h-[474px]" style="min-width: 100%; display: table;">
                <!-- Chat Message AI -->
                <div class="flex gap-3 my-4 text-gray-600 text-sm flex-1"><span
                        class="relative flex shrink-0 overflow-hidden rounded-full w-8 h-8">
          <div class="rounded-full bg-gray-100 border p-1"><svg stroke="none" fill="black" stroke-width="1.5"
                                                                viewBox="0 0 24 24" aria-hidden="true" height="20"
                                                                width="20" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round"
                    d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09zM18.259 8.715L18 9.75l-.259-1.035a3.375 3.375 0 00-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 002.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 002.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 00-2.456 2.456zM16.894 20.567L16.5 21.75l-.394-1.183a2.25 2.25 0 00-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 001.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 001.423 1.423l1.183.394-1.183.394a2.25 2.25 0 00-1.423 1.423z">
              </path>
            </svg></div>
        </span>
                    <p class="leading-relaxed"><span class="block font-bold text-gray-700">AI </span>Hi, how can I help
                        you
                        today?
                    </p>
                </div>

                <!--  User Chat Message -->
                <div class="flex gap-3 my-4 text-gray-600 text-sm flex-1"><span
                        class="relative flex shrink-0 overflow-hidden rounded-full w-8 h-8">
          <div class="rounded-full bg-gray-100 border p-1"><svg stroke="none" fill="black" stroke-width="0"
                                                                viewBox="0 0 16 16" height="20" width="20"
                                                                xmlns="http://www.w3.org/2000/svg">
              <path
                  d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z">
              </path>
            </svg></div>
        </span>
                    <p class="leading-relaxed"><span class="block font-bold text-gray-700">You </span>fewafef</p>
                </div>
                <!-- Ai Chat Message  -->
                <div class="flex gap-3 my-4 text-gray-600 text-sm flex-1"><span
                        class="relative flex shrink-0 overflow-hidden rounded-full w-8 h-8">
          <div class="rounded-full bg-gray-100 border p-1"><svg stroke="none" fill="black" stroke-width="1.5"
                                                                viewBox="0 0 24 24" aria-hidden="true" height="20"
                                                                width="20" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round"
                    d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09zM18.259 8.715L18 9.75l-.259-1.035a3.375 3.375 0 00-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 002.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 002.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 00-2.456 2.456zM16.894 20.567L16.5 21.75l-.394-1.183a2.25 2.25 0 00-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 001.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 001.423 1.423l1.183.394-1.183.394a2.25 2.25 0 00-1.423 1.423z">
              </path>
            </svg></div>
        </span>
                    <p class="leading-relaxed"><span class="block font-bold text-gray-700">AI </span>Sorry, I couldn't
                        find any
                        information in the documentation about that. Expect answer to be less accurateI could not find
                        the
                        answer to
                        this in the verified sources.</p>
                </div>
            </div>
            <!-- Input box  -->
            <div class="flex items-center pt-0">
                <form class="flex items-center justify-center w-full space-x-2">
                    <input
                        class="flex h-10 w-full rounded-md border border-[#e5e7eb] px-3 py-2 text-sm placeholder-[#6b7280] focus:outline-none focus:ring-2 focus:ring-[#9ca3af] disabled:cursor-not-allowed disabled:opacity-50 text-[#030712] focus-visible:ring-offset-2"
                        placeholder="Type your message" value="">
                    <button
                        class="inline-flex items-center justify-center rounded-md text-sm font-medium text-[#f9fafb] disabled:pointer-events-none disabled:opacity-50 bg-black hover:bg-[#111827E6] h-10 px-4 py-2">
                        Send
                    </button>
                </form>
            </div>
        </div>
    </div>
@stop
