@extends('admin.layouts.app')

@section('cards')

<section class="section cards">
    <div class="row">
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-3 py-4-5">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card-stasts-primary">
                                <i class="bi bi-person-plus-fill" style="color:#fff"></i>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h6 class="text-muted font-semibold">Followers</h6>
                            <h6 class="font-extrabold mb-0">{{ $followers }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-3 py-4-5">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card-stasts-success">
                                <i class="bi bi-file-earmark-richtext-fill" style="color:#fff"></i>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h6 class="text-muted font-semibold">Posts</h6>
                            <h6 class="font-extrabold mb-0">{{ $totalPosts }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-3 py-4-5">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card-stasts-alert">
                                <i class="bi bi-chat-square-dots-fill"style="color:#fff"></i>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h6 class="text-muted font-semibold">Comments</h6>
                            <h6 class="font-extrabold mb-0">{{ $totalComments }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-3 py-4-5">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card-stasts-danger">
                                <i class="bi bi-eye-fill" style="color:#fff"></i>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h6 class="text-muted font-semibold">Views</h6>
                            <h6 class="font-extrabold mb-0">{{ $totalViews }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Followers</h4>
                    </div>
                    <div class="card-body">
                        <div id="chart-profile-visit"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Followers Profile</h4>
                    </div>
                    <div class="card-body">
                        <div id="chart-visitors-profile"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Latest Comments</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-lg">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Comment</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($latestComments as $comment)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar avatar-md">
                                                    <img src="{{ url('images/'.$comment->author->img) }}">
                                                </div>
                                                <p class="font-bold ms-3 mb-0">{{ $comment->author->name }}</p>
                                            </div>
                                        </td>
                                        <td class="col-auto">
                                            <p class=" mb-0">{{ $comment->content }}</p>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12 ">
                <div class="card">
                    <div class="card-header">
                        <h4>Recent Posts</h4>
                    </div>
                    <div class="card-content pb-4">
                        @foreach ($latestPosts as $post)
                        <div class="recent-message d-flex px-4 py-3">
                            <div class="avatar avatar-lg">
                                <img src="{{ url('images/'.$post->image) }}">
                            </div>
                            <div class="name ms-4">
                                <h5 class="mb-1">{{ $post->title }}</h5>
                                <h6 class="text-muted mb-0">{{ '@'.$post->author->name }}</h6>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>

        </div>

    </div>
    {{-- @foreach ($months as $month){{ $month }}@endforeach --}}
@endsection

@section('scripts')


<script>

var Datafollowers = {{ Js::from($usersPerMonth) }} ;
var DataFollowersProfile = {{ Js::from($followersProfile) }}
// var Dataposts = {{ Js::from($postsPerMonth) }};
// var Datacomments = {{ Js::from($commentsPerMonth) }} ;
// var Dataviews = {{ Js::from($viewsPerMonth) }} ;
var Datamonths = {{ Js::from($months) }} ;


var followers = [];
var followersProfile = [];
// var posts = [];
// var comments = [];
// var views = [];
var months =[];

Datafollowers.forEach(element=>{ followers.push(element);});
DataFollowersProfile.forEach(element=>{ followersProfile.push(Number(element))})
// Dataposts.forEach(element=>{posts.push(element);});
// //Datacomments.forEach(element=>{comments.push(element);});
// Dataviews.forEach(element=>{views.push(element);});
Datamonths.forEach(element=>{ months.push(element);});

//---------------------------------------------------

//-----------------------Graph----------------------------
var optionsProfileVisit = {
	annotations: {
		position: 'back'
	},
	dataLabels: {
		enabled:false
	},
	chart: {
		type: 'bar',
		height: 300
	},
	fill: {
		opacity:1
	},
	plotOptions: {
	},
	series: [{
		name: 'followers',
		data: followers
	}],
	colors: '#435ebe',
	xaxis: {
		categories:months,
	},
}

let optionsVisitorsProfile  = {
	series:followersProfile,
	labels: ['Male', 'Female'],
	colors: ['#435ebe','#55c6e8'],
	chart: {
		type: 'donut',
		width: '100%',
		height:'350px'
	},
	legend: {
		position: 'bottom'
	},
	plotOptions: {
		pie: {
			donut: {
				size: '30%'
			}
		}
	}
}
var chartProfileVisit = new ApexCharts(document.querySelector("#chart-profile-visit"), optionsProfileVisit);
var chartVisitorsProfile = new ApexCharts(document.getElementById('chart-visitors-profile'), optionsVisitorsProfile)

chartVisitorsProfile.render()
chartProfileVisit.render();


//--------------------------------------------------------------------------------



</script>

@endsection


