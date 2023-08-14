@extends("layouts.master")
@section("page-content")
<form action="{{ route("leaves.update",$leave->id)}}" method="POST">
    @csrf
    @method("put")
    <div class="form-group">
      <label for="leave_name">New Leave Name</label>
      <input type="leave_name" class="form-control @error("leave_name")
      is-invalid
      @enderror" id="leave_name" name="leave_name" placeholder="Leave Name" value="{{old("leave_name",$leave->leave_name)}}">
      <x-hint-error name="leave_name"/>
    </div>
    <br>
    <div class="form-group">
      <label for="leave_description">New Leave Description</label>
      <textarea class="form-control @error("leave_description")
          is-invalid
      @enderror" id="leave_description" name="leave_description" rows="2" placeholder="Leave Description" >{{old("leave_description",$leave->leave_description)}}</textarea>
      <x-hint-error name="leave_description"/>
    </div>
    <br>
    <button type="submit" class="btn btn-secondary" style="background: gray;padding-left:30px;padding-right: 30px "><i class="bi bi-pen"></i></button>
  </form>

@endsection