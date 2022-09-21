@extends('layouts.master')

@section('content')
<div class="content-wrapper membership-wraper-height">
<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">

          <div class="col-lg-4 col-md-6">
              <div class="membership-section mt-4 ml-lg-4 ">
                  <h4 class="font-weight-bold mb-4">Current Plan</h4>
                  @if (count($user_plans) > 0)
                  @foreach ($user_plans as $user_plan)
                  <div class="card membership-card">
                      <div class="card-body">
                          <p class="mb-0">Current Plan </p>
                          <h5 class="font-weight-bold mt-2">{{$user_plan->plan_name}}</h5>
                         <p><span><i class="fas fa-check-circle text-success mr-1"></i></span> Update your card info at any time</p>
                         <p class="text-gray"><span><i class="fas fa-check-circle mr-1"></i></span><s>IOS and Android App</s> </p>
                         <p class="text-gray"><span><i class="fas fa-check-circle mr-1"></i></span><s>White Labeled Dashboard</s> </p>
                         <p class="text-gray"><span><i class="fas fa-check-circle mr-1"></i></span> <s> Integration</s></p>
                          @if($user_plan->plan_expire_date == 'Life Time Access')
                          <p class="text-center">Life Time Access</p>
                          @else
                          <p class="text-center">Expires in <span class="member-date">{{ \Carbon\Carbon::parse($user_plan->plan_expire_date)->format('D d F Y') }}</span></p>
                          @endif
                      </div>

                      <a href="{{url('/')}}#plans__and__pricing"><button class="btn btn-primary mt-1 charge-plan-btn mb-5 p-2">Change Plan</button></a>
                    </div>
                  @endforeach
                  @else
                  <p class="text-center p-2">Currently you Don't have a plan.</p>
                  @endif



              </div>

          </div>

        </div>
      </div>
    </section>
</div>
@endsection
