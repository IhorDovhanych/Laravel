<x-app-layout>
@foreach($students as $student)
    {{$student->full_name}}
@endforeach
</x-app-layout>
