<html>
    <head>
        <title>Card Manager</title>
    </head>
    <body>
        <h1>Cards</h1>
        <table>
        @foreach ($cards as $card)
            <tr>
                <td>{{ $card->id }}</td>
                <td>{{ $card->card_number }}</td>
                <td>{{ $card->PIN }}</td>
                <td>{{ $card->active_date }}</td>
                <td>{{ $card->expiry_date }}</td>
                <td>{{ $card->saldo }}</td>
                <td><a href="/cards/{{$card->id}}/edit">Edit</a></td>
            </tr>
        @endforeach
        </table>
    </body>
</html>