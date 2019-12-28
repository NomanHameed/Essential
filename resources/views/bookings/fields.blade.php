<div class="form-group row">
    <label class="col-sm-2 col-form-label" for="room_id">Room</label>
    <div class="col-sm-10">
        <select name="room_id" id="room_id" class="form-control" required>
            @foreach($rooms as $id => $display)
                <option value="{{ $id }}" {{ (isset($booking->room_id) && $id === $booking->room_id) ? 'selected' : ''}}>{{ $display }}</option>
            @endforeach
        </select>
        <small class="form-text text-muted">The room number being booked</small>
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-2 col-form-label" for="user_id">User</label>
    <div class="col-sm-10">
        <select name="user_id" id="user_id" class="form-control" required>
            @foreach($users as $id => $display)
                <option value="{{ $id }}" {{ (isset($bookingsUsers->user_id) && $id === $bookingsUsers->user_id) ? 'selected' : '' }}>{{ $display }}</option>
            @endforeach
        </select>
        <small class="form-text text-muted">The user booking the room.</small>
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-2 col-form-label" for="start">Start Date</label>
    <div class="col-sm-10">
        <input name="start" type="date" class="form-control" required
               placeholder="yyyy-mm-dd" value="{{ $booking->start ?? '' }}" />
        <small class="form-text text-muted">The start date for booking.</small>
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-2 col-form-label" for="end">End Date</label>
    <div class="col-sm-10">
        <input name="end" type="date" class="form-control" required
               placeholder="yyyy-mm-dd" value="{{ $booking->end ?? '' }}" />
        <small class="form-text text-muted">The end date for booking.</small>
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-2">Paid Options</div>
    <div class="col-sm-10">
        <div class="form-check">
            <input type="checkbox"  name="is_paid" class="form-check-input" value="1" {{ $booking->is_paid ? 'checked' : '' }}>
            <label class="form-check-label" for="start">Pre-Paid</label>
            <small class="form-text text-muted">For Booking is being pre-paid.</small>
        </div>
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-2 col-form-label" for="notes">Notes</div>
    <div class="col-sm-10">
        <input type="text" name="notes" class="form-control" placeholder="Notes" value="{{ $booking->notes ?? '' }}">
        <small class="form-text text-muted">Any Note for booking.</small>
    </div>
</div>
<input type="hidden" name="is_reservation" value="1">
@csrf
