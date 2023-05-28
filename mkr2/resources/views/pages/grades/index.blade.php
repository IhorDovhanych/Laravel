<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row flex-nowrap">
            @if(isset($id))
                @if($id == $user['id'])
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight flex" style="align-items: center">
                        {{ __('My grades') }}
                    </h2>
                    <div class="group transition ml-5 duration-300">
                        <h3 class="text-md text-gray-700 dark:text-gray-100 leading-tight flex h-full" style="align-items: center">
                            <a href="{{route('grades')}}">{{ __('All grades')}}</a>
                        </h3>
                        <span class="block max-w-0 group-hover:max-w-full transition-all duration-400 h-0.5 bg-gray-700"></span>
                    </div>
                    <form class="w-1/2 ml-5" action="{{ route('search.by.id.form.submit') }}" method="POST">
                        @csrf
                        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            </div>
                            <input name="id" id="id" type="number" id="default-search" class="block w-full pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Find by ID" required>
                            <button type="submit" class="text-blue-700 absolute right-5 bottom-0 hover:text-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm mx-4 my-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                        </div>
                    </form>
                @else
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight flex" style="align-items: center">
                        {{ __('ID') }}: {{$id}}
                    </h2>
                    <div class="group transition ml-5 duration-300">
                        <h3 class="text-md text-gray-700 dark:text-gray-100 leading-tight flex h-full" style="align-items: center">
                            <a href="{{route('grades')}}">{{ __('All grades')}}</a>
                        </h3>
                        <span class="block max-w-0 group-hover:max-w-full transition-all duration-400 h-0.5 bg-gray-700"></span>
                    </div>
                    <div class="group transition ml-5 duration-300">
                        <h3 class="text-md text-gray-700 dark:text-gray-100 leading-tight flex h-full" style="align-items: center">
                            <a href="{{route('grade_id', ['id' => $user['id']])}}">{{ __('My grades') }}</a>
                        </h3>
                        <span class="block max-w-0 group-hover:max-w-full transition-all duration-400 h-0.5 bg-gray-700"></span>
                    </div>
                    <form class="w-1/2 ml-5" action="{{ route('search.by.id.form.submit') }}" method="POST">
                        @csrf
                        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            </div>
                            <input name="id" id="id" type="number" id="default-search" class="block w-full pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Find by ID" required>
                            <button type="submit" class="text-blue-700 absolute right-5 bottom-0 hover:text-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm mx-4 my-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                        </div>
                    </form>
                @endif
            @else
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight flex" style="align-items: center">
                    {{ __('All grades') }}
                </h2>
                <div class="group transition ml-5 duration-300">
                    <h3 class="text-md text-gray-700 dark:text-gray-100 leading-tight flex h-full" style="align-items: center">
                        <a href="{{route('grade_id', ['id' => $user['id']])}}">{{ __('My grades') }}</a>
                    </h3>
                    <span class="block max-w-0 group-hover:max-w-full transition-all duration-400 h-0.5 bg-gray-700"></span>
                </div>
                <form class="w-1/2 ml-5" action="{{ route('search.by.id.form.submit') }}" method="POST">
                    @csrf
                    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </div>
                        <input name="id" id="id" type="number" id="default-search" class="block w-full pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Find by ID" required>
                        <button type="submit" class="text-blue-700 absolute right-5 bottom-0 hover:text-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm mx-4 my-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                    </div>
                </form>
            @endif
        </div>
    </x-slot>
{{--///////////////////////////////////////////////////////--}}

    <div class="py-12">
        @if($user->role == 'admin' || $user->role == 'superAdmin')
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-3">
                 <div class="flex inline-flex mb-2 w-full" style="align-items: center; justify-content: flex-end">
                    <p class="font-bold mr-2">
                        Create:
                    </p>
                    <a href="{{route('student.create')}}" class="bg-gray-300 from-green-400 via-green-500 hover:bg-gradient-to-br hover:text-emerald-100 text-gray-800 font-bold py-2 px-4 rounded-l">
                        + Student
                    </a>
                    <a href="{{route('grade.create')}}" class="bg-gray-300 from-green-400 via-green-500 hover:bg-gradient-to-bl hover:text-emerald-100 text-gray-800 font-bold py-2 px-4 rounded-r">
                        + Grade
                    </a>
                </div>
            </div>
        @endif
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if(!isset($id))
                        @if(strlen($students) > 0)
                            @foreach($students as $student)
                                <section class=" flex flex-col p-5 m-5 rounded-md">
                                    <div>
                                        <article class="flex justify-between w-full">
                                            <h3 class="text-xl flex-nowrap flex flex-row">
                                                {{$student['full_name']}}
                                                <div class="ml-2 flex relative text-sm text-gray-500" style="align-items: center">
                                                    ID: #{{$student['id']}}
                                                </div>
                                            </h3>
                                            <div class="text-end flex" style="align-items: center">
                                                <p class="mr-2" style="white-space: nowrap; width: 70px">
                                                    Course: {{$student['course']}}
                                                </p>
                                                @if($user->role == 'admin' || $user->role == 'superAdmin' || $user->role == 'editor')
                                                    <form action="{{ route('student.edit', ['id' => $student['id']])}}" method="POST">
                                                        @csrf
                                                        @method('GET')
                                                        <button type="submit" class="text-blue-600 font-medium rounded-lg text-sm text-center">
                                                            Edit
                                                        </button>
                                                    </form>

                                                    @if($user->role == 'admin' || $user->role == 'superAdmin')
                                                        <form class="w-1/2" action="{{ route('student.destroy', ['id' => $student['id']]) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="text-red-600 font-medium rounded-lg text-sm text-center ml-2">
                                                                Delete
                                                            </button>
                                                        </form>
                                                    @endif
                                                @endif
                                            </div>
                                        </article>
                                        Specialization: {{$student['specialization']}}
                                    </div>
                                    <div class="flex flex-col bg-neutral-100 p-5 mt-5 rounded-md">
                                        @if(count($student->grades) == 0)
                                            <div class="flex justify-between w-full bg-white rounded-md p-3">
                                                <div class="text-lg capitalize">
                                                    No grades
                                                </div>
                                            </div>
                                        @else
                                            Grades count: {{count($student->grades)}}
                                            @foreach($student->grades as $grade)
                                                <div class="text-end text-xs text-neutral-500 mr-1">
                                                    {{$grade['grade_date']}}
                                                </div>
                                                <div class="flex justify-between w-full bg-white rounded-md px-3 py-4 mb-2" style="align-items: center">
                                                    <div class="text-lg capitalize">
                                                        {{$grade['lesson_name']}}
                                                    </div>
                                                    <div class="flex" style="align-items: center" >
                                                        <p class="mr-2" style="white-space: nowrap; width: 120px">
                                                            Grade: {{$grade['grade']}}
                                                        </p>
                                                        @if($user->role == 'admin' || $user->role == 'superAdmin' || $user->role == 'editor')
                                                            <form action="{{ route('grade.edit', ['id' => $grade['id']])}}" method="POST">
                                                                @csrf
                                                                @method('GET')
                                                                <button type="submit" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-1 text-center mr-2 mb-2">
                                                                    Edit
                                                                </button>
                                                            </form>

                                                            @if($user->role == 'admin' || $user->role == 'superAdmin')
                                                            <form class="w-1/2" action="{{ route('grade.destroy', ['id' => $grade['id']]) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-1 text-center mr-2 mb-2">
                                                                    Delete
                                                                </button>
                                                            </form>
                                                            @endif
                                                        @endif
                                                    </div>
                                                </div>
                                            @endforeach
                                       @endif
                                    </div>
                                </section>
                           @endforeach
                        @else
                            <section class=" flex flex-col p-5 m-5 rounded-md">
                                <div>
                                    <article class="flex justify-between w-full">
                                        <h3 class="text-xl flex-nowrap flex flex-row">
                                            No students yet
                                        </h3>
                                    </article>
                                </div>
                            </section>
                        @endif
                    @else
                        @if($student != null)
                            <section class=" flex flex-col p-5 m-5 rounded-md">
                                <div>
                                    <article class="flex justify-between w-full">
                                        <h3 class="text-xl flex-nowrap flex flex-row">
                                            {{$student['full_name']}}
                                            <div class="ml-2 flex relative text-sm text-gray-500" style="align-items: center">
                                                ID: #{{$student['id']}}
                                            </div>
                                        </h3>
                                        <div class="text-end">
                                            Course: {{$student['course']}}
                                        </div>
                                    </article>
                                    Specialization: {{$student['specialization']}}
                                </div>
                                <div class="flex flex-col bg-neutral-100 p-5 mt-5 rounded-md">
                                    @if(count($student->grades) == 0)
                                        <div class="flex justify-between w-full bg-white rounded-md p-3">
                                            <div class="text-lg capitalize">
                                                No grades
                                            </div>
                                        </div>
                                    @else
                                        Grades count: {{count($student->grades)}}
                                        @foreach($student->grades as $grade)
                                            <div class="text-end text-xs text-neutral-500 mr-1">
                                                {{$grade['grade_date']}}
                                            </div>
                                            <div class="flex justify-between w-full bg-white rounded-md px-3 py-4 mb-2" style="align-items: center">
                                                <div class="text-lg capitalize">
                                                    {{$grade['lesson_name']}}
                                                </div>
                                                <div class="flex" style="align-items: center" >
                                                    <p class="mr-2" style="white-space: nowrap; width: 120px">
                                                        Grade: {{$grade['grade']}}
                                                    </p>
                                                    @if($user->role == 'admin' || $user->role == 'superAdmin')
                                                        <form action="{{ route('grade.edit', ['id' => $grade['id']])}}" method="POST">
                                                            @csrf
                                                            @method('GET')
                                                            <button type="submit" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-1 text-center mr-2 mb-2">
                                                                Edit
                                                            </button>
                                                        </form>
                                                        <form class="w-1/2" action="{{ route('grade.destroy', ['id' => $grade['id']]) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-1 text-center mr-2 mb-2">
                                                                Delete
                                                            </button>
                                                        </form>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </section>
                        @else
                            <section class=" flex flex-col p-1 m-5 rounded-md">
                                <div>
                                    <article class="flex justify-between w-full">
                                        <h3 class="text-xl flex-nowrap flex flex-row">
                                            Student don't exist
                                            <div class="ml-2 flex relative text-sm text-gray-500" style="align-items: center">
                                                (ID : {{$id}})
                                            </div>
                                        </h3>
                                    </article>
                                </div>
                            </section>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


