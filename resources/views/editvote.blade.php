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
            <div class="portlet light ">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-equalizer font-red-sunglo"></i>
                        <span class="caption-subject font-red-sunglo bold uppercase">Edit Vote</span>
                    </div>
                </div>
                <div class="col-md-6 ">
                    @if($errors->any())
                        <h4 style="color: green;">{{$errors->first()}}</h4>
                    @endif
                </div>
                <div class="portlet-body form">
                    <form action="{{route('editvote')}}" method="post" class="form-horizontal">
                        @csrf
                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label">question</label>
                                <div class="col-md-4">
                                    <input type="text" name="question" value="{{$vote->question}}" class="form-control"
                                           placeholder="Enter question">
                                    <input type="hidden" name="id" value="{{$vote->id}}" class="form-control" required>

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">company</label>
                                <div class="col-md-4">
                                    <input type="text" name="company" value="{{$vote->company}}" class="form-control"
                                           placeholder="Enter company">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">start_at</label>
                                <div class="col-md-4">
                                    <input type="datetime-local" name="start_at" value="{{$vote->start_at}}"
                                           class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">end_at</label>
                                <div class="col-md-4">
                                    <input type="datetime-local" name="end_at" value="{{$vote->end_at}}"
                                           class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">is_active</label>
                                <div class="col-md-4">
                                    <input type="checkbox" name="is_active" value="{{$vote->is_active}}"
                                           class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">type</label>
                                <div class="col-md-4">
                                    <input type="text" name="type" value="{{$vote->type}}" class="form-control">
                                </div>
                            </div>

                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-4">
                                    <button type="submit" class="btn green">Submit</button>
                                    <button type="button" class="btn default">Cancel</button>
                                </div>

                            </div>

                        </div>
                    </form>
                    <!-- END FORM-->
                </div>
            </div>

        </div>
    </div>
    @include('includes.footer')
@endsection
