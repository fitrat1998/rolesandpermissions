@extends('adminsuper.layouts.admin')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Foydalanuvchilar</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Bosh sahifa</a></li>
                        <li class="breadcrumb-item active">Foydalanuvchilar</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Foydalanuvchilar</h3>
                        @can('user.add')
                            <a href="{{ route('users.create') }}" class="btn btn-success btn-sm float-right">
                                <span class="fas fa-plus-circle"></span> Qo'shish
                            </a>
                        @endcan
                    </div>
                    <div class="card-body">
                        <table id="dataTable"
                               class="table table-bordered table-striped dataTable dtr-inline table-responsive-lg">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>FISH</th>
                                <th>Login</th>
                                <th>Rollar</th>
                                <th>Ruxsatlar</th>
                                <th class="w-25">Amallar</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->login }}</td>
                                    <td>
                                        @foreach($user->roles as $role)
                                            <span class="badge badge-primary">{{ $role->name }}</span>
                                        @endforeach
                                    </td>

                                    <td>
                                        @foreach($user->getAllPermissions() as $permission)
                                            <span class="badge badge-info">{{ $permission->name }}</span>
                                        @endforeach
                                    </td>


                                    <td class="text-center">
                                        @can('user.delete')
                                            <form action="{{ route('users.destroy', $user->id) }}" method="post">
                                                @csrf
                                                <div class="btn-group">
                                                    @can('user.edit')
                                                        <a href="{{ route('users.edit', $user->id) }}"
                                                           class="btn btn-primary btn-sm">
                                                            <i class="fa-solid fa-edit"></i>
                                                        </a>
                                                    @endcan
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                            onclick="if (confirm('Ishonchingiz komilmi?')) { this.form.submit() }">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button>
                                                </div>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
