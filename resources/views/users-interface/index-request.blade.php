<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>all request</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <div  class="container" style="margin-top: 20px">
       @if (session()->has("success"))
       <div class="alert alert-success">{{session("success")}}</div>
       @endif
        @include("users-interface._navbar")
        <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">type</th>
                <th scope="col">start date</th>
                <th scope="col">end date</th>
                <th scope="col">duration</th>
                <th scope="col">status</th>
                <th>notes</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($leaves_requests as $item)
                <tr>
                    <th scope="row">{{$item->id}}</th>
                    <td>{{$item->leave->leave_name}}</td>
                    <td>{{$item->start_date}}</td>
                    <td>{{$item->end_date}}</td>
                    <td>{{$item->days_count}}</td>
                    <td>{{$item->status}}</td>
                    <td>@if ($item->deny_reason!=null)
                      <span class="text-danger">deny reason</span>
                    @endif{{$item->deny_reason??"no notes"}}</td>
                  </tr>
            @endforeach
            </tbody>
          </table>
    
    </div>
  
</body>
</html>