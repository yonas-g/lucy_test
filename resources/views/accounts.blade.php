@extends('layouts.app')

@section('content')
@isset($error)
<div class="alert alert-danger">
    {{$error}}
</div>
@endisset

<h1>/Accounts</h1>
<div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">MobilePhone</th>
                <th scope="col">balance</th>
                <th scope="col">reservedamount</th>
                <th scope="col">currency</th>
                <th scope="col">creditlimit</th>

            </tr>
        </thead>
        <tbody>
            @isset($accounts)
            @foreach ($accounts as $account)
            <tr>
                <th>{{ $account->id}}</th>
                <td>{{$account->name}}</td>
                <td>{{ $account->mobilephone }}</td>
                <td>{{ $account->balance }}</td>
                <td>{{ $account->reservedamount }}</td>
                <td>{{ $account->currency }}</td>
                <td>{{ $account->creditlimit }}</td> 
            </tr>
                    
            @endforeach
        
          
            @endisset
        </tbody>
    </table>
    <div class="card">
        <h3>Transfer To Other Account</h3>
        <br>
        <br>
            <form action="/transfer" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="who" class="form-control"><b>Your Name</b></label>
                    <input type="text" name="who" class="form-control">
                </div>
                    <div class="form-group">
            
                        <label for="toname" class="form-control"><b>Recivers Name:<b></label>
                        <input type="text" name="toname" class="form-control">
            
            
                    </div>
                    <div class="form-group">
            
                            <label for="fee" class="form-control"><b>Amount:<b></label>
                            
                            <input type="number" name="fee" min="1"  class="form-control">
                
                     </div>
                     <input type="submit" value="Transfer" class="btn btn-success">
                           
                    </form>
                    <br>        
            </div>
    </div>
   
@endsection