@vite(['resources/css/app.css', 'resources/js/app.js'])
<div class="relative overflow-x-auto max-w-screen-xl m-auto mt-10">
<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3">Id</th>
            <th scope="col" class="px-6 py-3">First name</th>
            <th scope="col" class="px-6 py-3">Last name</th>
            <th scope="col" class="px-6 py-3">Gender</th>
            <th scope="col" class="px-6 py-3">Birthday</th>
            <th scope="col" class="px-6 py-3">Education</th>
            <th scope="col" class="px-6 py-3">Specialization</th>
            <th scope="col" class="px-6 py-3">Vacancies</th>
            <th scope="col" class="px-6 py-3">Act</th>
        </tr>
    </thead>
    @foreach($candidates as $candidate)
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{$candidate->id}}
            </td>
            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{$candidate->first_name}}
            </td>
            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{$candidate->last_name}}
            </td>
            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{$candidate->gender}}
            </td>
            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{$candidate->birth_year}}
            </td>
            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{$candidate->education}}
            </td>
            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{$candidate->specialization}}
            </td>
            <td scope="row"class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                @foreach($vacancies as $vacancy)
                    @if($vacancy->id == $candidate->vacancy_id)
                        {{$vacancy->company_name}}
                    @endif
                @endforeach
            </td>
            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                <a href="{{route('candidates.edit', $candidate)}}">
                    <button
                        class="hover:bg-gradient-to-r hover:text-white hover:border-transparent from-cyan-500 to-blue-500 p-2 mb-1 border-cyan-500 border-2 text-cyan-500 rounded-xl w-80">
                        Edit
                    </button>
                </a>
                <form action="{{ route('candidates.destroy', $candidate->id) }}" method="post">
                    @csrf
                    {{ method_field('DELETE') }}
                    <button type="submit" class="hover:bg-gradient-to-r hover:text-white hover:border-transparent from-red-500 to-orange-500 p-2 mb-1 border-red-500 border-2 text-red-500 rounded-xl w-80">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
    <a href="{{route('candidates.create')}}">
        <button class="hover:bg-gradient-to-r hover:text-white hover:border-transparent from-green-500 to-green-400 p-2 mb-1 border-green-500 border-2 text-green-500 rounded-xl w-80 mt-10">
            Create
        </button>
    </a>
</div>

