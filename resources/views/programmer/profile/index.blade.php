@extends('layout.layout')

@section('content')
    <div class="container mx-auto flex items-center h-screen justify-center">
        <div class="flex flex-col justify-center px-6 py-12 lg:px-8 bg-gray-800">
            <div class="sm:mx-auto w-full">
                <h2 class="text-center text-2xl font-bold leading-9 tracking-tight">Skills</h2>
            </div>

            <div class="mt-10 sm:mx-auto w-full">
                <form class="space-y-6" action="{{ route('user_skill', ['user' => auth()->user()]) }}" method="POST"
                      x-data="user_skill">
                    @csrf
                    <table class="table-auto">
                        <thead>
                        <tr>
                            <th class="w-80 text-left">
                                Technology
                            </th>
                            <th class="w-40 text-left">
                                Experience in year
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <template x-for="(skill, index) in skills" :key="index" class="mb-10">
                            <tr>
                                <td>
                                    <select
                                        x-bind:name="`skills[${index}][technology_id]`"
                                        x-model="skill.technology_id"
                                        class="h-10 border border-gray-300 text-gray-600 text-base rounded-md block w-full py-2.5 focus:outline-none">
                                        <option selected>Choose technology</option>
                                        @foreach($technologies as $id => $technology)
                                            <option value="{{$id}}">{{$technology}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input id="year" type="number" autocomplete="Year" required
                                           x-model="skill.year"
                                           x-bind:name="`skills[${index}][year]`"
                                           class="h-10 block w-full rounded-md border-0 py-1.5 shadow-sm ring-1 ring-inset ring-gray-300 text-black pl-3"
                                           min="0" value="0">
                                </td>
                            </tr>
                        </template>
                        </tbody>
                    </table>
                    <div class="text-right">
                        <button type="button" class="btn btn-primary" @click="addSkill()">Add</button>
                    </div>
                    <div>
                        <button type="submit"
                                class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('user_skill', () => ({
            skills: {!! json_encode($skills) !!},
            addSkill() {
                this.skills.push({
                    technology: null,
                    year: 0,
                });
            }
        }))
    })
</script>
