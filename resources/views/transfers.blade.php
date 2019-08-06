@extends('layouts.app')

@section('content')
@isset($error)
<div class="alert alert-danger">
    {{$error}}
</div>
@endisset

<h1>/Transfer</h1>
<div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">From</th>
                <th scope="col">MobilePhone</th>
                <th scope="col">Date</th>
                <th scope="col">Amount</th>
                <th scope="col">Currency</th>
                <th scope="col">Status</th>
                <th scope="col">Trace_number</th>

            </tr>
        </thead>
        <tbody>
            @isset($transfers)
            @foreach ($transfers as $transfer)
            <tr>
                <th>{{ $transfer->id}}</th>
                <td>{{$transfer->fromname}}</td>
                <td>{{ $transfer->from }}</td>
              
                <td>{{ \Carbon\Carbon::parse($transfer->date)->format('j F, Y') }}</td>

                <td>{{ $transfer->amount }}</td>
                <td>{{ $transfer->status }}</td>
                <td>{{ $transfer->currency }}</td>
                {{-- <td>{{$transfer->tracenumber}}</td> --}}
            </tr>
                    
            @endforeach
        
          
            @endisset
        </tbody>
    </table>
</div>
@endsection