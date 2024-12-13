<div>
    <h1>Pistas</h1>
    <ul>
        @foreach ($courts as $court)
            <li onclick="getInfo({{$court}})">{{ $court->nombre }} - {{ $court->tipo_pista }}</li>
        @endforeach

    </ul>

</div>