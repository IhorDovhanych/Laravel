@vite(['resources/css/app.css',
'resources/js/app.js'])
<table class="border-spacing-px border-collapse">
        <tr>
            <th>id</th>
            <th>name</th>
            <th>producer</th>
            <th>price</th>
            <th>date</th>
        </tr>
        @foreach($goods as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->producer}}</td>
                <td>{{$item->price}}</td>
                <td>{{$item->date}}</td>
            </tr>
        @endforeach
    </table>
{{-- При натисканні--}}
{{-- відповідної кнопки показати тільки товари, ціна яких не перевищує--}}
{{-- максимальну. Валідувати введені дані.--}}
<form method="get" action="{{URL::to('goods')}}" enctype="application/x-www-form-urlencoded">
    @csrf
    <input type="number" placeholder="Type a number" name="price">
    <input type="submit">
</form>
