@extends('layouts.app')

@section('content')
    @isset($error)
        <div class="alert alert-danger">
            {{$error}}
        </div>
    @endisset

    <h1>/WelCome </h1>
    @isset($materials)
        @foreach ($materials as $material)
            <div class="container">
                <table>

                    <tr>
                        
                            <img style="width:100%" src="/storage/cover_images/{{$material->picture}}" alt="NOIMAGE">
                        
                    </tr>
                    <tr>
                        <td>{{$material->title}}</td>
                        <td></td>
                        <td><b>Price:</b></td>
                        <td>{{$material->fee}}</td>
                     
                    </tr>
                    <tr>
                        <td></td>
                            <td>
                                    <form action="/buy/{{$material->fee}}" method="POST">
                                        {{ csrf_field() }}                                        <input type="submit" value="BUY" class="btn btn-success">
                                     </form>
                            </td>

                    </tr>
                   
                </table>
            </div>
        @endforeach
    @endisset
@endsection