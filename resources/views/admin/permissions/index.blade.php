@extends('admin.index')

@section('content')
  <div class="content-wrapper">
   <section class="content">
      <div class="container-fluid">
        <div class="row m-1">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Permissions</h3>
                <a href="{{ route('admin.permissions.create')}}" class="btn btn-success float-right">Add</a>

                
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
                      <th>Permissions</th>
                      <th>Edit</th>
                      <th>Delete</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                     @foreach($permissions as $p)
                      <tr>
                        <td>{{ $p->id}}</td>
                        <td>
                             {{ $p->name}}
                        </td>
                        <td class="w-25"><a href="{{ route('admin.permissions.edit',$p->id) }}" class="btn btn-primary">Edit</a></td>
                        
                        <form method="POST" action="{{ route('admin.permissions.destroy',$p->id) }}" onsubmit="return confirm('Are you sure!!!!')">
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