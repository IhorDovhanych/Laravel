@vite(['resources/css/app.css', 'resources/js/app.js'])
<div class="relative overflow-x-auto max-w-screen-xl m-auto mt-10">
<form action="{{route('candidates.store')}}" method="post">
    @csrf
    <label for="first_name">First name:</label>
    <input type="text" required name="first_name" placeholder="Ihor"
           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
    >
    <br/>
    <label for="last_name">Last name:</label>
    <input type="text" required name="last_name" placeholder="Dovhanych"
           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
    >
    <br/>
    <label for="gender">Gender:</label>
    <div>
        Male:
        <input type="radio" required name="gender" value="Male">
    </div>
    <div>
        Female:
        <input type="radio" required name="gender" value="Female">
    </div>
    <label for="birth_year">Birthday:</label>
    <input type="date" required name="birth_year"
           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
    >
    <br/>
    <label for="education">Education:</label>
    <input type="text" required name="education"
           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
    >
    <br/>
    <label for="specialization">Specialization:</label>
    <input type="text" required name="specialization"
           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
    >
    <br/>
    <label for="vacancy_list">Vacancy:</label>
    <input type="text" required name="vacancy_id"
           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
    >
    <br/>
    <input type="submit" value="Send"
           class="hover:bg-gradient-to-r hover:text-white hover:border-transparent from-green-500 to-green-400 p-2 mb-1 border-green-500 border-2 text-green-500 rounded-xl w-80"
    >
</form>
</div>
