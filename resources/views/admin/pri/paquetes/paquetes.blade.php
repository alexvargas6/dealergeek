@extends('admin.nav.all')
@section('cont')
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Paquete</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#mediumModal">
                                Añadir
                            </button>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.pri.paquetes.modalAdd')
<div class="content">
    <div class="animated fadeIn">
        <div class="row">

            @if (\Session::has('success'))
            <div class="alert alert-success">
                <ul>
                    <li>{!! \Session::get('success') !!}</li>
                </ul>
            </div>
            @endif
            @if (\Session::has('ERROR'))
            <div class="alert alert-warning">
                <ul>
                    <li>{!! \Session::get('ERROR') !!}</li>
                </ul>
            </div>
            @endif

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-2">
                                <i class="pe-7s-cart"></i>
                            </div>
                         
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Tabla de productos</strong>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                
                                @include('admin.pri.paquetes.modalMod')
                                <tr>
                                    <td>111</td>
                                    
                                    
                                </tr>
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scr')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="{{asset('assets/js/lib/data-table/datatables.min.js')}}"></script>
<script src="{{asset('assets/js/lib/data-table/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/lib/data-table/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/js/lib/data-table/buttons.bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/lib/data-table/jszip.min.js')}}"></script>
<script src="{{asset('assets/js/lib/data-table/vfs_fonts.js')}}"></script>
<script src="{{asset('assets/js/lib/data-table/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/js/lib/data-table/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/js/lib/data-table/buttons.colVis.min.js')}}"></script>
<script src="{{asset('assets/js/init/datatables-init.js')}}"></script>


<script type="text/javascript">
    $(document).ready(function() {
        $('#bootstrap-data-table-export').DataTable();
    });
</script>