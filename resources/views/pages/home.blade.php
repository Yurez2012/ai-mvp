@extends('layout.layout')

@section('content')
    <div class="container mx-auto mt-20">
        <div class="flex flex-col flex-grow  mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="flex flex-col flex-grow p-4 overflow-y-auto">
                <!-- Message from the user -->
                <div class="flex w-full mt-2 space-x-3 max-w-xs ml-auto justify-end">
                    <div>
                        <div class="bg-blue-600 text-white p-3 rounded-l-lg rounded-br-lg">
                            <p>Hello, how can I help you today?</p>
                        </div>
                        <span class="text-xs text-gray-500 leading-none">2 min ago</span>
                    </div>
                    <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gray-300"></div>
                </div>

                <!-- Message from ChatGPT -->
                <div class="flex w-full mt-2 space-x-3 max-w-xs">
                    <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gray-300"></div>
                    <div>
                        <div class="bg-gray-300 p-3 rounded-r-lg rounded-bl-lg">
                            <p>Hi! I'm ChatGPT. How can I assist you today?</p>
                        </div>
                        <span class="text-xs text-gray-500 leading-none">1 min ago</span>
                    </div>
                </div>
            </div>

            <!-- Input area -->
            <div class="bg-gray-200 p-4">
                <input class="flex items-center h-10 w-full rounded px-3 text-sm" type="text" placeholder="Type your message…">
            </div>
        </div>
    </div>
@stop

