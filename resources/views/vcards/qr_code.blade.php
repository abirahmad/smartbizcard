@extends('layouts.master')
@section('content')
    <section class="content">
        <div class="content-wrapper pb-5">
            <div class="col-12">
                <div class="row no-print">
                    <div class="col-lg-9 col-md-6">
                        <h2 class="pt-3 ml-3">QR Builder</h2>
                    </div>
                    <div class="col-lg-3 col-md-6 pt-lg-4">

                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}" class="transaction-text">Home</a>
                            </li>
                            <li class="breadcrumb-item active">QR Builder</li>
                        </ol>
                    </div>
                </div>
                <div class="row  mt-3">
                    <?php if (isset($_GET['uid'])) {
                        $somevar = $_GET['uid'];
                    } else {
                        $somevar = 100;
                    } ?>
                    <div class="col-lg-4 col-md-6 mb-5 no-print">

                        <div class="card  qr-link ml-3">
                            <div class="card-header code-generator-title">

                                <h4> <i class="fas fa-cog mr-1" style="color:#0A84FF"></i> QR Code Generator</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('qrCode.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="float-left">
                                        <h5 class="card-title  title">Foreground Color</h5>
                                    </div>
                                    <div class="float-right">
                                        <input type="color" name="foreground_color" class="color-input-style"
                                            value="{{ !empty($qrCode->foreground_color) ? $qrCode->foreground_color : '#fffff' }}">
                                    </div>

                                    <div class="clearfix"></div>

                                    <div class="mt-4">
                                        <div class="float-left">
                                            <h5 class="card-title  title">Background Color</h5>
                                        </div>
                                        <div class="float-right">
                                            <input type="color" name="background_color" class="color-input-style"
                                                value="{{ !empty($qrCode->background_color) ? $qrCode->background_color : '#fffff' }}">
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>

                                    <div>
                                        <h5 class="mt-2">Size</h5>
                                        <div class="slidecontainer">
                                            <input type="range" id="sizeRange" name="qr_size" min="1" max="350"
                                                value="{{ !empty($qrCode['qr_size']) ? $qrCode['qr_size'] : 300 }}"
                                                class="slider qr_size" id="myRange" onchange="rangeSize()">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-warning qr-setting text-white mb-4 mt-4">Save
                                        Settings</button>
                                </form>
                            </div>


                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">

                        <div class="card  Qr-bar qr-code-box">
                            <div class="card-header code-generator-title no-print">
                                <h4> <i class="fas fa-border-all mr-1" style="color:#0A84FF"></i> QR Code </h4>
                            </div>

                            <div class="card-body Qr-code-body yes-print">
                                @php
                                    if (!empty($qrCode->foreground_color)) {
                                        $hex_foreground = $qrCode->foreground_color;
                                        [$r, $g, $b] = sscanf($hex_foreground, '#%02x%02x%02x');
                                    }
                                    $hex_background = !empty($qrCode->background_color) ? $qrCode->background_color : '#00000';
                                    [$i, $j, $k] = sscanf($hex_background, '#%02x%02x%02x');
                                    $hex_text = !empty($qrCode->text_color) ? $qrCode->text_color : '#00000';
                                    [$l, $m, $n] = sscanf($hex_text, '#%02x%02x%02x');
                                    
                                @endphp

                                @if (!is_null($url) && !empty($qrCode->qr_size))
                                    <a>{{ QrCode::size($qrCode->qr_size)->backgroundColor($i, $j, $k)->color($r, $g, $b)->generate($url->card_url) }}</a>
                                    {{-- <img src="{!!QrCode::format('png')->generate('Embed me into an e-mail!'), 'QrCode.png', 'image/png'!!}"> --}}
                            </div>
                            <a href="#" class="btn btn-primary mt-3 mb-4 py-2 download-btn ml-3 no-print" style="size: {{$qrCode->qr_size}}px" onclick="window.print()"><i
                                    class="fa fa-download"></i>
                                Download Image</a>
                        @else
                            @if (!empty($qrCode->qr_size))
                                <a>{{ QrCode::size($qrCode->qr_size)->generate(url()->current()) }}</a>
                            @else
                                <a>{{ QrCode::size(300)->generate(url()->current()) }}</a>
                            @endif
                        </div>
                        <a class="btn btn-primary mt-3 mb-4 py-2 download-btn ml-3"><i class="fa fa-download"></i>
                            Download Image</a>
                        @endif
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 no-print">
                    <div class="card  qr-link mr-lg-3 ml-lg-0 mr-md-0 ml-md-3 qr-code-box">
                        <div class="card-header code-generator-title">
                            <h4> <i class="fas fa-link mr-1" style="color:#0A84FF"></i> Helpful Links</h4>

                        </div>
                        <div class="card-body Qr-code-body mt-3">
                            <a href="{{ route('vcard.create') }}">
                                <p class="link-text"><i class="far fa-edit mr-1"></i> Edit VCard</p>
                            </a>
                            <a href="#">
                                <p class="link-text"><i class="fas fa-download mr-1"></i> Download QR Code</p>
                            </a>
                            <a href="{{ url('smart-vcard/' . $user->username . '/' . $user->username) }}"
                                target="__blank">
                                <p class="link-text"><i class="far fa-eye mr-1"></i> Live Preview</p>
                            </a>
                        </div>

                    </div>
                </div>

            </div>
        </div>
        </div>
        </div>

    </section>

@endsection

<script>
    function rangeSize() {
        const pickr1 = new Pickr({
            el: '#color-picker-1',
            default: "303030",
            components: {
                preview: true,
                opacity: true,
                hue: true,

                interaction: {
                    hex: true,
                    rgba: true,
                    hsla: true,
                    hsva: true,
                    cmyk: true,
                    input: true,
                    clear: true,
                    save: true
                }
            }
        });
</script>
<style media="print">
    .no-print {
        display: none;
    }

    .yes-print {
        display: block !important;
    }

</style>
