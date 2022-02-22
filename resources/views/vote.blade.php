@extends('layouts.app')

@section('content')
    <link href="{{ URL::to('../assets/global/plugins/datatables/datatables.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ URL::to('../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') }}"
          rel="stylesheet" type="text/css"/>
    <div class="page-content-wrapper">
        <div class="page-content">
            <h1 class="page-title"> Admin Dashboard
            </h1>
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <i class="icon-home"></i>
                        <a href="{{url('/home')}}">Home</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <span>Tables</span>
                        <i class="fa fa-angle-right"></i>

                    </li>
                    <li>
                        <a href="{{url('/vote')}}">Vote</a>
                    </li>

                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet light ">
                        <div class="portlet-title">
                            <div class="caption font-dark">
                                <i class="icon-settings font-dark"></i>
                                <span class="caption-subject bold uppercase"> Vote Table</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="table-toolbar">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="btn-group">
                                            <a id="sample_editable_1_new" href="/vote/add" class="btn sbold green"> Add
                                                New
                                                <i class="fa fa-plus"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-striped table-bordered table-hover table-checkable order-column"
                                   id="vote_tbl">

                                <thead>
                                <tr>
                                    <th>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="group-checkable"
                                                   data-set="#sample_1 .checkboxes"/>
                                            <span></span>
                                        </label>
                                    </th>
                                    <th> Question</th>
                                    <th> Company</th>
                                    <th> Start_at</th>
                                    <th> End_at</th>
                                    <th> Is_active</th>
                                    <th> Type</th>
                                    <th>Candidates</th>
                                    <th> Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <div class="bootstrap-switch-container" style="width: 156px; margin-left: 0px;">
                                    <input type="checkbox" class="make-switch"
                                           checked="" data-on-color="danger"
                                           data-off-color="default"></div>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>


        </div>
    </div>
    @include('includes.footer')

@endsection

@section('js')
    <script src="{{ URL::to('../assets/global/scripts/datatable.js') }}" type="text/javascript"></script>
    <script src="{{ URL::to('../assets/global/plugins/datatables/datatables.min.js') }}"
            type="text/javascript"></script>
    <script src="{{ URL::to('../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}"
            type="text/javascript"></script>

    <script src="{{ URL::to('../assets/pages/scripts/table-datatables-managed.min.js') }}"
            type="text/javascript"></script>
    <script type="text/javascript">
        $(function () {

            var table = $('#vote_tbl').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('votes.list') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'question', name: 'question'},
                    {data: 'company', name: 'company'},
                    {data: 'start_at', name: 'start_at'},
                    {data: 'end_at', name: 'end_at'},
                    {data: 'is_active', name: 'is_active'},
                    {data: 'type', name: 'type'},
                    {
                        data: 'Candidates',
                        url: '/candidates/id',
                        name: 'Candidates',
                    }, {
                        data: 'action',
                        url: '/vote/edit/id',
                        name: 'action',
                        orderable: true,
                        searchable: true
                    },
                ]
            });

        });
    </script>
@stop
