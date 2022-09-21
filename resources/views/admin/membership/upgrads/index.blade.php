@extends('admin.layouts.master')

@section('content')
    <div class="content-wrapper">
     
            <div class="container-fluid pt-5">
                <div class="card p-4">
                <div class="row">
                    <div class="col-lg-10 col-12">
                        <h4 class="allbizcard__head">Upgrade Users</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table" id="plan">
                                <thead>
                                    <tr>
                                        <th scope="col">User Name</th>
                                        <th scope="col">Membership</th>
                                        <th scope="col">Timing</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($items as $item)
                                        <tr>
                                            <td>{{ $item->username }}</td>
                                            <td>{{ $item->plan_name }}</td>
                                            <td>
                                                {{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y') }} /
                                                @if($item->product_expire_date == 'Life Time Access')
                                                    {{$item->product_expire_date}}
                                                @else
                                                {{ \Carbon\Carbon::parse($item->product_expire_date)->format('d-m-Y') }}
                                                @endif
                                               
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
    </div>
@endsection
