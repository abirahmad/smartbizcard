 
 
 @extends('layouts.frontend-master')
 @section('meta-name')
     <meta name="csrf-token" content="{{ csrf_token() }}" />
 @endsection
 
 @section('content')
 {{-- Entreprenuer Starts --}}

    <div class="section__bg__ent">
      <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-12">
                <div class="section__bg__ent-left" style="background-image: url('{{ asset('public/backend/dist/img/grpbg.png') }}');">
                     <div class="smart-card__container">
                        <img  src="{{ asset('public/backend/dist/img/smartcard.png') }}"  alt="" class="smartcard__left">
                     </div>
                </div>
           </div>
           <div class="col-lg-6 col-12">
               <div class="section__bg__ent-right">
                   <h4>{{$plan_details->name}}</h4>
                   <p class="ent__rgt__price">{{$plan_details->customize_card}} per card</p>
                   <div class="rating__box">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                   </div>
                   <ul class="ent__ul mt-2">
                       @foreach($plan_details->custom_settings as $custom_setting)
                    <li class="ent__list"><i class="fas fa-check-circle" style="color:#39BB7E;"></i>{{$custom_setting->title}}</li>
                      @endforeach
                    {{-- <li class="ent__list"><i class="fas fa-check-circle" style="color:#BFBFBF;"></i>  <span style="text-decoration: line-through;"> Custom Sales Contest</span></li>
                    <li class="ent__list"><i class="fas fa-check-circle" style="color:#BFBFBF;"></i> <span style="text-decoration: line-through;">White Labeled Dashboard</span></li>
                    <li class="ent__list"><i class="fas fa-check-circle" style="color:#BFBFBF;"></i> <span style="text-decoration: line-through;"> Integration with CRM</span></li> --}}
                </ul>
               </div>

               <span class="ent__bod"></span>
                <p class="get__card__text">Get a SmarterBizCard and get into the CONTACTS of your prospects cell phone and share your social profiles with a tap of the business card!</p>
               <img src="{{ asset('public/backend/dist/img/hehe.png') }}" alt="" class="payment__img">
                <div class="order__now-btn">
                    <a href="{{route('payment-invoice',$plan_details->id)}}" target="_blank" class="order__now mt-1 mb-3">ORDER NOW</a>
                </div>
           </div>
        </div>
      </div>
     </div>

    <!-- Section How it Work End-->
    {{-- Entreprenuer Ends --}}
    @endsection