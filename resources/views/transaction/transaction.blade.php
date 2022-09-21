@extends('layouts.master')

@section('content')
<div class="content-wrapper pb-5">
    <div class="">
        <div class="container-fluid pt-5">
            <div class="basic-card p-3 mx-3">
                <div class="row mb-3">
                    <div class="col-lg-10 col-12">
                        <h4 class="allbizcard__head ">Transaction Lists</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table" id="userTransaction">
                                <thead>
                                    <tr>
                                    <th scope="col">SL</th>
                                    <th scope="col">User</th>
                                    <th scope="col">Card Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Payment Date</th>
                                    <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach ($transactionListByUser as $transaction)
                                    <tr>
                                        @if(!is_null($transaction))
                                      <th scope="row">{{$loop->iteration}}</th>
                                      <td>{{$transaction->username}}</td>
                                      <td>{{$transaction->card_name}}</td>
                                      <td>{{$transaction->email}}</td>
                                      <td>{{$transaction->plan_name}}</td>
                                      <td>{{$transaction->amount}}</td>
                                      <td>{{!is_null($transaction->created_at)?$transaction->created_at->format('Y-m-d'):null}}</td>
                                      <td>
                                      <span class="badge badge-primary statusbadge"> <i class="fa fa-check"></i> {{ $transaction->transaction_status }}</span>
                                      </td>
                                      @endif
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
</div>
@endsection