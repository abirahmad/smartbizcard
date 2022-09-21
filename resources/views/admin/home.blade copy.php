@extends('admin.layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 admin">Adin</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="">
   
      <!-- Small boxes (Stat box) -->
      <div class="container">
      <div class="row">
        <div class="col-lg-4 col-sm-6">
          <!-- small box -->
             <div class="small__box">
               <div class="float-left">
                <img src="{{asset('public/backend/dist/img/d-board.png')}}" alt="AdminLTE Logo" class="d-card__img">
              </div>
              <div class="float-right ">
                <p>New Orders</p>
                <h3>150</h3>
              </div>
             </div>
        </div>
        <div class="col-lg-4 col-sm-6">
          <!-- small box -->
              <div class="float-left">
                <img src="{{asset('public/backend/dist/img/d-board.png')}}" alt="AdminLTE Logo" class="d-card__img">
              </div>
              <div class="float-right">
                <p>New Orders</p>
                <h3>150</h3>
              </div>
        </div>
        <div class="col-lg-4 col-sm-6">
          <!-- small box -->
              <div class="float-left">
                <img src="{{asset('public/backend/dist/img/d-board.png')}}" alt="AdminLTE Logo" class="d-card__img">
              </div>
              <div class="float-right">
                <p>New Orders</p>
                <h3>150</h3>
              </div>
        </div>
      </div>
      </div>
  
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-chart-pie mr-1"></i>
                Sales
              </h3>
            
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content p-0">
                <!-- Morris chart - Sales -->
                <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;">
                  <canvas id="revenue-chart-canvas" height="300" style="height: 300px;"></canvas>
                </div>
                <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                  <canvas id="sales-chart-canvas" height="300" style="height: 300px;"></canvas>
                </div>
              </div>
            </div><!-- /.card-body -->
          </div>
        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable">
          <!-- solid sales graph Statitics -->
          <div class="card bg-gradient-info">
            <div class="card-header border-0">
              <h3 class="card-title">
                <i class="fas fa-th mr-1"></i>
                BizCard Statics
              </h3>

              <div class="card-tools">
                <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn bg-info btn-sm" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <canvas class="chart" id="line-chart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
            <!-- /.card-body -->
            <div class="card-footer bg-transparent">
              <div class="row">
                <div class="col-4 text-center">
                  <input type="text" class="knob" data-readonly="true" value="20" data-width="60" data-height="60" data-fgColor="#39CCCC">

                  <div class="text-white">Mail-Orders</div>
                </div>
                <!-- ./col -->
                <div class="col-4 text-center">
                  <input type="text" class="knob" data-readonly="true" value="50" data-width="60" data-height="60" data-fgColor="#39CCCC">

                  <div class="text-white">Online</div>
                </div>
                <!-- ./col -->
                <div class="col-4 text-center">
                  <input type="text" class="knob" data-readonly="true" value="30" data-width="60" data-height="60" data-fgColor="#39CCCC">
                  <div class="text-white">In-Store</div>
                </div>
              </div>
            </div>
          </div>
          <!-- solid sales graph Statitics Ends -->
        </section>

        <!-- right col -->
      </div>
    </div>
  </section>
</div>
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-4 bg-primary">
      <div class="float-left">
        <img src="{{asset('public/backend/dist/img/d-board.png')}}" alt="AdminLTE Logo" >
      </div>
      <div class="float-right">
        <p>New Orders</p>
        <h3>150</h3>
      </div>
    </div>
    <div class="col-lg-4 bg-primary">
      <div class="float-left">
        <img src="{{asset('public/backend/dist/img/d-board.png')}}" alt="AdminLTE Logo" >
      </div>
      <div class="float-right">
        <p>New Orders</p>
        <h3>150</h3>
      </div>
    </div>
    <div class="col-lg-4 bg-primary">
      <div class="float-left">
        <img src="{{asset('public/backend/dist/img/d-board.png')}}" alt="AdminLTE Logo" >
      </div>
      <div class="float-right">
        <p>New Orders</p>
        <h3>150</h3>
      </div>
    </div>
  </div>
</div>
@endsection