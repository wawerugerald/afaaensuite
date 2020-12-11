
<div class="row" style="padding-left: 10px;padding-right: 10px">

	<div class="col dashboard-col" >
		<div class="card-header">
			<h4>My Countries</h4>
		</div>
		@foreach($usercountries as $country)
		@if(Auth::user()->roles == 3)
		<div class="card" style="background-color:#0EA616;border-radius: 5px;">
			<div class="card-body" >
				<div class="text-center" >
				    <a href="/contributor-countryview/{{$country->countryid}}" ><h6 style="color: #fff">{{$country->country->countryname}}</h6></a>
			    </div>
			</div>
		</div>
		@elseif(Auth::user()->roles == 0)
		<div class="card" style="background-color:#0EA616;border-radius: 5px;">
			<div class="card-body">
				<div class="text-center">
				    <a href="/reviewerpublisher-countryview/{{$country->countryid}}" ><h6 style="color: #fff">{{$country->country->countryname}}</h6></a>
			    </div>
			</div>
		</div>
		@endif
		@endforeach
	</div>
	<div class="col" hidden>
		<h4><p>Latest Activities</p></h4>
		<div class="card" style="border-radius: 5px;">
			<!-- <div class="card-header"style="text-align: center;" >
				<h4><p>Latest Activities</p></h4>
			</div> -->
			<div class=card-body>
			</div>
		</div>
	</div>
	<div class="col dashboard-col" >
		<div class="card-header">
			<h4>My Feedback:</h4>
		</div>
			@foreach($comments as $comment)
		<div class="card" style="border-radius: 5px;">
			<div class="card-body" style="background-color: #333333;color: #fff;border-radius: 5px">
				<div class="text-left">
					<div class="image-kadogo"><!--This will change too-->
                             <img class="img-profile rounded-circle" src="{{asset($comment->user->profileimage)}}" style="width: 30px; height: 30px; border-radius: 40%;">&nbsp&nbsp&nbsp&nbsp
                     			{{$comment->user->name}}:&nbsp&nbsp&nbsp {{$comment->comment}}
                    </div>
                    <div class="comments">

                        </div>
				</div>
			</div>
		</div>
		@endforeach
	</div>
</div>
