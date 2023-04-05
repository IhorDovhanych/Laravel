<form action="{{route('candidates.store')}}" method="post">
    @csrf
    <label for="first_name">First name:</label>
    <input type="text" required name="first_name" placeholder="Ihor">
    <br/>
    <label for="last_name">Last name:</label>
    <input type="text" required name="last_name" placeholder="Dovhanych">
    <br/>
    <label for="gender">Gender:</label>
    Male:
    <input type="radio" required name="gender" value="Male">
    Female:
    <input type="radio" required name="gender" value="Female">
    <br/>
    <label for="birth_year">Birthday:</label>
    <input type="date" required name="birth_year">
    <br/>
    <label for="education">Education:</label>
    <input type="text" required name="education">
    <br/>
    <label for="specialization">Specialization:</label>
    <input type="text" required name="specialization">
    <br/>
    <label for="vacancy_list">Vacancy:</label>
    <input type="text" required name="vacancy_id">
    <br/>
    <input type="submit">
</form>
