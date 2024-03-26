{{--Alert per i flesh messages--}}

@if(session('message'))
<div class="alert alert-{{session('type', 'info')}} alert-dismissible fade show mt-4" role="alert">
    {{session('message')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

{{--Alert per gli errori--}}

@if ($errors->any())
<div class="alert alert-{{session('type', 'danger')}} alert-dismissible fade show mt-4" role="alert">
  <ul>
   @foreach ($errors->all() as $error )
       <li>{{$error}}</li>
   @endforeach
  </ul>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>  
@endif