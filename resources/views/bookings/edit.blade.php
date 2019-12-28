@extends('layouts.app')

@section('content')
    <div class="col">
        <form action="{{ route('bookings.update', ['booking' => $booking]) }}" method="post">
            @method('PUT')

            @include('bookings.fields')

            <div class="form-group row">
                <div class="col-sm-3">
                    <button class="btn btn-primary" type="submit">Add Reservation</button>
                </div>
                <div class="col-sm-9">
                    <a href="{{ route('bookings.index') }}" class="btn btn-secondary">Cancle</a>
                </div>
            </div>
        </form>
    </div>
@endsection
