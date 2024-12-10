<div>
    <h1>Lista de Canchas</h1>
    <ul>
        @foreach ($courts as $court)
            <li onclick="getInfo({{$court}})">{{ $court->nombre }} - {{ $court->tipo_pista }}</li>
        @endforeach

    </ul>

</div>

<script>
    function getInfo(court){
        const alonecourt = @json($alonecourt);
        console.log(alonecourt);
    }

    getInfo()
</script>