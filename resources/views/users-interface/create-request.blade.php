<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>add request</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <div class="container" style="margin-top: 20px">
    @include("users-interface._navbar")
        <form action="{{ route("storeRequest_user") }}" method="post">
            @csrf
            <label for="leave_type" class="form-label">Leave Type</label>
            <select class="form-select" name="leave_type" aria-label="Default select example">
                @foreach ($leaves_types as $leave)
                <option value="{{$leave->id}}">{{$leave->leave_name}}</option>
                @endforeach
              </select>
            <div class="mb-3">
                <label for="start_date" class="form-label">Start Date</label>
                <input type="date" class="form-control @error("start_date")
                is-invalid
            @enderror" id="start_date" name="start_date">
                @error("start_date")
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
    
            <div class="mb-3">
                <label for="end_date" class="form-label">End Date</label>
                <input type="date" class="form-control @error("end_date")
                    is-invalid
                @enderror" id="end_date" name="end_date">
                @error("end_date")
                <p class="text-danger">{{$message}}</p>
            @enderror
            </div>
            <button type="submit" class="btn btn-primary" style="background-color: #0077b6">Submit</button>
        </form>
    </div>
  
</body>
</html>