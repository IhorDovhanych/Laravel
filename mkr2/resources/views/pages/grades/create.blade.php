<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row flex-nowrap">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight flex" style="align-items: center">
                {{ __('Create grade') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <section class=" flex flex-col p-5 m-5 rounded-md">
                        <form class="grid gap-6 mb-6 md:grid-cols-2" action="{{ route('grade.store')}}" method="POST">
                            @csrf
                            {{ method_field('POST') }}
                            <div>
                                <h3 class="text-2xl flex-nowrap flex flex-row">
                                    Lesson name
                                </h3>
                                <div class="mt-2">
                                    <input type="text" name="lesson_name" id="lesson_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Lesson name" required>
                                </div>
                            </div>
                            <div>
                                <h3 class="text-2xl flex-nowrap flex flex-row">
                                    Grade
                                </h3>
                                <div class="mt-2">
                                    <input type="number" name="grade" id="grade" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Grade" required>
                                </div>
                            </div>
                            <div>
                                <h3 class="text-2xl flex-nowrap flex flex-row">
                                    Date
                                </h3>
                                <div class="mt-2">
                                    <input type="date" name="grade_date" id="grade_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                </div>
                            </div>
                            <div>
                                <h3 class="text-2xl flex-nowrap flex flex-row">
                                    Student (ID)
                                </h3>
                                <div class="mt-2">
                                    <input type="number" name="student_id" id="student_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Student ID" required>
                                </div>
                            </div>

                            <button type="submit" class=" mt-6 text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 ">
                                Submit
                            </button>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

