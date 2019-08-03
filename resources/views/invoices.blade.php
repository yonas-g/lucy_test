@extends('layouts.app')

@section('content')
    @isset($error)
        <div class="alert alert-danger">
            {{$error}}
        </div>
    @endisset

    <h1>Invoices</h1>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Code</th>
                    <th scope="col">From</th>
                    <th scope="col">Sender Phone</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Status</th>
                    <th scope="col">Date</th>
                    <th scope="col">Description</th>
                    <th scope="col">Trace Number</th>
                </tr>
            </thead>
            <tbody>
                @isset($invoices)
                    @foreach ($invoices as $invoice)
                        <tr>
                            <th scope="row">{{ $invoice->id }}</th>
                            <td>{{ $invoice->code }}</td>
                            <td>{{$invoice->fromname}}</td>
                            <td>{{ $invoice->from }}</td>
                            <td>{{ $invoice->amount }}</td>
                            <td>{{ $invoice->status }}</td>
                            <td>{{ \Carbon\Carbon::parse($invoice->date)->format('j F, Y') }}</td>
                            <td>{{ $invoice->description }}</td>
                            <td>{{ $invoice->tracenumber }}</td>
                        </tr>
                    @endforeach
                @endisset
            </tbody>
        </table>
    </div>
@endsection