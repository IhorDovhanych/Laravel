<form action="{{route('candidates.update', $candidate)}}" method="post">
    @csrf
    {{ method_field('PUT') }}
    <label for="first_name">First name:</label>
    <input type="text" required name="first_name" placeholder="Ihor" value="{{$candidate->first_name}}">
    <br/>
    <label for="last_name">Last name:</label>
    <input type="text" required name="last_name" placeholder="Dovhanych" value="{{$candidate->last_name}}">
    <br/>
    <label for="gender">Gender:</label>
    @if($candidate->gender == "Male")
        Male:
        <input type="radio" required name="gender" value="Male" checked>
        Female:
        <input type="radio" required name="gender" value="Female">
    @else
        Male:
        <input type="radio" required name="gender" value="Male">
        Female:
        <input type="radio" required name="gender" value="Female" checked>
    @endif
        <br/>
    <label for="birth_year">Birthday:</label>
    <input type="date" required name="birth_year" value="{{$candidate->birth_year}}">
    <br/>
    <label for="education">Education:</label>
    <input type="text" required name="education" value="{{$candidate->education}}">
    <br/>
    <label for="specialization">Specialization:</label>
    <input type="text" required name="specialization" value="{{$candidate->specialization}}">
    <br/>
    <label for="vacancy_list">Vacancy:</label>
    <input type="text" required name="vacancy_list" value="{{$candidate->vacancy_list}}">
    <br/>
    <input type="submit">
</form>

