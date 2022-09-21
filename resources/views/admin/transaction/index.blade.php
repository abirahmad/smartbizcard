@extends('admin.layouts.master')

@section('content')
    <div class="content-wrapper">
        <div class="container-fluid pt-5"> 
        <div class="basic-card p-3 mx-3">
          
                <div class="row">
                    <div class="col-lg-10 col-12">
                        <h4 class="allbizcard__head">Transaction Lists</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table" id="plan">
                                <thead>
                                    <tr>
                                        <th scope="col">User</th>
                                        <th scope="col">Card Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Product</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($transactionLists as $transactionList)
                                        <tr>
                                            <td style = "text-transform:capitalize;">{{ $transactionList->username }}</td>
                                            <td>{{ $transactionList->card_name }}</td>
                                            <td>{{ $transactionList->email }}</td>
                                            <td>{{ $transactionList->plan_name }}</td>
                                            <td>{{ $transactionList->amount }}</td>
                                            <td>
                                                <span class="badge badge-primary statusbadge"><i class="fa fa-check"></i> {{ $transactionList->transaction_status }}</span>
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
