@extends('layouts.app')

@section('content')
    <div class="container">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <p>{{ $message }}</p>
            </div>
        @endif

        <form action="{{route('message_send')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="message">Message:</label>
                <textarea class="form-control" rows="5" id="message" name="message"></textarea>
                <!-- Error -->
                @if ($errors->has('message'))
                    <div class="error">
                       <span class="text-danger">{{ $errors->first('message') }}</span>
                    </div>
                @endif
            </div>
                <button type="submit" class="btn btn-success" >Send</button>
        </form>
    </div>
@endsection
