<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    @vite('resources/js/app.js')

</head>

<body>

    <main class="">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Data</th>
                    <th scope="col">Azienda</th>
                    <th scope="col">Numero</th>
                    <th scope="col">Origine</th>
                    <th scope="col">Ora Partenza</th>
                    <th scope="col">Destino</th>
                    <th scope="col">Ora Arrivo</th>
                    <th scope="col">Carrozze</th>
                    <th scope="col">Ritardo</th>
                    <th scope="col">Cancellato</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($trains as $train)
                    <tr>
                        <th>{{ DateTime::createFromFormat('Y-m-d', $train->date )->format('d-m-Y') }}</th>
                        <th>{{ $train->company }}</th>
                        <th>{{ $train->code }}</th>
                        <th>{{ $train->origin }}</th>
                        <th>{{ DateTime::createFromFormat('H:i:s', $train->origin_time )->format('H:i') }}</th>
                        <th>{{ $train->destiny }}</th>
                        <th>{{ DateTime::createFromFormat('H:i:s', $train->destiny_time )->format('H:i') }}</th>
                        <th>{{ $train->coaches }}</th>
                        <th
                            class="{{ $train->ontime == 0 && $train->canceled == 0 ? ' bg-warning text-center' : 'text-center' }}">
                            {{ $train->ontime == 0 && $train->canceled == 0 ? 'RIT.' : '' }}</th>
                        <th class="{{ $train->canceled == 1 ? ' bg-danger text-center text-white' : '' }}">
                            {{ $train->canceled == 1 ? 'CANCELLATO' : '' }}</th>
                    </tr>
                @endforeach
            </tbody>
        </table>


    </main>

</body>

</html>
