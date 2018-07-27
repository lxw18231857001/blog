@extends('admin.layout.main')
@section('content')
    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-10 col-xs-6">
                    <div class="box">

                        <!-- /.box-header -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">导入导出页面</h3>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <a href="/admin/files/export">
                                        <button type="submit" class="btn btn-primary">导出</button>
                                    </a>

                                    {{--<a href="/admin/files/import">
                                        <button type="submit" class="btn btn-primary">导入</button>
                                    </a>--}}
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <!-- form start -->
                            <form role="form" action="/admin/files/import" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                                <div class="box-body">
                                    {{--<div class="form-group">
                                        <label for="exampleInputEmail1">用户名</label>
                                        <input type="text" class="form-control" name="name">
                                    </div>--}}
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">文件导入</label>
                                        <input type="file"  placeholder="" name="file">
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">导入</button>
                                </div>
                            </form>
                            @include('layout.error')
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection