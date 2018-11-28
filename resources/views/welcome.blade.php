@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h4>Thank you,  {{ $user->name }}</h4>
            </div>
        </div>
    </div>
@endsection
