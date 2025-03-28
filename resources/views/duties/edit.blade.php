@extends('adminsuper.layouts.admin')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{__('messages.departments.title')}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">{{__('messages.home')}}</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('departments.index') }}">{{__('messages.departments.title')}}</a></li>
                        <li class="breadcrumb-item active">{{__('messages.departments.user_create')}}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->

    <section class="content">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{__('messages.departments.department_edit')}}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <form action="{{ route('departments.update',$department->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>{{__('messages.name')}}</label>
                                <input type="text" name="name" class="form-control {{ $errors->has('name') ? "is-invalid":"" }}" value="{{ old('name',$department->name) }}" required>
                                @if($errors->has('name'))
                                    <span class="error invalid-feedback">{{ $errors->first('name') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success float-right">{{__('messages.save')}}</button>
                                <a href="{{ route('departments.index') }}" class="btn btn-danger float-left">{{__('messages.cancel')}}</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
