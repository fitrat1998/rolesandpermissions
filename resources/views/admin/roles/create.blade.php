@extends('admin.index')

@section('content')
  <div class="content-wrapper">
   <section class="content m-3">
      <div class="container-fluid">
        <div class="row m-3">
          <div class="col-md-12 ">
            <div class="card">
             
              <!-- /.card-header -->
              <div class="">

                <div class="card card-primary m-3">
                <div class="card-header">
                <h3 class="card-title">Create Role</h3>
                </div>

                <form action="{{ route('admin.roles.store')}}" method="POST">
                  @csrf
                <div class="card-body">
                  <div class="form-group">
                   <label for="permission">Role</label>
                    <input type="text" class="form-control" name="name" id="role" placeholder="role">
                  </div>
                  @error('name')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                  <br/>

               
                  <button type="submit" class="btn btn-primary">Create</button>
                
                </form>
                </div>
            
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
</section>
</div>
@endsection