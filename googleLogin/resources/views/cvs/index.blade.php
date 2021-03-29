@extends('cvs.layout')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Index</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('cvs.create') }}"> Create New CV</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($cvs as $cv)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $cv->name }}</td>
            <td>{{ $cv->detail }}</td>
            <td>
                <form action="{{ route('cvs.destroy',$cv->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('cvs.show',$cv->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('cvs.edit',$cv->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $cvs->links() !!}
      
@endsection