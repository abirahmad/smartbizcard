@extends('layouts.frontend-master')
@section('meta-name')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection
@section('content')
    <div class="hero__section" style="background-image: url('{{ asset('public/backend/dist/img/bluebg-me.png') }}');">
        <div class="container">
            <div class="row">
                <div class="col-lg-1 resp__dis"></div>
                <div class="col-lg-5 col-12">
                    <div class="header__text">
                        <div class="header__text__inside">
                            <p class="header__top header__top__pb">Upgrade your business card!</p>
                            <h4 class="hero__title">Get your contact info<br class="resp__br">saved on to your<br
                                    class="resp__br">prospect's phone<br class="resp__br">with SmarterBizCard.</h4>
                            <p class="header__top top__mb">Our technology transfers your contact and social info, with a tap
                                or a scan of your SmarterBizCard,
                                directly to your prospects phone.</p>
                            <span class="divider"></span>
                            <p class="header__long__text header__bottom__pb">Get your SmarterBizCard and get into CONTACTS
                                of your <br> prospects cell phone and share profiles with a tap of the business card!</p>
                            @if (!auth()->check())
                                <a href="{{ route('login') }}" target="_blank" class="bg__color__btn">Get your Card NOW
                                    <!DOCTYPE html>
                                    <html lang="en">

                                    <head>
                                        <meta charset="UTF-8">
                                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                        <meta http-equiv="X-UA-Compatible" content="ie=edge">
                                        <title>Document</title>
                                    </head>

                                    <body>

                                    </body>

                                    </html>
                                </a>
                            @else
                                <a href="{{ route('payment-invoice', 1) }}" target="_blank" class="bg__color__btn">Get
                                    your Card NOW</a>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-12 display__small__dev">
                    <div class="smart__hov">
                        <img src="{{ asset('public/backend/dist/img/qr-scan.png') }}" alt="QR Card"
                            class="smart__qr__img">
                        <img src="{{ asset('public/backend/dist/img/smart.png') }}" alt="Smart Mobile"
                            class="smartmob__img">
                        <img src="{{ asset('public/backend/dist/img/smartc.png') }}" alt="Smart Card"
                            class="smart__card__img">
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Content
                ================================================== -->
    <!-- Section How it Work Start-->
    <div class="hiw__pb-65">
        <div class="container">
            <div class="row  bp25">
                <div class="col-xl-12 text-center">
                    <div class="section-headline centered margin-top-0 margin-bottom-5">
                        <h6 class="how__it__works__head pt-4">How it Works?</h6>
                        <p class="small__heading my-side">The product is simple to use and even easier to share:</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-xl-4 col-sm-12">
                    <div class="video__left__container">
                        <p>1. Select the card plan that fits your business needs.‍</p>
                        <p>2. When you receive your card in the mail, you fill out your own contact info and social networks
                            into your unique SmarterBizCard Profile.‍</p>
                        <p>3.When you are meeting with a prospect either tap the top of their phone or have them scan the QR
                            Code to download you contact information directly to their phone and connect to your social
                            profiles.‍</p>
                        <p>4. Ask the prospect to share their contact information with you so you can easily follow up with
                            them in the future.</p>
                        <p>No extra apps needed. Update your information anytime. It’s just that easy!</p>
                        <a href="{{ route('payment-invoice', 1) }}" target="_blank" class="bg__color__btn">Get your Card
                            NOW !</a>
                    </div>
                </div>
                <div class="col-xl-7 col-sm-12">
                    <div class="video__container">
                        <iframe class="how__it" width="100%" src="https://www.youtube.com/embed/ZcVmmDUHkl8"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen>
                        </iframe>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Section How it Work End-->

    <!-- Section Cardman Starts-->
    <div class="cardman__bg" style="background-image: url('{{ asset('public/backend/dist/img/binary.png') }}');">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-6 display__remove pt-3">
                    <div class="feature__img__wrapper">
                        <img src="{{ asset('public/backend/dist/img/mob-man.png') }}"
                            alt="{LANG_CONTACTLESS_DIGITAL_CARDS}" class="feature__img">
                    </div>

                </div>
                <div class="col-lg-6  col-12">
                    <div class="cardman__pos">
                        <div class="cardman">
                            <h2 class="hero__title">Even if your prospect doesn't have the newest Smart Phone...</h2>
                            <p class="cardman-text mt-3">You will be able to use our scannable QR Code to Share your contact
                                and social
                                information</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center  bp25 bp__10 extra__mg">
                <div class="col-xl-7 text-center">
                    <div class="video__bottom">
                        <p>Even if your prospect doesn't have a newer Smart Phone...you will be able to use our</p>
                        <p>scannable QR Code to Share all your contact and social information directly into their phone.</p>
                        <a href="{{ route('payment-invoice', 1) }}" target="_blank" class="bg__color__btn extra__pm"
                            data-toggle="modal" data-target=".bd-example-modal-lg">See list of NFC Smart Phones</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Section Cardman  End-->
    <!-- Section Sync Accross All Devices End-->
    <!-- Section Sync Accross All Devices Start-->
    <div class="comapitablem pt50 pb70">
        <div class="container">
            <div class="row ">
                <div class="col-lg-1"></div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="sync__accross__all">
                        <h4 class="hero__title">Sync Across All Devices</h4>
                        <p class="cardman-text mt-3">You will be able to Sync Share your contact and social information all
                            Devices
                        </p>
                    </div>
                </div>

                <div class="col-lg-7 col-md-6 col-12">
                    {{-- <div class="container">  Changed Here --}}
                    <div class="row mt-3">
                        <div class="col-lg-4">
                            <div class="sync__img__p">
                                <div class="sync__img__android">
                                    <img src="{{ asset('public/backend/dist/img/android.png') }}"
                                        alt="{LANG_CONTACTLESS_DIGITAL_CARDS}" class="android__img">
                                </div>
                                <div class="sync__img__mi">
                                    <img src="{{ asset('public/backend/dist/img/sony-lg.png') }}"
                                        alt="{LANG_CONTACTLESS_DIGITAL_CARDS}" class="mi__img">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="sync__img__p">
                                <div class="sync__img">
                                    <img src="{{ asset('public/backend/dist/img/samsung.png') }}"
                                        alt="{LANG_CONTACTLESS_DIGITAL_CARDS}" class="samsung__img">
                                </div>
                                <div class="sync__img">
                                    <img src="{{ asset('public/backend/dist/img/nokia.png') }}"
                                        alt="{LANG_CONTACTLESS_DIGITAL_CARDS}" class="nokia__img">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="sync__img__apple">
                                <img src="{{ asset('public/backend/dist/img/apple.png') }}"
                                    alt="{LANG_CONTACTLESS_DIGITAL_CARDS}" class="apple__img">
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>

    <!-- Section Compaitable With Android Start-->
    <div id="compaitable" class="gray__bg">
        <div class="container-fluid">
            <div class="row justify-content-center gray__bg__justify">
                <div class="col-1"></div>
                <div class="col-lg-4 col-sm-12">

                    <img src="{{ asset('public/backend/dist/img/smart-card.png') }}"
                        alt="{LANG_CONTACTLESS_DIGITAL_CARDS}" class="card__img">
                </div>

                <div class="col-lg-6  col-sm-12 ">
                    <div class="feature-text-com">
                        <h4 class="hero__title__bullet">SmarterBizCard will help make every <br> interaction with prospects
                            to be <br> IMPACTFUL and EFFECTIVE!</h4>
                        {{-- <i class="fas fa-check-circle"></i> --}}
                        <ul class="compaitable__ul mt-2">
                            <li class="practice"><i class="fas fa-check-circle"></i>Your prospects will never have an excuse
                                for “misplacing your card” or “not having access to your contact information” because it
                                will be in the contact section of their cell phone!</li>
                            <li class="practice"><i class="fas fa-check-circle"></i>It’s the Green, COVID Friendly and more
                                cost effective than ordering traditional cards that you can't update and run out of!</li>
                            <li class="practice"><i class="fas fa-check-circle"></i>Smarter Biz Card will change the way you
                                network forever! You will close more deals and live the life you deserve!</li>
                        </ul>

                        <a href="{{ route('login') }}" target="_blank" class="bg__color__btn">Get your Card NOW !</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Section  Compaitable With Android End-->

    {{-- Dashboard  starts --}}
    <div id="for__sales__manager" class="for-sales-manager__container">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="dash-board__head text-center">
                        <h4 class="sales__team__manager"> Are you a Sales Team Manager or want better <br /> analytics of
                            your sales team?</h4>
                        <p class="sec__pb">You need our Small Business or Corporate Plans!</p>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center dboard__white">
                <div class="col-lg-4 col-sm-6 col-12">
                    <div class="feature-text__white-labeled">
                        <h4 class="hero__title">White labeled Dash Board</h4>
                        <p class="sub__text mt-4">Designed with your color and logos to match your brand!</p>
                        <p class="sub__text mt-0">Update all your employees- SmarterBizCard info saving time and money when
                            someone gets a promotion, moves location, or personnel changes.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 col-12">
                    <div class="feature-image-mask">
                        <img src="{{ asset('public/backend/dist/img/d-1.png') }}" alt="{LANG_CONTACTLESS_DIGITAL_CARDS}"
                            class="dash-board__img">
                    </div>
                </div>
            </div>

            <div class="row dboard__white bm50">
                <div class="col-lg-6 offset-lg-1 col-sm-6 col-12">
                    <div class="feature-image-mask">
                        <img src="{{ asset('public/backend/dist/img/d-2.png') }}" alt="{LANG_CONTACTLESS_DIGITAL_CARDS}"
                            class="dash-board__img">
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 col-12">
                    <div class="feature-text__white-labeled ">
                        <h4 class="hero__title mb-4">Integration</h4>
                        <p class="sub__text line__hgt">Download contact information of your prospects so you never have a
                            lost opportunity again!</p>
                        <p class="sub__text line__hgt">Save time and input errors by syncing up directly with your CRM. No
                            extra app to download and no more data input.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Dashboard ends --}}

    <!--  Section  Feature  Start -->
    <div id="plans__and__pricing" class="blue__bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-sm-4 text-center">
                    <div class="dashboard-img">
                        <img src="{{ asset('public/backend/dist/img/trophy-lg.png') }}"
                            alt="{LANG_CONTACTLESS_DIGITAL_CARDS}" class="monitor__perp">
                    </div>
                    <div class="plans-price__card text-center">
                        <h4 class="feature__dash">Custom Contests</h4>
                        <p class="feature__dash__sub">Engage your sales staff through contests and<br>reward activities that
                            lead to more sales!</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4 text-center">
                    <img src="{{ asset('public/backend/dist/img/monitor-per.svg') }}"
                        alt="{LANG_CONTACTLESS_DIGITAL_CARDS}" class="monitor__perp">
                    <div class="plans-price__card text-center">
                        <h4 class="feature__dash">Monitor performance </h4>
                        <p class="feature__dash__sub">Manage through the coaching<br>analytics to see what actions are
                            working best<br>for each individual employee.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4 text-center">
                    <img src="{{ asset('public/backend/dist/img/increase-lg.png') }}"
                        alt="{LANG_CONTACTLESS_DIGITAL_CARDS}" class="monitor__perp">
                    <h4 class="feature__dash">Increase Sales </h4>
                    <p class="feature__dash__sub">Make every interaction with prospects to be impactful <br> and effective!
                        Start getting your contact info and social <br> profiles into your prospect’s most treasured
                        possession, their phone!</p>
                </div>

            </div>
        </div>
    </div>
    <!-- Section Feature End -->


    <!-- Section Plans and Pricing  Start -->
    <div class="plans__bg">
        <div class="text-center">
            <h4 class="hero__title">Plans & Pricing</h4>
            <p class="sub__text-3 mb-4">
                <span class="norisk">No risk,</span>
                <span class="poppins__text">30-day money back guarantee! If you don't love your SmarterBizCard!</span>
                simply return it for a full refund!
            </p>


        </div>
        <div class="container">
            <div class="row">
                {{-- @foreach ($fPlans[0]s as $fPlans[0]) --}}
                    <div class="col-lg-4 text-center">
                        <div class="plan__hov plan-card-border two">
                            <div class="pp__img__container pp__custom-mb">
                                <img src="{{ asset('public/backend/images/plans/' . $fPlans[0]->image) }}" alt=""
                                    class="pp__img__two">
                            </div>
                            <div class="plans-price__card text-center">
                                <p class="blue__p mb-0">${{ $fPlans[0]->customize_card }} / Customized Card</p>
                                <h4 class="pkg__name ">{{ $fPlans[0]->name ? $fPlans[0]->name : '' }}</h4>
                                <p class="plan__custom"><span
                                        {{-- class="font-weight-bold  c-span">${{ $fPlans[0]->frequency == 0 ? $fPlans[0]->monthly_price : ($fPlans[0]->frequency == 1 ? $fPlans[0]->annual_price : $fPlans[0]->lifetime_price) }}</span> --}}
                                    per user
                                    {{ $fPlans[0]->frequency == 0 ? 'per month' : ($fPlans[0]->frequency == 1 ? 'per annual' : 'life time') }}
                                </p>
                                <p class="plan__custom">
                                    <span class="font-weight-bold  c-span ">
                                        @if ($fPlans[0]->team_member)
                                            {{ $fPlans[0]->team_member }}
                                    </span>
                                @else
                                    <span class="font-weight-light  c-span ">No team member allowed for this plan</span>
                                @endif
                                </p>
                                <hr class="plan__hr" />
                                @php
                                    $i=0;
                                @endphp
                                    {{-- @foreach ($c_settings as $custom_setting)
                                    
                                        @if ($custom_setting->id === $fPlans[0]->custom_settings[$i]->pivot->custom_setting_id)
                                            <p class="some__hgt mt-2">
                                                {{ $custom_setting->title }}</p>
                                        @else
                                            <p class="some__hgt mt-2 line__through">
                                                {{ $custom_setting->title }}</p>
                                        @endif
                                        @php
                                            $i++;
                                        @endphp
                                    @endforeach --}}
                                    <p class="some__hgt mt-2">Update your card info at any time</p>
                                    <p class="some__hgt mt-2 line__through">Custom Sales Contest</p>
                                    <p class="some__hgt mt-2 line__through">White Labeled Dashboard</p>
                                    <p class="some__hgt mt-2 line__through">Integration With CRM</p>
                @if (!auth()->check())

                    <form action="{{ route('set.session') }}" method="POST">
                        @csrf
                        <input type="hidden" name="p_id" value="{{ $fPlans[0]->id }}">
                        <input type="submit" class="bg__color__btn" value="Get your Card NOW !">
                    </form>
                    <!-- {{ session()->get('payment_route') }} -->
                @else
                    <a href="{{ route('plan.details', $fPlans[0]->id) }}" target="_blank" class="bg__color__btn">Get your
                        Card NOW !
                    </a>
                @endif
            </div>
        </div>
    </div>

    <div class="col-lg-4 text-center">
        <div class="plan__hov plan-card-border two">
            <div class="pp__img__container pp__custom-mb">
                <img src="{{ asset('public/backend/images/plans/' . $fPlans[1]->image) }}" alt=""
                    class="pp__img__two">
            </div>
                    <div class="plans-price__card text-center">
                        <p class="blue__p mb-0">${{ $fPlans[1]->customize_card }} / Customized Card</p>
                        <h4 class="pkg__name ">{{ $fPlans[1]->name ? $fPlans[1]->name : '' }}</h4>
                        <p class="plan__custom"><span
                                class="font-weight-bold  c-span">${{ $fPlans[1]->frequency == 0 ? $fPlans[1]->monthly_price : ($fPlans[1]->frequency == 1 ? $fPlans[1]->annual_price : $fPlans[1]->lifetime_price) }}</span>
                            per user
                            {{ $fPlans[1]->frequency == 0 ? 'per month' : ($fPlans[1]->frequency == 1 ? 'per annual' : 'life time') }}
                        </p>
                        <p class="plan__custom">
                            <span class="font-weight-bold  c-span ">
                                @if ($fPlans[1]->team_member)
                                    {{ $fPlans[1]->team_member }}
                            </span>
                        @else
                            <span class="font-weight-light  c-span ">No team member allowed for this plan</span>
                        @endif
                        </p>
                        <hr class="plan__hr" />
                        @php
                            $i=0;
                        @endphp
                            {{-- @foreach ($c_settings as $custom_setting)
                            
                                @if ($custom_setting->id === $fPlans[1]->custom_settings[$i]->pivot->custom_setting_id)
                                    <p class="some__hgt mt-2">
                                        {{ $custom_setting->title }}</p>
                                @else
                                    <p class="some__hgt mt-2 line__through">
                                        {{ $custom_setting->title }}</p>
                                @endif
                                @php
                                    $i++;
                                @endphp
                            @endforeach --}}
                            <p class="some__hgt mt-2">Update your card info at any time</p>
                                    <p class="some__hgt mt-2">Custom Sales Contest</p>
                                    <p class="some__hgt mt-2">White Labeled Dashboard</p>
                                    <p class="some__hgt mt-2 line__through">Integration With CRM</p>
        @if (!auth()->check())

            <form action="{{ route('set.session') }}" method="POST">
                @csrf
                <input type="hidden" name="p_id" value="{{ $fPlans[1]->id }}">
                <input type="submit" class="bg__color__btn" value="Get your Card NOW !">
            </form>
            <!-- {{ session()->get('payment_route') }} -->
        @else
            <a href="{{ route('plan.details', $fPlans[1]->id) }}" target="_blank" class="bg__color__btn">Get your
                Card NOW !
            </a>
        @endif
        </div>
</div>
</div>

<div class="col-lg-4 text-center">
    <div class="plan__hov plan-card-border two">
        <div class="pp__img__container pp__custom-mb">
            <img src="{{ asset('public/backend/images/plans/' . $fPlans[2]->image) }}" alt=""
                class="pp__img__two">
        </div>
        <div class="plans-price__card text-center">
            <p class="blue__p mb-0">${{ $fPlans[2]->customize_card }} / Customized Card</p>
            <h4 class="pkg__name ">{{ $fPlans[2]->name ? $fPlans[2]->name : '' }}</h4>
            <p class="plan__custom"><span
                    class="font-weight-bold  c-span">${{ $fPlans[2]->frequency == 0 ? $fPlans[2]->monthly_price : ($fPlans[2]->frequency == 1 ? $fPlans[2]->annual_price : $fPlans[2]->lifetime_price) }}</span>
                per user
                {{ $fPlans[2]->frequency == 0 ? 'per month' : ($fPlans[2]->frequency == 1 ? 'per annual' : 'life time') }}
            </p>
            <p class="plan__custom">
                <span class="font-weight-bold  c-span ">
                    @if ($fPlans[2]->team_member)
                        {{ $fPlans[2]->team_member }}
                </span>
            @else
                <span class="font-weight-light  c-span ">No team member allowed for this plan</span>
            @endif
            </p>
            <hr class="plan__hr" />
            @php
                $i=0;
            @endphp
                {{-- @foreach ($c_settings as $custom_setting)
                
                    @if ($custom_setting->id === $fPlans[2]->custom_settings[$i]->pivot->custom_setting_id)
                        <p class="some__hgt mt-2">
                            {{ $custom_setting->title }}</p>
                    @else
                        <p class="some__hgt mt-2 line__through">
                            {{ $custom_setting->title }}</p>
                    @endif
                    @php
                        $i++;
                    @endphp
                @endforeach --}}
                <p class="some__hgt mt-2">Update your card info at any time</p>
                                    <p class="some__hgt mt-2">Custom Sales Contest</p>
                                    <p class="some__hgt mt-2">White Labeled Dashboard</p>
                                    <p class="some__hgt mt-2">Integration With CRM</p>
@if (!auth()->check())

<form action="{{ route('set.session') }}" method="POST">
    @csrf
    <input type="hidden" name="p_id" value="{{ $fPlans[2]->id }}">
    <input type="submit" class="bg__color__btn" value="Get your Card NOW !">
</form>
<!-- {{ session()->get('payment_route') }} -->
@else
<a href="{{ route('plan.details', $fPlans[2]->id) }}" target="_blank" class="bg__color__btn">Get your
    Card NOW !
</a>
@endif
</div>
</div>
</div>
    {{-- @endforeach --}}
    </div>
    </div>
    </div>
    <!-- Section Plans and Pricing End -->


    <!-- Section Testimonial Start -->
    <div class="container-fluid testimonial__bg-pb">
        <div class="row">
            <div class="col-1 kyle__dis"> </div>
            <div class="col-lg-4 col-sm-6 col-12">
                <div class="testimonial__bg__container">
                    <img src="{{ asset('public/backend/dist/img/test-bg.svg') }}" alt="{LANG_CONTACTLESS_DIGITAL_CARDS}"
                        class="testimonial__bg__img">
                </div>
                <div class="testimonial__char__container">
                    <img src="{{ asset('public/backend/dist/img/rect.png') }}" alt="{LANG_CONTACTLESS_DIGITAL_CARDS}"
                        class="testimonial__char__img">
                </div>
            </div>
            <div class="col-1  kyle__dis"> </div>
            <div class="col-lg-5 col-sm-6 col-12">
                <div class="testimonail__text__container">
                    <h4 class="testimonial__text">
                        &ldquo; I cannot be more grateful to have found SmarterBizCard. I carry just one card and it saves
                        the day when I’m meeting new people. &rdquo;
                    </h4>
                    <h4 class="testimonial__signature">Kyle Killit</h4>
                    <p class="testimonial__desig">CEO, TechInvest</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Section Testimonial End -->
    <!-- Section Blogs Starts -->

    <div class="blog__container">
        <div class="container blog__mb">
            <div class="row">
                <div class="col-12">
                    <h4 class="text-center hero__title pb-4">Blogs</h4>
                    <a href="{{route('blog')}}" target="_blank" class="admin__button mt-1 mb-3 float-right">View all</a>
                </div>
            </div>
            <div class="row">
                @php
                    $fBlogs = DB::table('blogs')
                        ->join('users as ur', 'blogs.author', 'ur.id')
                        ->select('blogs.*', 'ur.username')
                        ->where('blogs.status', 1)
                        ->orderBy('id', 'DESC')
                        ->limit(4)
                        ->get();
                @endphp
                @foreach ($fBlogs as $fBlog)
                    <div class="col-lg-3 col-sm-6 col-12">
                        <a href="{{ route('blog.single-blog', $fBlog->id) }}" target="_blank">
                            <div class="blog__post b_pb"
                                style="background-image: url('{{ asset('public/assets/images/blogs/' . $fBlog->image) }}');">
                                <div class="blog__details">
                                    <p class="p__one">
                                        {{ date('d M, Y', strtotime($fBlog->created_at ? $fBlog->created_at : '')) }}</p>
                                    <h4> {{ $fBlog->title ? $fBlog->title : '' }} </h4>
                                    @php
                                        $removePhp = strip_tags($fBlog->description);
                                    @endphp
                                    <p class="p__two">{!! $removePhp ? Str::limit($removePhp, 70) : '' !!}</p>
                                    <a href="{{ route('blog.single-blog', $fBlog->id) }}" target="_blank"
                                        class="admin__button mt-1">{{ $fBlog->username ? $fBlog->username : '' }}</a>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    {{-- section Footer --}}
    <div id="footer">
        <div class="footer__color">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-sm-12">
                        <div class="footer-logo">
                            <img src="{{ asset('public/backend/dist/img/website-logo.png') }}" alt=""
                                class="footer__img">
                        </div>
                        <p class="my__footer__text">Get a SmarterBizCard and get into the CONTACTS of your prospects cell
                            phone and share your social profiles with a tap of the business card!</p>
                    </div>

                    <div class="col-xl-2 col-lg-2 col-6">
                        <div class="footer-links">
                            <h3 class="footer__head">Company</h3>
                            <ul class="footer__link__ul">

                                <li> <i class="fas fa-arrow-right"></i><a href="{{url('/')}}"
                                        class="footer__fet">Home</a></li>
                                <li> <i class="fas fa-arrow-right"></i><a href="{{url('/')}}#compaitable">Features</a></li>
                                <li> <i class="fas fa-arrow-right"></i><a href="{{url('/')}}#plans__and__pricing">Pricing</a></li>

                                <li> <i class="fas fa-arrow-right"></i><a href="#" class="footer__fet">For Sales
                                        Managers</a></li>
                                <li> <i class="fas fa-arrow-right"></i><a href="{{route('login')}}" class="footer__fet">Get my
                                        Card NOW</a></li>
                                <li> <i class="fas fa-arrow-right"></i><a href="{{ route('blog') }}"
                                        class="footer__fet">Blog</a></li>

                            </ul>
                        </div>
                    </div>

                    <div class="col-xl-2 col-lg-2 col-6">
                        <div class="footer-links">
                            <h3 class="footer__head">Product</h3>
                            <ul class="footer__link__ul">
                                <li><i class="fas fa-arrow-right"></i><a href="{LINK_FAQ}" class="footer__fet">Analytics</a>
                                </li>
                                <li><i class="fas fa-arrow-right"></i><a href="{LINK_FEEDBACK}"
                                        class="footer__fet">Businessess</a></li>
                                <li><i class="fas fa-arrow-right"></i><a href="{LINK_REPORT}"
                                        class="footer__fet">Testimonials</a></li>
                                <li><i class="fas fa-arrow-right"></i><a href="{LINK_CONTACT}"
                                        class="footer__fet">Integrations</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-xl-2 col-lg-2 col-md-4 col-12">
                        <div class="footer-links">
                            <h3 class="footer__head">Legal</h3>
                            <ul class="footer__link__ul">
                                {{-- <li><i class="fas fa-arrow-right"></i><a href="{LINK_FAQ}" class="footer__fet">Privacy
                                        Policy</a></li> --}}
                                <li><i class="fas fa-arrow-right"></i><a href="{{route('privacy')}}" class="footer__fet">Privacy
                                        Policy</a></li>
                                <li><i class="fas fa-arrow-right"></i><a href="{{route('terms')}}" class="footer__fet">Terms of
                                        Use</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-3  col-12">
                        <div class="">
                            <h3 class="signup__head">Sign up for our newsletter</h3>
                            <div class="bootstrap__form">
                                <form class="example" action="" style="margin:auto;max-width:500px">
                                    <input type="text" placeholder=" Email" name="search2" class="footer__example">
                                    <button type="submit" class="footer__example">subscribe</button>
                                </form>
                            </div>

                            <div class="">
                                <div class="footer__row">
                                    <ul class="footer__rows__right__link">

                                        <li>
                                            <a href="{FACEBOOK_LINK}" target="_blank" rel="nofollow">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="{TWITTER_LINK}" target="_blank" rel="nofollow">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="{INSTAGRAM_LINK}" target="_blank" rel="nofollow">
                                                <i class="fa fa-instagram"></i>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="{LINKEDIN_LINK}" target="_blank" rel="nofollow">
                                                <i class="fa fa-linkedin"></i>
                                            </a>
                                        </li>

                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    {{-- section Footer  Ends --}}

    {{-- Entreprenuer Starts --}}

    {{-- <div class="section__bg__ent">
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
                   <h4>Entreprenuer</h4>
                   <p class="ent__rgt__price">$30 per card</p>
                   <div class="rating__box">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                   </div>
                   <ul class="ent__ul mt-2">
                    <li class="ent__list"><i class="fas fa-check-circle" style="color:#39BB7E;"></i>Update your card info at any time</li>
                    <li class="ent__list"><i class="fas fa-check-circle" style="color:#BFBFBF;"></i>  <span style="text-decoration: line-through;"> Custom Sales Contest</span></li>
                    <li class="ent__list"><i class="fas fa-check-circle" style="color:#BFBFBF;"></i> <span style="text-decoration: line-through;">White Labeled Dashboard</span></li>
                    <li class="ent__list"><i class="fas fa-check-circle" style="color:#BFBFBF;"></i> <span style="text-decoration: line-through;"> Integration with CRM</span></li>
                </ul>
               </div>

               <span class="ent__bod"></span>
                <p class="get__card__text">Get a SmarterBizCard and get into the CONTACTS of your prospects cell phone and share your social profiles with a tap of the business card!</p>
               <img src="{{ asset('public/backend/dist/img/hehe.png') }}" alt="" class="payment__img">
                <div class="order__now-btn">
                    <a href="#" target="_blank" class="order__now mt-1 mb-3">ORDER NOW</a>
                </div>
           </div>
        </div>
      </div>
     </div>  

      <div class="hiw__pb-65">
        <div class="container">
            <div class="row  bp25">
                <div class="col-xl-12 text-center">
                    <div class="section-headline centered margin-top-0 margin-bottom-5">
                        <h6 class="how__it__works__head pt-4">How it Works?</h6>
                        <p class="small__heading my-side">The product is simple to use and even easier to share:</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-xl-4 col-sm-12">
                    <div class="video__left__container">
                         <p>1. Select the card plan that fits your business needs.‍</p>
                         <p>2. When you receive your card in the mail, you fill out your own contact info and social networks into your unique SmarterBizCard Profile.‍</p>
                         <p>3.When you are meeting with a prospect either tap the top of their phone or have them scan the QR Code to download you contact information directly to their phone and connect to your social profiles.‍</p>
                         <p>4. Ask the prospect to share their contact information with you so you can easily follow up with them in the future.</p>
                         <p>No extra apps needed. Update your information anytime. It’s just that easy!</p>
                         <a href="{{ route('payment-invoice', 1) }}" target="_blank" class="bg__color__btn">Get your Card NOW !</a>
                    </div>
                </div>
                <div class="col-xl-7 col-sm-12">
                    <div class="video__container">
                        <iframe class="how__it" width="100%" 
                        src="https://www.youtube.com/embed/ZcVmmDUHkl8" title="YouTube video player" 
                        frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                         allowfullscreen>
                        </iframe>
                    </div>
                </div>
            </div>
          
        </div>
    </div> --}}

    <!-- Section How it Work End-->
    {{-- Entreprenuer Ends --}}


    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal__from__bottom">
            <div class="modal-content modal__footer__bm animate-bottom">
                <div class="modal-header bottom__header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        {{-- <span aria-hidden="true">&times;</span> --}}
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                </div>
                <div class="container">
                    <div class="row padding__left">
                        <div class="col-lg-3">
                            <h4 class="modal__head__text">Apple</h4>
                            <p class="mod__sub__text">All phones since 2017 including:</p>
                            <ul class="modal__ul mt-2">
                                <li><i class="fas fa-check-circle"></i>Iphone 8 Series</li>
                                <li><i class="fas fa-check-circle"></i>Iphone X Series</li>
                                <li><i class="fas fa-check-circle"></i>Iphone 11 Series</li>
                                <li><i class="fas fa-check-circle"></i>Iphone 12 Series</li>
                                <li><i class="fas fa-check-circle"></i>Iphone SE (2020)</li>
                            </ul>
                        </div>
                        <div class="col-lg-3">
                            <h4 class="modal__head__text">OnePlus</h4>
                            <p class="mod__sub__text">All phones since 2015 including:</p>
                            <ul class="modal__ul mt-2">
                                <li><i class="fas fa-check-circle"></i>3 Series, 5 Series</li>
                                <li><i class="fas fa-check-circle"></i>6 Series, 7 Series</li>
                                <li><i class="fas fa-check-circle"></i>8 Series</li>
                            </ul>
                        </div>
                        <div class="col-lg-3">
                            <h4 class="modal__head__text">Samsung</h4>
                            <p class="mod__sub__text">All phones since 2014 including:</p>
                            <ul class="modal__ul mt-2">
                                <li><i class="fas fa-check-circle"></i>S Series</li>
                                <li><i class="fas fa-check-circle"></i>A Series</li>
                            </ul>
                        </div>
                        <div class="col-lg-3">
                            <h4 class="modal__head__text">HTC</h4>
                            <p class="mod__sub__text">All phones since 2015.</p>
                            <ul class="modal__ul mt-2">
                                <li><i class="fas fa-check-circle"></i>S Series</li>
                                <li><i class="fas fa-check-circle"></i>Nexus Series</li>
                            </ul>
                        </div>
                    </div>

                    <div class="row mod__pm padding__left">
                        <div class="col-lg-3">
                            <h4 class="modal__head__text">LG</h4>
                            <p class="mod__sub__text">All phones since 2015 including:</p>
                            <ul class="modal__ul mt-2">
                                <li><i class="fas fa-check-circle"></i>Q Series</li>
                                <li><i class="fas fa-check-circle"></i>G Series</li>
                                <li><i class="fas fa-check-circle"></i>V Series</li>
                            </ul>
                        </div>
                        <div class="col-lg-3">
                            <h4 class="modal__head__text">Nokia</h4>
                            <ul class="modal__ul mt-2">
                                <li><i class="fas fa-check-circle"></i>9 Pureview</li>
                                <li><i class="fas fa-check-circle"></i>8, 8 Sirocco,</li>
                                <li><i class="fas fa-check-circle"></i>6, 7 Plus</li>
                                <li><i class="fas fa-check-circle"></i>3, 5, 5.1</li>
                            </ul>
                        </div>
                        <div class="col-lg-3">
                            <h4 class="modal__head__text">Huawei</h4>
                            <p class="mod__sub__text">All phones since 2014 including:</p>
                            <ul class="modal__ul mt-2">
                                <li><i class="fas fa-check-circle"></i>P Series</li>
                                <li><i class="fas fa-check-circle"></i>A Series</li>
                            </ul>
                        </div>
                        <div class="col-lg-3">
                            <h4 class="modal__head__text">Google</h4>
                            <p class="mod__sub__text">All phones since 2015 includings:</p>
                            <ul class="modal__ul mt-2">
                                <li><i class="fas fa-check-circle"></i>Pixel Series</li>
                                <li><i class="fas fa-check-circle"></i>Nexus Series</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
