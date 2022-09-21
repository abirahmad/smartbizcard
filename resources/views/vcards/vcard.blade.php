
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Card</title>
<link rel="stylesheet" href="{{asset('public/backend/plugins/fontawesome-free/css/all.min.css')}}">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="{{asset('public/backend/custom.css')}}">
@include('layouts.partials.css')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="container">
    <div class="row justify-content-center">
        
        <div class="col-sm-5 card__container pb-4" style="background-image:linear-gradient(-180deg, {{!empty($vcard->color)?$vcard->color:'white'}}, white) !important;">
            <?php
                if(!empty($vcard->main_image))
                {
                    $mainImage = $vcard->main_image;
                }
            ?>
                @if(!empty($mainImage))
                <div class="card__bck" style="background-image:url({{asset('public/backend/images/vcard/images/'.$mainImage)}})">
                    <h2 class="card__header">Smarter<span class="biz__card">BizCard</span></h2>
                </div>
                @else
                <div class="card__bck" style="background-image:url({{url('public/backend/images/vcard/images/logo-bg.png')}})">
                    <h2 class="card__header">Smarter<span class="biz__card">BizCard</span></h2>
                </div>
                @endif
            <div class="vcard">
                <div class="row card__head__pd">
                    <div class="col-3 margin__img pl-2">
                        <img src="{{!empty($vcard->cover_image)?asset('public/backend/images/vcard/images/'.$vcard->cover_image):null}}" alt="AdminLTE Logo" class="avatar__vcard">
                    </div>
                    <div class="col-7">
                        <div class="card__head">
                            <p class="name__first">{{!empty($user->name)?$user->name:null}}</p>
                            <h4 class="name__last">{{!empty($vcard->full_name)?$vcard->full_name:null}}</h4>
                            <p class="name__desig">{{!empty($vcard->title)?$vcard->title:null}},{{!empty($vcard->company)?$vcard->company:null}}</p>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <p class="card-text card__text__color">{{!empty($vcard->description)?$vcard->description:null}}</p>
                </div>
            </div>

            <div class="row btn__pb add__to__con">
                <div class="col-12 text-center">
                    <a href="{{route('vcf.generate')}}"><p class="add__to__contact">Add to Contact</p> </a>
                </div>
            </div>

            <div class="contact__info">
                <p class="text-center contact__head">Information</p>
                <div class="row justify-content-center mb-4">
                    <div class="col-2">
                        <span class="anik"><i class="fas fa-phone-alt"></i></span>
                    </div>
                    <div class="col-7">
                        <h4>{{!empty($vcard->phone)?$vcard->phone:null}}</h4>
                        <p>Phone (home)</p>
                    </div>
                </div>
                <div class="row justify-content-center mb-4">
                    <div class="col-2">
                        <span class="anik"><i class="fas fa-phone-alt"></i></span>
                    </div>
                    <div class="col-7">
                        <h4>{{!empty($vcard->phone_office)?$vcard->phone_office:null}}</h4>
                        <p>Phone (office)</p>
                    </div>
                </div>
                <div class="row justify-content-center mb-4">
                    <div class="col-2">
                        <span class="anik"><i class="fas fa-envelope"></i></span>
                    </div>
                    <div class="col-7">
                        <address><a href="mailto:{{$vcard->email}}" style="text-decoration: none; font-weight:bold">{{!empty($vcard->email)?$vcard->email:null}}</a></address>
                        <p>Email</p>
                    </div>
                </div>
                <!-- <div class="row justify-content-center">
                    <div class="col-2">
                        <span class="anik"><i class="fab fa-dribbble"></i></span>
                    </div>
                    <div class="col-7">
                        <h4>{{!empty($vcard->phone)?$vcard->phone:null}}</h4>
                        <p>Home</p>
                    </div>
                </div> -->
            </div>

            <div class="share__my__contact">
                <div class="row justify-content-center pl-5 pr-5">
                    <div class="col-lg-6 col-12 text-center">
                        @if(!auth()->check())
                        <form action="{{ route('set.session.share') }}" method="POST">
                            @csrf
                            <input type="hidden" name="reference" value="{{ $user->id }}">
                            <input type="submit" class="share__con share__bg btn" value="Share My Contact">
                        </form>
                        @else
                          <p class="share__con share__bg"><a href="{{route('share.contact',$user->id)}}">Share My Contact</a></p>
                          @endif
                    </div>
                    <div class="col-lg-6 col-12 text-center">
                        <p class="share__con wallet__bg"><a href="#">Add to Wallet</a></p>
                    </div>
                </div>
            </div>

            <div class="social__media mt-4">

                <p class="contact__head text-center">Social Media</p>

                <div class="row justify-content-center">
                    <div class="col-3">
                        @if(!empty($facebook))
                            <a href="{{$facebook->social_link}}">
                             <span class="anik  card__footer__fb"><i class="fab fa-facebook-f"></i></span>
                            </a>
                        @else
                        <span class="anik  card__footer__fb"><i class="fab fa-facebook-f"></i></span>
                        @endif
                    </div>
                    <div class="col-3"> 
                        @if(!empty($linkedIn))
                            <a href="{{$linkedIn->social_link}}">
                             <span class="anik">
                                <i class="fab fa-linkedin-in"></i>
                            </span>
                            </a>
                        @else
                        <span class="anik">
                            <i class="fab fa-linkedin-in"></i>
                        </span>
                        @endif
                    </div>
                    <div class="col-3">
                        @if (!empty($whatsapp))
                           <a href="{{$whatsapp->social_link}}">
                            <span class="anik">
                                <i class="fab fa-whatsapp"></i>
                            </span>
                           </a> 
                        @else
                            <span class="anik">
                                <i class="fab fa-whatsapp"></i>
                            </span>
                        @endif
                    </div>

                </div>
                <div class="row justify-content-center mt-4">
                    <div class="col-3">
                        @if (!empty($twitter))
                            <a href="{{$twitter->social_link}}">
                                <span class="anik"> <i class="fab fa-twitter"></i></span>
                            </a>
                        @else
                        <span class="anik"> <i class="fab fa-twitter"></i></span>
                        @endif
                    </div>
                    <div class="col-3">
                        @if (!empty($snapchat))
                            <a href="{{$snapchat->social_link}}">
                            <span class="anik"> <i class="fab fa-snapchat"></i></span>
                            </a>
                        @else
                        <span class="anik"> <i class="fab fa-snapchat"></i></span>
                        @endif
                    </div>
                    <div class="col-3">
                        @if (!empty($youtube))
                            <a href="{{$youtube->social_link}}">
                            <span class="anik"> <i class="fab fa-snapchat"></i></span>
                            </a>
                        @else
                        <span class="anik"> <i class="fab fa-youtube"></i></span>
                        @endif
                    </div>
                </div>

                <div class="row text-center mt-5">
                    <div class="col">
                     <p class="share__my__card"> <a href="{{url('/')}}#plans__and__pricing">Get my SmarterBiz Card</a></p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@include('layouts.partials.scripts')
</body>

</html>
<!-- Vcard Design Ends -->