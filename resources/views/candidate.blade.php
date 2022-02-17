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
                <div class="col-lg-12 col-xs-12 col-sm-12">
                    <div class="portlet light ">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-bubble font-dark hide"></i>
                                <span class="caption-subject font-hide bold uppercase">Candidates</span>
                            </div>

                        </div>
                        <div class="portlet-body">
                            <div class="row">
                                    <div class="btn-group">
                                        <a href="/candidate/add/{{$vote_id}}" id="sample_editable_1_new" class="btn green"> Add New
                                            <i class="fa fa-plus"></i>
                                        </a>

                                    </div>
                                @foreach($candidate as $mycandidate)
                                <div class="col-md-4">
                                    <div class="mt-widget-1">
                                        <div class="mt-icon">
                                                <a href="/candidate/edit/{{$mycandidate->id}}" ><i style="color: green" class="icon-settings"></i></a>
                                            <a href="/candidate/delete/{{$mycandidate->id}}" > <i style="color: red" class="icon-close"></i></a>

                                        </div>

                                        <div class="mt-img">
                                            <img src="{{$mycandidate->photo}}" height="100px" width="100px"></div>
                                        <div class="mt-body">
                                            <h3 class="mt-username">{{$mycandidate->name}}</h3>
                                            <div class="mt-stats">
                                                <div class="btn-group btn-group btn-group-justified">
                                                    <a href="javascript:;" class="btn font-yellow">
                                                        <i class="icon-emoticon-smile"></i> {{$mycandidate->vote_precentage}} </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @include('includes.footer')
@endsection
