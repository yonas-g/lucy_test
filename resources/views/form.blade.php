@extends('layouts.app')

@section('content')
@isset($error)
<div class="alert alert-danger">
    {{$error}}
</div>
@endisset
@isset($success)
<div class="alert alert-success">
    {{$success}}
</div>
@endisset

<h1>/Post Material Here</h1>
<div>
   
    <div class="card">
        
        <br>
        <br>
            <form action="/createMaterial" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title" class="form-control"><b>Title:</b></label>
                    <input type="text" name="title" class="form-control">
                </div>
                    <div class="form-group">
            
                        <label for="description" class="form-control"><b>Description:<b></label>
                        <input type="text" name="description" class="form-control">
                    </div>
                    <div>
                        <label for="type" class="form-control">Type:</label>
                        <input type="text" name="type" class="form-control" >
                    </div>
                    <div class="form-group">
                            <label for="fee" class="form-control"><b>Amount:<b></label>
                            <input type="number" name="fee" min="1"  class="form-control">
                     </div>
                      <div class="form-group">
                        <label for="cover_image" class="form-control"><b>Profile:<b></label>
                        <input type="file" name="cover_image" id="">
                     </div>
                     <input type="submit" value="Submit" class="btn btn-success">
                           
                    </form>
                    <br>        
            </div>
    </div>
   
@endsection