@extends('adminsuper.layouts.admin')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{__('messages.users.title')}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">{{__('messages.home')}}</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('users.index') }}">{{__('messages.users.title')}}</a></li>
                        <li class="breadcrumb-item active">{{__('messages.users.user_create')}}</li>
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
                        <h3 class="card-title">{{__('messages.users.user_create')}}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <form action="{{ route('users.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>{{__('messages.users.fullname')}}</label>
                                <input type="text" name="name"
                                       class="form-control {{ $errors->has('name') ? "is-invalid":"" }}"
                                       value="{{ old('name') }}" required>
                                @if($errors->has('name'))
                                    <span class="error invalid-feedback">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>{{__('messages.users.email')}}</label>
                                <input type="text" name="email"
                                       class="form-control {{ $errors->has('email') ? "is-invalid":"" }}"
                                       value="{{ old('email') }}" required>
                                @if($errors->has('email'))
                                    <span class="error invalid-feedback">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>{{__('messages.login')}}</label>
                                <input type="text" name="login"
                                       class="form-control {{ $errors->has('login') ? "is-invalid":"" }}"
                                       value="{{ old('login') }}" required>
                                @if($errors->has('login'))
                                    <span class="error invalid-feedback">{{ $errors->first('login') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>{{__('messages.roles.title')}}</label>
                                <select class="select2" multiple="multiple" name="roles[]"
                                        data-placeholder="@lang('pleaseSelect')" style="width: 100%;">
                                    @foreach($roles as $role)
                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>{{__('messages.password')}}</label>
                                <input type="password" name="password" id="password-field"
                                       class="form-control {{ $errors->has('password') ? "is-invalid":"" }}" required>
                                <span toggle="#password-field"
                                      class="fa fa-fw fa-eye toggle-password field-icon"></span>
                                @if($errors->has('password'))
                                    <span class="error invalid-feedback">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>{{__('messages.confirm_password')}}</label>
                                <input id="password-confirm" type="password" class="form-control"
                                       name="password_confirmation" required autocomplete="new-password">
                                <span toggle="#password-confirm"
                                      class="fa fa-fw fa-eye toggle-password field-icon"></span>
                                @if($errors->has('password_confirmation'))
                                    <span
                                        class="error invalid-feedback">{{ $errors->first('password_confirmation') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success float-right">{{__('messages.save')}}</button>
                                <a href="{{ route('users.index') }}" class="btn btn-danger float-left">{{__('messages.cancel')}}</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
