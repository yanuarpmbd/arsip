<div class="ibox float-e-margins">
@include('yanjin.layouts.search')
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-content">
                <h2>
                    {{count($cari)}} hasil ditemukan untuk : <span class="text-navy">“{{$keywords}}”</span>
                </h2>
                <small>berikut adalah data pencarian anda :</small>

                <div class="hr-line-dashed"></div>
            </div>
        </div>
    </div>
</div>


<div class="space-30"></div>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-content">
@foreach($cari as $c)


    {{--<strong>{{$lemari}}</strong> <br>
    {{$c->dus_id}}<br>
    {{$c->saf_id}}<br>--}}
    <br><br>
<div class="row">
    <div class="span6" style="float: none; margin: 0 auto;">
        <div class="col-lg-12">
            <div class="widget me-bg no-padding">
                <div class="p-m">
                    <h1 class="m-xs">{{$c->nama_pt}}</h1>
                    <div class="hr-line-ku"></div>
                    <h3 class="font-bold no-margins">
                        {{$c->no_sk}}
                    </h3>
                    <h3 class="font-bold no-margins">
                        {{$c->nama_pemilik}}
                    </h3>
                    <small>{{$c->sektor->nama_sektor}}</small>
            </div>
            </div>
        </div>
        {{--<div class="row">--}}
            <div class="span6" style="float: none; margin: 0 auto;">
                <div class="col-lg-4">
                    <div class="widget lazur-bg p-lg text-center">
                        <div class="m-b-md">
                            <h3 class="font-bold no-margins">
                                Nama Lemari
                            </h3>
                            <h1 class="m-xs">{{$c->lemari->kode_lemari}}</h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="widget lazur-bg p-lg text-center">
                        <div class="m-b-md">
                            <h3 class="font-bold no-margins">
                                DUS
                            </h3>
                            <h1 class="m-xs">{{$c->dus_id}}</h1>

                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="widget style1 yellow-bg">
                        <div class="row vertical-align">
                            <div class="col-xs-3">
                                <small>kode arsip</small>
                            </div>
                            <div class="col-xs-9 text-right">
                                <h2 class="font-bold">
                                    <strong>{{$c->unique_id}}</strong>
                                </h2>
                            </div>
                        </div>
                    </div>

                    <div class="widget style1 red-bg">
                        <div class="row vertical-align">
                            <div class="col-xs-3">
                                <small>Saf ke</small>
                            </div>
                            <div class="col-xs-9 text-right">
                                <h2 class="font-bold">
                                    <strong>{{$c->saf_id}}</strong>
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        {{--</div>--}}

    </div>
</div>
                    <div class="hr-line-dashed"></div>
@endforeach
{{--three--}}

            </div>
        </div>
    </div>
</div>
