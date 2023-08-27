@extends('layouts.master')
@section('css')

@endsection
@section('page-content')
<a class="btn btn-primary" style="float: right;padding-left:30px;padding-right: 30px " href="{{ route('users.create') }}"><i class="bi bi-plus-circle-dotted"></i> </a>
<br>
<br>

@if (session()->has("success"))
<div class="alert alert-success">
    {{session("success")}}
</div>
@endif
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">eamil</th>
                <th scope="col">type</th>
                <th scope="col">operations</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
                <tr>
                    <th scope="row">{{ $employee->id }}</th>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->user_type }}</td>
                    <td>
                        <a class="btn btn-secondary" href="{{ route('users.edit', $employee->id) }}"><i
                                class="bi bi-pen"></i></a>
                                <form style="display: inline-block" action="{{ route('users.destroy', $employee->id) }}" method="post">
                                @csrf
                                @method("delete")
                                <button type="submit" class="btn btn-danger" style="background:#d62828"><i
                                    class="bi bi-trash"></i></button>
                                </form>
                                <a class="btn btn-secondary" href="{{ route('roles_users.create',["user_id"=>$employee->id]) }}">Add Role</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{$employees->links()}}
@endsection
@section('js')
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
@endsection
