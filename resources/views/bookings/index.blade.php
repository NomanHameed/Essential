@extends('layouts.app')

@section('button')
    <a href="{{ route('bookings.create')  }}" class="btn btn-primary" role="button">Add new Booking</a>
@endsection

@section('content')

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Room</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Reservation</th>
                <th>Paid</th>
                <th>Started</th>
                <th>Paused</th>
                <th class="Actions">Actions</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @forelse($bookings as $booking)
                <tr>
                    <td>{{ $booking->id }}</td>
                    <td>{{ $booking->room->number }} {{ $booking->room->RoomType->name }}</td>
                    <td>{{ date('F d, Y', strtotime($booking->start)) }}</td>
                    <td>{{ date('F d, Y', strtotime($booking->end)) }}</td>
                    <td>{{ $booking->is_reservation ? 'Yes' : 'No'  }} </td>
                    <td>{{ $booking->is_paid ? 'Yes' : 'No'  }} {{ $booking->is_paid }}</td>
                    <td>{{ (strtotime($booking->start) < time()) ? 'Yes' : 'No' }}</td>
                    <td>{{ (strtotime($booking->end) < time()) ? 'Yes' : 'No' }}</td>
                    <td class="actions">
                        <a href="{{ action('BookingController@show' , ['booking'=> $booking->id]) }}" alt="view" title="View">View</a>
                        <a href="{{ action('BookingController@edit', ['booking' => $booking->id]) }}"
                        alt="Edit" title="Edit">Edit</a>
                    </td>
                    <td>
                        <form action="{{ action('BookingController@destroy', ['booking' => $booking->id]) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button value="Delete" title="Delete" type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>

                </tr>
            @empty
            @endforelse
        </tbody>
    </table>
    {{ $bookings->links() }}
@endsection
