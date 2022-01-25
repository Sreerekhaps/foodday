<x-admin-master>
    @section('content')
    @section('content')
    @section('content')
    @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
            @php
                Session::forget('success');
            @endphp
        </div>
        @endif
   
    <form method="post" action="{{route('cuisine.update',$cuisines->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="container_fluid">
    <div class="row d-flex justify-content-center align-items-center ">
      <div class="col-xl-11">

        <h3 class="text-black mb-4" >Update Cuisine:{{$cuisines->name}}</h3>
        <div class="card" style="border-radius: 15px;">
          <div class="card-body">
        <div class="form-group">
            <label for="name"> Name</label>
            <input type="text" name="name" class="form-control" id="name" area-describedby="" 
            placeholder="Enter name"
            value="{{$cuisines->name}}">
            @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
        </div>
       
</div>
</div>
</section>
        <a href="{{route('cuisine.show')}}">Cancel </a>
        
        
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
<!-- 
    @if(count($errors)> 0)

    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>

    @endif -->

    @endsection
</x-admin-master>