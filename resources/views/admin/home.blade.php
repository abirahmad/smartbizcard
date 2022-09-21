@extends('admin.layouts.master')

@section('content')

<div class="content-wrapper ">

  <div class="content-header">
    <div class="container mx-3">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 admin">Admin</h1>
        </div>
      </div>
    </div>
  </div>

  <section class="mx-3">
    <div class="container pb-5">
          <!-- Small boxes (Stat box) -->

      <div class="row ">
        <div class="col-lg-4 col-sm-6">
          <!-- small box -->
          <div class="card" style="box-shadow: 0px 3px 44px #91919129;border-radius:8px">
                 <div class="row my__row">
                   <div class="col-6">
                    <img src="{{asset('public/backend/dist/img/d-board.png')}}" alt="AdminLTE Logo" class="d-card__img">
                   </div>
                   <div class="col-6">
                     <div class="test__f float-right">
                      <p class="card__head">Total BizCard</p>
                      <h4 class="card__count float-right">{{$totalUser}}</h4>
                     </div>

                   </div>
                 </div>
          </div>

        </div>
        <div class="col-lg-4 col-sm-6">
          <!-- small box -->
          <div class="card" style="box-shadow: 0px 3px 44px #91919129;;border-radius:8px">
            <div class="row my__row">
              <div class="col-6">
                 <img src="{{asset('public/backend/dist/img/d-board2.png')}}" alt="AdminLTE Logo" class="d-card__img">
              </div>
              <div class="col-6">
                <div class="test__f float-right">
                  <p class="card__head">Active Users</p>
                  <h4 class="card__count float-right">
                    @if(!empty($countUser))
                      {{$countUser}}
                    @else
                      0
                    @endif
                  </h4>
                </div>
              </div>
            </div>
        </div>
       </div>

        <div class="col-lg-4 col-sm-6">
          <!-- small box -->
          <div class="card" style="box-shadow: 0px 3px 44px #91919129;;border-radius:8px">
            <div class="row my__row">
              <div class="col-6">
               <img src="{{asset('public/backend/dist/img/d-board3.png')}}" alt="AdminLTE Logo" class="d-card__img3">
              </div>
              <div class="col-6">
                <div class="test__f float-right">
                  <p class="card__head">Contest Progress</p>
                  <h4 class="card__count float-right">50%</h4>
                </div>
              </div>
            </div>
          </div>
          </div>
       </div>

       <div class="row">
         <div class="col-lg-6">
          <div class="card chart-section ">
            <div class="card-header border-0">
              <h3 class="card-title barchart-title admin-card__title">BizCard Statistics</h3>

              <div class="card-tools d-flex">
                <div class="dropdown">
                  <button class="btn rounded border dropdown-toggle" type="button" id="dropdownMenuButton barchart-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Yearly
                  </button>
                  <!-- <div class="dropdown-menu yearly-dropdown" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Day<i class="fas fa-check home-dropdown-check"></i></a>
                    <a class="dropdown-item" href="#">Weekly</a>
                    <a class="dropdown-item" href="#">Monthly</a>
                    <a class="dropdown-item" href="#">Yearly</a>
                  </div> -->
                </div>
                {{-- <div class="dropdown ">
                  <button class="btn" type="button" id="dropdownMenuButton barchart-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-h"></i>
                  </button>
                  <div class="dropdown-menu ellipsis-dropdown" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">All<i class="fas fa-check home-dropdown-check"></i></a>
                    <a class="dropdown-item" href="#">Alex</a>
                    <a class="dropdown-item" href="#">Somith</a>
                  </div>
                </div> --}}
              </div>
            </div>
            <div class="card-body">
              <div class="chart">
                <canvas id="myLineChart" ></canvas>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
         </div>
         <div class="col-lg-6">
               <!-- /.card-header -->
               <div class="card chart-section ">
                <div class="card-header border-0">
                  <h3 class="card-title barchart-title admin-card__title">Users Data</h3>

                  <div class="card-tools d-flex">
                    <div class="dropdown">
                      <button class="btn rounded border dropdown-toggle" type="button" id="dropdownMenuButton barchart-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       Monthly
                      </button>
                      <div class="dropdown-menu yearly-dropdown" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Day<i class="fas fa-check home-dropdown-check"></i></a>
                        <a class="dropdown-item" href="#">Weekly</a>
                        <a class="dropdown-item" href="#">Monthly</a>
                        <a class="dropdown-item" href="#">Yearly</a>
                      </div>
                    </div>
                    <div class="dropdown ">
                      <button class="btn" type="button" id="dropdownMenuButton barchart-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-h"></i>
                      </button>
                      <div class="dropdown-menu ellipsis-dropdown" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">All<i class="fas fa-check home-dropdown-check"></i></a>
                        <a class="dropdown-item" href="#">Alex</a>
                        <a class="dropdown-item" href="#">Somith</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="chart">
                    <canvas id="myChart" ></canvas>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
         </div>
       </div>

       <div class="row">
         <div class="col-lg-6 col-12 res__admin__pb">

          <div class="table__container__admin" style="border-radius: 9px">
            <div class="table__head pl-2 pr-3">
              <h5 class="float-left">Most Recent BizCard</h5>
              <a href="{{route('admin.biz-cards.index')}}" class="float-right">view all</a>
            </div>
              <div class="table-responsive pl-2 pr-2">
                <table class="table">
                    <tbody>
                        @foreach ($recentUsers as $recentUser)
                          <tr>
                              <td  style="border-top:0px; border-bottom:1px solid #ECECEC;">
                                  <img src="{{$recentUser->main_image? asset('public/backend/images/vcard/images/'.$recentUser->main_image): '' }}" alt="AdminLTE Logo" class="small-avatar__img">
                                  <strong>{{$recentUser->username}}</strong>
                              </td>
                              <td style="border-top:0px; border-bottom:1px solid #ECECEC;"><span class="reg__date__admin">{{$recentUser->username?$recentUser->username:''}}</span></td>
                              <td style="border-top:0px; border-bottom:1px solid #ECECEC;"><span class="reg__date">{{ date('d M Y H:i A', strtotime($recentUser->created_at ? $recentUser->created_at : '')) }}</span></td>
                          </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
          </div>

         </div>
         <div class="col-lg-6 col-12 ">
          <div class="table__container__admin">
              <div class="table-responsive pl-2 pr-2">
                <table class="table">
                    <tbody>
                      <div class="table__head mr-2">
                        <h5 class="float-left">Recent Registered</h5>
                        <a href="#" class="float-right">view all</a>
                      </div>
                        @foreach ($Users as $user)
                          <tr>
                              <td  style="border-top:0px; border-bottom:1px solid #ECECEC;">
                                  <strong>{{$user->username}}</strong>
                              </td>
                              <td style="border-top:0px; border-bottom:1px solid #ECECEC;"><span class="blue__pill">{{$user->email}}</span></td>
                              <td style="border-top:0px; border-bottom:1px solid #ECECEC;">
                                <span class="reg__date">
                                  @if (!empty($user->created_at))
                                  {{$user->created_at->diffForHumans()}}
                                  @else
                                    Not Found
                                  @endif
                                </span>
                              </td>
                          </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
          </div>
         </div>
       </div>
  </div>
  </section>
</div>


@endsection
