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
                  <h3 class="card-title">Update Permission</h3>
               </div>
               <form action="{{ route('admin.roles.update',$permission->id)}}" method="POST">
                  @csrf
                  @method('PATCH')
                  <div class="card-body">
                     <div class="form-group">
                        <label for="permission">Update permission</label>
                        <input type="text" class="form-control" name="name" id="permission" placeholder="permission" value="{{ $permission->name}}">
                     </div>
                     <button type="submit" class="btn btn-primary">Update</button>
               </form>
               </div>
            </div>
            <!-- /.card -->
         </div>
      </div>

      <div class="card card-default">
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
                     <select class="duallistbox" multiple="multiple">
                       @foreach($groups as $g)
                          <option value="{{ $g->id }}" @if(\App\Models\Permission::check($subject->id,$g->id)) selected @endif> {{ $g->name }}</option>
                       @endforeach
                     </select>
                  </div>
               </div>
            </div>
         </div>
      </div>

</section>
</div>
@endsection