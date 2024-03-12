<h1>Kết quả:</h1>
    <ul>
    @foreach($mang as $number)
            @if($number % 2 == 0)
                <li style="color: red;">{{ $number }}</li>
            @else
                <li style="color: blue;">{{ $number }}</li>
            @endif
        @endforeach
    </ul