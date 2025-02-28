@extends('admin.index')

@section('content')
  <div class="content-wrapper">
   <section class="content">
      <div class="container-fluid">
        <div class="row m-1">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Roles</h3>
                <a href="{{ route('admin.roles.create') }}" class="btn btn-success float-right">Add</a>
              </div>
              <div class="card-header">
              	@if(session('success'))
                  <div class="alert alert-success">
                      {{ session('success') }}
                  </div>
                @endif
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Roles</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                     @foreach($roles as $r)
                      <tr>
                        <td>{{ $r->id}}</td>
                        <td>
                             {{ $r->name}}
                        </td>
                        <td class="w-25"><a href="{{ route('admin.roles.edit',$r->id) }}" class="btn btn-primary">Edit</a></td>
                        <form method="POST" action="{{ route('admin.roles.destroy',$r->id) }}" onsubmit="return confirm('Are you sure!!!!')">
                          @csrf 
                          @method('DELETE')
                          
                        <td class="w-25"><button type="submit" class="btn btn-danger">Delete</button></td>
                        </form>
                      </tr>
                    @endforeach
                  
                  </tbody>
                </table>
              </div>
            
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
</section>
</div>
@endsection