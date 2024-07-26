@extends('layout.layout')

@section('content')
    <div class="container mx-auto flex items-center h-screen justify-center">
        <div class="flex flex-col justify-center px-6 py-12 lg:px-8 bg-gray-800" style="width: 390px;">
            <div class="sm:mx-auto w-full">
                <h2 class="text-center text-2xl font-bold leading-9 tracking-tight">Register</h2>
            </div>

            <div class="mt-10 sm:mx-auto w-full">
                <form class="space-y-6" action="{{ route('register') }}" method="POST">
                    @csrf
                    <div>
                        <label for="email" class="block text-sm font-medium leading-6">Name</label>
                        <div class="mt-2">
                            <input id="name" name="name" type="name" autocomplete="name" required
                                   class="block w-full rounded-md border-0 py-1.5 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                        @error('name')
                        <div class="text-red">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium leading-6">Email address</label>
                        <div class="mt-2">
                            <input id="email" name="email" type="email" autocomplete="email" required
                                   class="block w-full rounded-md border-0 py-1.5 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                        @error('email')
                        <div class="text-red">{{ $message }}</div>
                        @enderror
                    </div>


                    <div>
                        <label for="type" class="block text-sm font-medium leading-6">Type user</label>
                        <div class="mt-2">
                            <select
                                name="type"
                                class="h-10 border border-gray-300 text-gray-600 text-base rounded-md block w-full py-2.5 focus:outline-none">
                                <option selected>--</option>
                                <option value="1">Customer</option>
                                <option value="2">Programmer</option>
                            </select>
                        </div>
                        @error('email')
                        <div class="text-red">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <div class="flex items-center justify-between">
                            <label for="password" class="block text-sm font-medium leading-6">Password</label>
                        </div>
                        <div class="mt-2">
                            <input id="password" name="password" type="password" autocomplete="current-password"
                                   required
                                   class="block w-full rounded-md border-0 py-1.5 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                        @error('password')
                        <div class="text-red">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <div class="flex items-center justify-between">
                            <label for="password" class="block text-sm font-medium leading-6">Password Confirmation</label>
                        </div>
                        <div class="mt-2">
                            <input id="password_confirmation" name="password_confirmation" type="password"
                                   autocomplete="current-password" required
                                   class="block w-full rounded-md border-0 py-1.5 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                        @error('password_confirmation')
                        <div class="text-red">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <button type="submit"
                                class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            Register
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
