@extends('layouts.frontend-master')

@section('content')
    <div class="container-fluid" >
        <div class="row bp" style="background: #f8f8f8">
            <div class="col-lg-6 offset-lg-1 col-md-5">
                <h1>Upgrade</h1>
            </div>
         
                <div class="col-lg-4 col-md-7">
                    <ol class="breadcrumb float-sm-right">
                       <li class="breadcrumb-item"><a href="{{ route('home') }}" class="transaction-text">Home</a></li>
                       <li class="breadcrumb-item active">upgrade</li>
                     </ol>
               </div>
         
        </div>
        <div class="row mt-5 ">
            <div class="col-lg-6 offset-lg-1 col-md-6">
                <div class="payment-method">
                    <h3 class="mb-4">Payment Method</h3>
                    <div class="border p-4">
                    {{-- <div class="float-left">
                        <input type="radio" id="male" name="gender" value="male">
                        <label for="male">Paypal</label><br>
                    </div> --}}
                    
                    {{-- <div class="float-right">
                        <input type="radio" id="male" name="gender" value="male">
                        <label for="male">One Time Payment</label><br>
                    </div> --}}

                    <div class="clearfix"></div>
                    <div class="float-left">
                        <i class="fab fa-stripe" aria-setsize="60px"></i> 
                        <input type="radio" id="stripe" name="gender" value="male" data-toggle="modal" data-target=".bd-example-modal-lg">
                        <label for="stripe">Stripe</label><br>
                    </div>

                    <div class="clearfix"></div>
                    <p class="my-3">You will be redirected to paypal to complete the payment</p>
                    <p>Payment Type</p>

                    <div class="float-left">
                        <input type="radio" id="male" name="gender" value="male" >
                        <label for="male">One Time Payment</label><br>
                    </div>
                    <div class="float-right">
                        <input type="radio" id="male" name="gender" value="male">
                        <label for="male">Recurring Payment</label><br>
                    </div>
                    <div class="clearfix"></div>
                </div>
                    
                </div>
                <button class="btn btn-primary mt-3 mb-3">Submit</button>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 mb-5">
                <div class="card-header border-0">
                    <h5>Package Summary</h5>
                </div>
              
                <div class="package-summary p-4" style="background: #f0f0f0">
                <div class="float-left">
                    <p>Membership</p>
                    <p>Expiry Date</p>
                    <p>Active Date</p>
                </div>
                <div class="float-right">
                    <h6>Extended Plan</h6>
                    <h6>{{date('d-m-Y', strtotime($amount->expire_date))}}</h6>
                    <h6>{{date('d-m-Y')}}</h6>
                </div>
                <div class="clearfix"></div>
                <div class="border-bottom"></div>
                <div class="py-3">
                <div class="float-left">
                    <p>Plan Fee</p>
                    <p>Exclusive</p>
                </div>
                <div class="float-right">
                    <h6>${{$amount->monthly_price}}</h6>
                    
                </div>
            </div>
                <div class="clearfix"></div>
                <div class="border-bottom"></div>
                <div class="py-3">
                <div class="float-left ">
                    <h4>Total Cost</h4>
                  
                </div>
                <div class="float-right">
                    <h4 class="text-primary">${{$amount->status==0?$amount->monthly_price:($amount->status==1?$amount->annual_price:$amount->lifetime_price)}}</h4>
                    
                </div>
            </div>
                <div class="clearfix"></div>
               
            </div>
            </div>
        </div>
        </div>


<!-- Large modal Starts -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header bg-primary">
            <h5 class="modal-title">Put your title here</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
       <div class="modal__header-invoice">
             <div class="row justify-content-center">
                 <div class="col-lg-6">
                     <div class="invoice__method text-center">
                        <i class="fab fa-cc-visa"></i>
                        <i class="fab fa-cc-mastercard"></i>
                        <i class="fab fa-cc-amex"></i>
                     </div>
                 </div>
             </div>
       </div>
       <div class="modal__body-invoice">
        <form role="form" action="{{ route('stripe.post') }}" method="post" class="require-validation"
            data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
            id="payment-form">
            @csrf
            <div class="form-row">
              <div class="col-lg-6 col-12">
              <label for="amount">Amount</label>
              <br>
               <!-- <input type="text" class="form-control" id="amount" aria-describedby="emailHelp" value="{{$amount->status==0?$amount->monthly_price:($amount->status==1?$amount->annual_price:$amount->lifetime_price)}}" name='amount' placeholder="USD DOLAR">
             -->
                <p style="border: 1px solid #CED4DA; border-radius:5px; padding: 5px; padding-left:8px;">{{$amount->frequency==0?$amount->monthly_price:($amount->frequency==1?$amount->annual_price:$amount->lifetime_price)}}</p>
              </div>
              <div class="col-lg-6 col-12">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name='email'>
              </div>
            </div>
            <input type="hidden" class="form-control" value="{{$amount->id}}" id="email" aria-describedby="emailHelp" name='pt_id'>
            <div class="form-row">
              <div class="col-lg-6 col-12">
              <label for="exampleInputEmail1">Card Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="card_name">
              </div>
              <div class="col-lg-6 col-12">
              <label for="exampleInputPassword1">Card Number</label>
              <input type="text" class="form-control card-number" id="exampleInputPassword1" autocomplete='off' name="card_number">
              </div>
            </div>
            <div class="form-row mt-5">
              <div class="col-lg-4 col-12">
              <label for="cvc">CVC</label>
              <input type="text" class="form-control card-cvc" id="cvc" autocomplete='off' placeholder='ex. 311' size='4' name="cvc">
              </div>
              <div class="col-lg-4 col-12">
              <label for="month">Expiration Month</label>
              <input type="text" class="form-control card-expiry-month" id="month" autocomplete='off' placeholder='MM' size='2' name="exp_month">
              </div>
              <div class="col-lg-4 col-12">
              <label for="month">Expiration Year</label>
              <input type="text" class="form-control card-expiry-year" id="month" autocomplete='off' placeholder='YYYY' size='4' name="exp_year">
              </div>
            </div>
            <button type="submit" class="btn btn-primary mt-5">Submit</button>
          </form>
       </div>
    </div>
  </div>
</div>
<!-- Large modal Ends -->

</div>
@endsection


@section('extra-js')

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">
    $(function() {
        var $form = $(".require-validation");
        $('form.require-validation').bind('submit', function(e) {
            var $form = $(".require-validation"),
                inputSelector = ['input[type=email]', 'input[type=password]',
                    'input[type=text]', 'input[type=file]',
                    'textarea'
                ].join(', '),
                $inputs = $form.find('.required').find(inputSelector),
                $errorMessage = $form.find('div.error'),
                valid = true;
            $errorMessage.addClass('hide');
            $('.has-error').removeClass('has-error');
            $inputs.each(function(i, el) {
                var $input = $(el);
                if ($input.val() === '') {
                    $input.parent().addClass('has-error');
                    $errorMessage.removeClass('hide');
                    e.preventDefault();
                }
            });
            if (!$form.data('cc-on-file')) {
                e.preventDefault();
                Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                Stripe.createToken({
                    number: $('.card-number').val(),
                    cvc: $('.card-cvc').val(),
                    exp_month: $('.card-expiry-month').val(),
                    exp_year: $('.card-expiry-year').val()
                }, stripeResponseHandler);
            }
        });

        function stripeResponseHandler(status, response) {
            if (response.error) {
                $('.error')
                    .removeClass('hide')
                    .find('.alert')
                    .text(response.error.message);
            } else {
                /* token contains id, last4, and card type */
                var token = response['id'];
                $form.find('input[type=text]').empty();
                $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                $form.get(0).submit();
            }
        }
    });
</script>
@endsection
