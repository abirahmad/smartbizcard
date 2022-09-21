@extends('admin.layouts.master')

@section('content')
    <div class="content-wrapper">
        
            <div class="container-fluid pt-5 ">
                <div class="basic-card p-3 mx-3">
                <div class="row">
                    <div class="col-lg-10 col-8 ">
                        <h4 class="allbizcard__head">Cron Logs</h4>
                    </div>
                    <div class="col-lg-2 col-4 ">
                        <button type="button" class="btn btn-primary border-radius20 py-1 px-3 " data-toggle="modal" data-target="#planModalCenter">Add Plan</button>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table" id="plan">
                                <thead>
                                    <tr>
                                        <th scope="col">Summery</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Plan</th>
                                        <th scope="col">EMail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($expired_plans as $expired_plan)
                                        <tr>
                                            <td>Cron Run</td>
                                            <td>{{$expired_plan->plan_expire_date}}</td>
                                            <td>{{$expired_plan->plan_name}}</td>
                                            <td>{{$expired_plan->email}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
