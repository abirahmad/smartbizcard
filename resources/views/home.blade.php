@extends('layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid pb30">
                <!-- Small boxes (Stat box) -->
                <div class="row justify-content-center home-section ">
                    <div class="col-lg-3 col-md-3">
                      <a href="{{route('share-contact.list')}}">
                        <div class="card py-4 home-card">
                            <div class="home-card-Profile">

                                <img src={{ asset('public/backend/images/vcard/people.png') }} alt="Avatar">
                            </div>
                            <div class="home-card-text">
                                {{-- <h4><b>John Doe</b></h4> --}}
                                <p class="text-center pt-2 mb-0">People</p>
                            </div>
                        </div>
                      </a>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-md-3  mx-lg-3">
                        <!-- small box -->
                        <a href="{{route('qrcode')}}">
                        <div class="card  home-card py-4">
                            <div class="home-card-Profile">

                                <img src={{ asset('public/backend/images/vcard/qr-scan.png') }} alt="Avatar">
                            </div>
                            <div class="home-card-text">

                                <p class="text-center pt-2 mb-0">QR Scan</p>
                            </div>
                        </div>
                      </a>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-md-3  ">
                        <!-- small box -->
                        <div class="card py-4 home-card">
                            <div class="home-card-Profile">

                                <img src={{ asset('public/backend/images/vcard/point.png') }} alt="Avatar">
                            </div>
                            <div class="home-card-text">

                                <p class="text-center pt-2 mb-0"><span class="font-weight-bold">
                                        @if (!empty($total_scan))
                                            {{ $total_scan }}
                                        @else
                                            No Points Available
                                        @endif
                                    </span>Points</p>
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->

                    <!-- ./col -->
                </div>
                <!-- /.row -->
                <h4 class="activity-text mb-3 mt-3">Activity</h4>
                <!-- Main row -->
                <div class="row justify-content-center mb-5">
                    <!-- Left col -->

                    <div class="col-lg-4 col-md-4 ">
                        <!-- Custom tabs (Charts with tabs)-->
                        <div class="card scanbar-section px-3  pb-2">
                            <!-- /.card-header -->
                            <div class="">
                                <div class="float-left">
                                    <h3 class="font-weight-bold mb-0">{{ $total_scan }}</h3>
                                    <p>Total Scans</p>
                                </div>
                                <div class="float-right scanbar-image">
                                    <img src="{{ asset('public/backend/images/vcard/scanbar.png') }}" />
                                </div>
                            </div><!-- /.card-body -->
                            <div class="clear-fix"></div>
                        </div>
                        <!-- /.card -->
                        <div class="card scanbar-section Entreprenuer px-3 pb-2 ">
                            <!-- /.card-header -->
                            <div class="">
                                <div class="float-left">
                                    <h3 class="font-weight-bold mb-0 mt-2">
                                        @if (!empty($plan->plan_name))
                                            {{ $plan->plan_name }}
                                        @else
                                            Currently Don't have a plan.
                                        @endif


                                    </h3>
                                    <p>Membership</p>
                                </div>
                                <div class="float-right scanbar-image">
                                    <img src="{{ asset('public/backend/images/vcard/membership.png') }}" />
                                </div>
                            </div><!-- /.card-body -->
                            <div class="clear-fix"></div>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- right col -->
                    <div class="col-lg-5 col-md-5 ml-lg-3" style="height: 400px; width: 900px;">
                        <!-- /.card-header -->
                        <div class="card chart-section">
                            <div class="card-header border-0">
                                <h3 class="card-title barchart-title">This month scans</h3>
                                <div class="card-tools d-flex">
                                    <!-- <div class="dropdown">
                          <button class="btn rounded border dropdown-toggle pr-5" type="button" id="dropdownMenuButton barchart-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <span class="mr-3"> Monthly</span>
                          </button>
                          <div class="dropdown-menu yearly-dropdown" aria-labelledby="dropdownMenuButton" id="status" name="status">
                            <a class="dropdown-item" href="#">Day<i class="fas fa-check home-dropdown-check"></i></a>
                            <a class="dropdown-item" href="#">Weekly</a>
                            <a class="dropdown-item" href="#">Monthly</a>
                            <a class="dropdown-item" href="#">Yearly</a>
                          </div>
                        </div> -->
                                    <select class="form-control" name="status" id="status">
                                        <option value="0">--Select--</option>
                                        <option value="1">Yearly</option>
                                    </select>

                                    <div class="dropdown ml-2 ">
                                        <button class="btn" type="button" id="dropdownMenuButton barchart-dropdown"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </button>
                                        <div class="dropdown-menu ellipsis-dropdown" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="#">All<i
                                                    class="fas fa-check home-dropdown-check"></i></a>
                                            <a class="dropdown-item" href="#">Alex</a>
                                            <a class="dropdown-item" href="#">Somith</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="barChart"></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <!-- /.row (main row) -->
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@section('extra-js')
    <script type="text/javascript">
        $(function() {
            var datas = <?php echo json_encode($datas); ?>;
            var barCanvas = $('#barChart');
            var barChart = new Chart(barCanvas, {
                type: 'bar',
                data: {
                    labels: ['', 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'July', 'Aug', 'Sep', 'Oct',
                        'Nov', 'Dec', ''
                    ],
                    datasets: [{
                        label: 'Scan Details of this year',
                        data: datas,
                        backgroundColor: ['red', 'orange', 'yellow', 'green', 'blue', 'indigo',
                            'violet', 'purple', 'pink', 'silver', 'gold', 'brown', 'black'
                        ]
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            })
        });
    </script>
@endsection
