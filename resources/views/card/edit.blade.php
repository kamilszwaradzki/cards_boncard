<div>
<h1>Edit Card {{$card->id}}</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="POST" action="/cards/{{$card->id}}">
    @csrf
    @method('PUT')

    <label for="card_number">Card Number</label>

    <input id="card_number"
        name="card_number"
        type="text"
        class="@error('card_number') is-invalid @enderror"
        value="{{ old('card_number', $card->card_number) }}">

    <label for="PIN">PIN</label>

    <input id="PIN"
        name="PIN"
        type="text"
        class="@error('PIN') is-invalid @enderror"
        value="{{ old('card_number', $card->card_number) }}">

    <label for="active_date">Active Date</label>

    <input id="active_date"
        name="active_date"
        type="datetime-local"
        class="@error('active_date') is-invalid @enderror"
        value="{{ old('active_date', $card->active_date) }}">

    <label for="expiry_date">Expiry Date</label>

    <input id="expiry_date"
        name="expiry_date"
        type="date"
        class="@error('expiry_date') is-invalid @enderror"
        value="{{ old('expiry_date', $card->expiry_date) }}">

    <label for="saldo">Saldo</label>

    <input id="saldo"
        name="saldo"
        type="text"
        class="@error('saldo') is-invalid @enderror"
        value="{{ old('saldo', $card->saldo) }}">
    <input type="submit" value="Send">
</form>
</div>