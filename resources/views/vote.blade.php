@extends('layouts.app')

@section('content')
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
                    <div class="portlet light portlet-fit ">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-settings font-red"></i>
                                <span class="caption-subject font-red sbold uppercase">Vote Table</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="table-toolbar">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="btn-group">
                                            <a href="/vote/add" id="sample_editable_1_new" class="btn green"> Add New
                                                <i class="fa fa-plus"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                                <thead>
                                <tr>
                                    <th> Id</th>
                                    <th> Question</th>
                                    <th> Company</th>
                                    <th> Start_at</th>
                                    <th> End_at</th>
                                    <th> Is_active</th>
                                    <th> Type</th>
                                    <th>Candidates</th>
                                    <th> Edit</th>
                                    <th> Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($vote as $myvote)
                                    <tr>
                                        <td> {{$myvote->id}} </td>
                                        <td> {{$myvote->question}} </td>
                                        <td> {{$myvote->company}} </td>
                                        <td> {{\Carbon\Carbon::parse($myvote->start_at)->format('d-m h:m')}} </td>
                                        <td> {{\Carbon\Carbon::parse($myvote->end_at)->format('d-m h:m')}} </td>
                                        <td> {{$myvote->is_active }} </td>
                                        <td> {{$myvote->type}} </td>
                                        <td><a class="candidates" href="/candidates/{{$myvote->id}}"> Candidates </a>
                                        </td>
                                        <td>
                                            <a class="edit" href="/vote/edit/{{$myvote->id}}" style="color: green"> Edit </a>
                                        </td>
                                        <td>
                                            <a class="delete" href="/vote/delete/{{$myvote->id}}" style="color: red"> Delete </a>
                                        </td>
                                    </tr>
                                @endforeach
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
