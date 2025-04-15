@extends('adminsuper.layouts.admin')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashbord</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Bosh sahifa</a></li>

                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Talabar soni</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="statistics_faculty" class="statistics_faculty_wrapper table table-bordered table-striped statistics_faculty">
                        <thead>
                        <tr>
                            <th>Fakultet</th>
                            <th>Kunduzgi</th>
                            <th>Kechki</th>
                            <th>Sirtqi</th>
                            <th>2-chi Mutaxassislik</th>
                            <th>Jami</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Fakultet 1</td>
                            <td>100</td>
                            <td>120</td>
                            <td>70</td>
                            <td>30</td>
                            <td><span class="total">330</span></td>
                        </tr>
                        <tr>
                            <td>Fakultet 2</td>
                            <td>145</td>
                            <td>155</td>
                            <td>98</td>
                            <td>2</td>
                            <td><span class="total">400</span></td>
                        </tr>
                        <tr>
                            <td>Fakultet 3</td>
                            <td>170</td>
                            <td>250</td>
                            <td>150</td>
                            <td>100</td>
                            <td><span class="total">670</span></td>
                        </tr>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th colspan="5"></th>
                            <th style="text-align: right;">Jami: 1400</th>
                        </tr>
                        </tfoot>
                    </table>


                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
        </div>
        <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>

    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection
