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
                <h3 class="card-title">Update Role</h3>
                </div>

                <form action="{{ route('admin.roles.update',$role->id)}}" method="POST">
                  @csrf
                  @method('PATCH')
                <div class="card-body">
                  <div class="form-group">
                   <label for="role">Update role</label>
                    <input type="text" class="form-control" name="name" id="role" placeholder="role" value="{{ $role->name}}">
                  </div>
               
                	<button type="submit" class="btn btn-primary">Update</button>
                
                </form>
                </div>
            
            </div>
            <!-- /.card -->

            <!-- /.card-header -->
              <div class="">

                <div class="card card-info m-3">
                <div class="card-header">
                <h3 class="card-title">Role permissions</h3>
                  @if($role->permission)
                    @foreach($role->permissions as $rp)
                        <span class="btn btn-danger">{{ $rp->name }}</span>
                    @endforeach
                  @endif
                </div>

                <form action="{{ route('admin.roles.permissions',$role->id)}}" method="POST">
                  @csrf
                <div class="card-body">
                  <div class="form-group">
                      <label>Permissions</label><br />
                      <select class="form-control select2" name="permission " id="faculty_id">
                          @foreach($permission as $p)
                          <option value = "{{ $p->name }}" >
                              {{ $p->name }}
                          </option>
                          @endforeach
                      </select>

                  </div>

                  <button type="submit" class="btn btn-info">Update</button>
                
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

 <!-- <div class="card card-default">
         <div class="card-header">
            <h3 class="card-title">Bootstrap Duallistbox</h3>
            <div class="card-tools">
               <button type="button" class="btn btn-tool" data-card-widget="collapse">
               <i class="fas fa-minus"></i>
               </button>
               <button type="button" class="btn btn-tool" data-card-widget="remove">
               <i class="fas fa-times"></i>
               </button>
            </div>
         </div>
         <div class="card-body">
            <div class="row">
               <div class="col-12">
                  <div class="form-group">
                   
                     <label>Multiple</label>
                     <select class="duallistbox" multiple="multiple" name="">
                      
                     </select>
                  </div>
               </div>
            </div>
         </div>
      </div>
  </form> -->