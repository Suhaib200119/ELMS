@extends("layouts.master")
@section("page-content")

      <form action="{{route("roles_users.store")}}" method="post">
            @csrf
            @foreach ($roles as $role)
            {{$role->role_name}} <input type="checkbox" value="{{$role->id}}" name="roles[]">
            <br>
            @endforeach
            <input type="hidden" name="user_id" value="{{$user_id}}">
            <button type="submit" class="btn btn-secondary" style="background: gray;padding-left:30px;padding-right: 30px "><i
                  class="bi bi-plus-circle-dotted"></i></button>
      </form> 
@endsection