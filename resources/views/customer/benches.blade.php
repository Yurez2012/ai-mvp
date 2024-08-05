@extends('layout.layout')

@section('content')
    <div class="container mx-auto mt-5">
        <form action="{{route('benches')}}" method="GET">
            @csrf
            <div class="flex gap-4 mb-5 items-center">
                <select name="technologies[]" multiple id="countries_multiple" class="h-13 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @foreach($technologies as $id => $value)
                        <option value="{{$id}}">{{$value}}</option>
                    @endforeach
                </select>
                <input class="h-10" type="date" name="date_start">
                <input class="h-10" type="date" name="date_end">
                <button class="px-5 py-2" type="submit">Filter</button>
            </div>
        </form>
        <div class="flex gap-6">
            <div class="w-9/12">
                <ul role="list">
                    @foreach($users as $user)
                        <li class="flex justify-between gap-x-6 py-5 mb-5 bg-gray-800 p-5">
                            <form action="{{route('benches_booking', ['benches_booking' => $user])}}" method="POST">
                                <div class="flex min-w-0 gap-x-4">
                                    <div class="flex flex-col gap-2 w-20">
                                        <img class="h-12 w-12 flex-none rounded-full bg-gray-50"
                                             src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                             alt="">
                                        <p class="text-sm font-semibold leading-6 text-gray-300">{{$user->name}}</p>
                                    </div>
                                    <div class="flex flex-col gap-3">
                                        <div class="flex flex-wrap gap-1">
                                            @foreach($user->skills as $skill)
                                                <span
                                                    class="bg-amber-600 rounded-3xl px-5 h-6 text-sm flex items-center">
                                                    {{$skill->technology->technology}} | {{$skill->year}} year
                                                </span>
                                            @endforeach
                                        </div>
                                        <div class="flex flex-wrap gap-1">
                                            @foreach($user->times as $time)
                                                @foreach($time->period as $key => $period)
                                                    <label
                                                        class="bg-teal-900 rounded-3xl px-5 h-6 text-sm flex items-center"
                                                        for="period{{$key}}">
                                                        {{$period}}
                                                        <input type="checkbox" name="period{{$key}}" id="period{{$key}}"
                                                               value="1">
                                                    </label>
                                                @endforeach
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                                    <button type="submit" class="btn btn-primary">
                                        Book
                                    </button>
                                </div>
                            </form>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="w-3/12 bg-gray-800">
                <form action="{{ route('payment') }}">
                    @if(count(auth()->user()->benches) > 0)
                        <ul class="divide-y" role="list">
                            @foreach(auth()->user()->benches as $bench)
                                <li class="flex justify-between gap-x-6 py-5 p-5">
                                    <div class="flex flex-col  min-w-0 gap-x-4  w-full">
                                        <div class="min-w-0 flex flex-row justify-between items-center mb-5">
                                            <img class="h-12 w-12 flex-none rounded-full bg-gray-50"
                                                 src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                                 alt="">
                                            <p class="text-sm font-semibold leading-6 text-gray-300">{{$bench->user->name}}</p>
                                        </div>
                                        <div class="flex flex-wrap gap-1">
                                            @foreach($bench->user->skills as $skill)
                                                <span
                                                    class="bg-amber-600 rounded-3xl px-5 h-6 text-sm flex items-center">
                                                {{$skill->technology->technology}} | {{$skill->year}} year
                                            </span>
                                            @endforeach
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                            <li></li>
                        </ul>
                        <div class="p-5">
                            <button type="submit"
                                    class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                Payment Process
                            </button>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
@stop

