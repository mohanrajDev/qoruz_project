@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Admin Dashboard
                    <a href="{{ route('test.pdf') }}" target="_blank" 
                    class="btn btn-primary float-right">Download PDF</a>
                </div>

                <div class="card-body">                
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Questions</th>
                            <th>Duration</th>
                            <th>Score</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                       <tr>
                           <td> {{ $loop->iteration }}</td>
                           <td> {{ ucwords($user->name) }}</td>
                           <td> {{ $user->email }}</td>
                           <td> {{ $user->phone }}</td>
                           <td> {{ $user->test->questions->count() }}</td>
                           <td> {{ $user->test->duration }}</td>
                           <td> {{ $user->test->score }}</td>
                       </tr>
                    @endforeach
                    </tbody>
                </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
