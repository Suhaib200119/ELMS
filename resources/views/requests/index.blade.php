@extends("layouts.master")
@section("css")
    <style>
        form{
            display: inline-block;
        }
    </style>
@endsection
@section("page-content")
<table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">useranme</th>
        <th scope="col">type</th>
        <th scope="col">start date</th>
        <th scope="col">end date</th>
        <th scope="col">duration</th>
        <th scope="col">approve - deny</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($leaves_requests as $item)
        <tr>
            <th scope="row">{{$item->user->name}}</th>
            <td>{{$item->leave->leave_name}}</td>
            <td>{{$item->start_date}}</td>
            <td>{{$item->end_date}}</td>
            <td>{{$item->days_count}}</td>
            <td>
                <form action="{{route("responseOnRequest",$item->id)}}" method="post">
                    @csrf
                    @method("put")
                    <input type="hidden" name="response" value="Approve">
                    <button type="submit" class="btn btn-primary" style="background-color: #0077b6">Approve</button>
                </form>
                <form action="{{route("responseOnRequest",$item->id)}}" method="post">
                    @csrf
                    @method("put")
                    <input type="hidden"  name="response"  value="Deny">
                    <button type="submit" class="btn btn-danger" style="background-color: #ef233c">Deny</button>
                    <input type="text" name="deny_reason" placeholder="deny reason">
                    @error("deny_reason")
                        <span class="text-danger">field required</span>
                    @enderror

                </form>
            </td>
          </tr>
    @endforeach
    </tbody>
  </table>
@endsection