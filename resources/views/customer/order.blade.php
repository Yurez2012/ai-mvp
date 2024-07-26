@extends('layout.layout')

@section('content')
    <div class="container mx-auto mt-10">
        @foreach($orders as $order)
            <ul class="bg-gray-800 p-5 mb-5 divide-y">
                <p class="p-3">
                    Product #{{$order->id}}
                </p>
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
                                @foreach($product->user->times as $time)
                                    <a href="">
                                        <span class="bg-amber-900 rounded-3xl px-5 h-6 text-sm flex items-center">
                                            {{$time->time}}
                                        </span>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        @endforeach
    </div>
@stop

