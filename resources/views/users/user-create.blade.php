@extends('layouts.master')
@section('page-content')
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">name</label>
            <input type="name" class="form-control @error('name')
      is-invalid
      @enderror" id="name"
                name="name" placeholder="user name" value="{{ old('name') }}">
            <x-hint-error name="name" />
        </div>
        <br>
        <div class="form-group">
            <label for="email">email</label>
            <input type="email" class="form-control @error('email')
        is-invalid
        @enderror" id="email"
                name="email" placeholder="email" value="{{ old('email') }}">
            <x-hint-error name="email" />
        </div>
        <br>
        <div class="form-group">
            <label for="type">user type</label>
            <select name="user_type" class="form-select" aria-label="Default select example">
                <option value="Administrator">Administrator</option>
                <option value="Employee">Employee</option>
            </select>
            <x-hint-error name="type" />
        </div>
        <br>
        <button type="submit" class="btn btn-secondary" style="background: gray;padding-left:30px;padding-right: 30px "><i
                class="bi bi-plus-circle-dotted"></i></button>
    </form>
@endsection
