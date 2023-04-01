<table border="1px solid black">
    <tr>
        <th>Id</th>
        <th>First name</th>
        <th>Last name</th>
        <th>Gender</th>
        <th>Birthday</th>
        <th>Education</th>
        <th>Specialization</th>
        <th>Vacancies</th>
        <th>Act</th>
    </tr>

    @foreach($candidates as $candidate)
        <tr>
            <td>{{$candidate->id}}</td>
            <td>{{$candidate->first_name}}</td>
            <td>{{$candidate->last_name}}</td>
            <td>{{$candidate->gender}}</td>
            <td>{{$candidate->birth_year}}</td>
            <td>{{$candidate->education}}</td>
            <td>{{$candidate->specialization}}</td>
            <td>{{$candidate->vacancy_list}}</td>
            <td>
                <a href="{{route('candidates.edit', $candidate)}}">
                    <button>
                        Edit
                    </button>
                </a>
                <form action="{{ route('candidates.destroy', $candidate->id) }}" method="post">
                    @csrf
                    {{ method_field('DELETE') }}
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
<a href="{{route('candidates.create')}}">Create</a>
