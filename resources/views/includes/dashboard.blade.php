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
                    <span>Dashboard</span>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat2 ">
                    <div class="display">
                        <div class="number">
                            <h3 class="font-green-sharp">
                                <span data-counter="counterup" data-value="{{$total_vote}}">0</span>
                            </h3>
                            <small>Total Vote</small>
                        </div>
                        <div class="icon">
                            <i class="icon-pie-chart"></i>
                        </div>
                    </div>
                    <div class="progress-info">
                        <div class="progress">
                                        <span style="width: {{$total_vote}}%;"
                                              class="progress-bar progress-bar-success green-sharp">
                                            <span class="sr-only">{{$total_vote}}% progress</span>
                                        </span>
                        </div>
                        <div class="status">
                            <div class="status-title"> progress</div>
                            <div class="status-number"> {{$total_vote}}%</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat2 ">
                    <div class="display">
                        <div class="number">
                            <h3 class="font-red-haze">
                                <span data-counter="counterup" data-value="{{$total_vote_users}}">0</span>
                            </h3>
                            <small>Total Voted User</small>
                        </div>
                        <div class="icon">
                            <i class="icon-like"></i>
                        </div>
                    </div>
                    <div class="progress-info">
                        <div class="progress">
                                        <span style="width: {{$total_vote_users}}%;"
                                              class="progress-bar progress-bar-success red-haze">
                                            <span class="sr-only">{{$total_vote_users}}% change</span>
                                        </span>
                        </div>
                        <div class="status">
                            <div class="status-title"> change</div>
                            <div class="status-number"> {{$total_vote_users}}%</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat2 ">
                    <div class="display">
                        <div class="number">
                            <h3 class="font-purple-soft">
                                <span data-counter="counterup" data-value="{{$total_candidate}}"></span>
                            </h3>
                            <small>Total Candidate</small>
                        </div>
                        <div class="icon">
                            <i class="icon-user"></i>
                        </div>
                    </div>
                    <div class="progress-info">
                        <div class="progress">
                                        <span style="width: {{$total_candidate}}%;"
                                              class="progress-bar progress-bar-success purple-soft">
                                            <span class="sr-only">{{$total_candidate}}% change</span>
                                        </span>
                        </div>
                        <div class="status">
                            <div class="status-title"> change</div>
                            <div class="status-number"> {{$total_candidate}}%</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-xs-12 col-sm-12">
                <div class="portlet light ">
                    <div class="portlet-title tabbable-line">
                        <div class="caption">
                            <i class="icon-bubbles font-dark hide"></i>
                            <span class="caption-subject font-dark bold uppercase">Latest Additions</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="portlet_comments_1">
                                @foreach($vote as $myvote)
                                    <div class="mt-comments">
                                        <div class="mt-comment">

                                            <div class="mt-comment-body">
                                                <div class="mt-comment-info">
                                                    <span class="mt-comment-author">{{$myvote->question}}</span>
                                                    <span
                                                        class="mt-comment-date">End vote at {{\Carbon\Carbon::parse($myvote->end_at)->toDayDateTimeString()}}</span>
                                                </div>
                                                <div class="mt-comment-text"> Number of Voters
                                                    :{{\App\Models\UserVote::where('vote_id',$myvote->id)->count()}}</div>
                                            </div>
                                        </div>

                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xs-12 col-sm-12">
                <div class="portlet light ">
                    <div class="portlet-title tabbable-line">
                        <div class="caption">
                            <i class=" icon-social-twitter font-dark hide"></i>
                            <span class="caption-subject font-dark bold uppercase">Most Shared</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_actions_pending">
                                <!-- BEGIN: Actions -->
                                <div class="mt-actions">
                                    @foreach($most_vote as $most_voted)
                                        <div class="mt-action">
                                            <div class="mt-action-body">
                                                <div class="mt-action-row">
                                                    <div class="mt-action-info ">
                                                        <div class="mt-action-icon ">
                                                            <i class="icon-like"></i>
                                                        </div>
                                                        <div class="mt-action-details ">
                                                            <span
                                                                class="mt-action-author">{{\App\Models\Vote::where('id',$most_voted->vote_id)->first()->question}}</span>
                                                            <p class="mt-action-desc">Number of Voters
                                                                :{{$most_voted->total}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="mt-action-datetime ">
                                                        <span class="mt-action-dot bg-green"></span>
                                                        <span
                                                            class="mt=action-time">{{\Carbon\Carbon::parse(\App\Models\Vote::where('id',$most_voted->vote_id)->first()->end_at)->toDayDateTimeString()}}</span>
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

    </div>
</div>
<a href="javascript:;" class="page-quick-sidebar-toggler">
    <i class="icon-login"></i>
</a>
</div>


@include('includes/footer')


</body>
