@extends('layouts.master')
@section('page-content')

    <form action="{{ route('users.update',$user->id) }}" method="POST">
        @csrf
        @method("put")
        <div class="form-group">
            <label for="name">New Name</label>
            <input type="name" class="form-control @error('name')
      is-invalid
      @enderror" id="name"
                name="name" placeholder="user name" value="{{old('name',$user->name)}}">
            <x-hint-error name="name" />
        </div>
        <br>
        <div class="form-group">
            <label for="email">New Email</label>
            <input type="email" class="form-control @error('email')
        is-invalid
        @enderror" id="email"
                name="email" placeholder="email" value="{{old('name',$user->email)}}" >
            <x-hint-error name="email" />
        </div>
        <br>
        <div class="form-group">
            <label for="type">New User Type</label>
            <select name="user_type" class="form-select" aria-label="Default select example">
                <option value="Employee">Employee</option>
                <option value="Administrator">Administrator</option>
            </select>
            <x-hint-error name="type" />
        </div>
        <br>
        <button type="submit" class="btn btn-secondary" style="background: gray;padding-left:30px;padding-right: 30px "><i
                class="bi bi-pen"></i></button>
    </form>
@endsection
