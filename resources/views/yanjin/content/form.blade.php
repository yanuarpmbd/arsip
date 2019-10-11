<div class="col-6">
<div class="ibox float-e-margins">

        @include('yanjin.layouts.search')

</div>

<div class="ibox float-e-margins">
    <div class="ibox-content">

        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif

        <div class="ibox-content">
            <form class="form-horizontal" action="{{route('arsip.submit')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group"><label class="col-lg-4 control-label">Nama BU/ Pemilik *</label>
                    <div class="col-lg-8"><input placeholder="Nama Badan Usaha atau Nama Pemilik" name="nama_pt" id="nama_pt"
                                                  class="form-control" required> {{--<span class="help-block m-b-none">Example block-level help text here.</span>--}}
                    </div>
                </div>

                <div class="form-group" id="data_1"><label class="col-lg-4 control-label">Tanggal SK *</label>
                    <div class="col-lg-8">
                        <div class="input-group date">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            <input type="text" name="tanggal" id="tanggal" class="form-control" value="{{$today}}" required>
                        </div>
                    </div>
                </div>

                <div class="form-group"><label class="col-lg-4 control-label">Nomor SK *</label>
                    <div class="col-lg-8"><input placeholder="Nomor SK" name="no_sk" id="no_sk" class="form-control" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-4 control-label">SK *</label>
                    <div class="col-lg-8">
                        <input placeholder="SK" name="file_sk" id="file_sk" class="form-control" type="file" required>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label class="col-lg-4 control-label">Data Dukung</label>
                    <div class="col-lg-8">
                        <input placeholder="Data Dukung" name="data_dukung" class="form-control" type="file" >
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>

                <div class="form-group"><label class="col-lg-4 control-label">Kab/Kota *</label>
                    <div class="col-lg-8">

                        <select class="select2_demo_2 form-control" name="kabkota" id="kabkota" multiple="multiple" required>
                            @foreach($dropdown4 as $d4)
                                <option value="{{$d4->id}}">{{$d4->nama_kabkota}}</option>
                            @endforeach
                        </select>

                    </div>
                </div>

                <div class="form-group"><label class="col-lg-4 control-label">Penanggungjawab *</label>
                    <div class="col-lg-8">

                        <select class="select2_demo_2 form-control" name="nama_pj" id="nama_pj" multiple="multiple" required>
                            @foreach($dropdown3 as $d3)
                                <option value="{{$d3->id}}">{{$d3->nama_pj}}</option>
                            @endforeach
                        </select>

                    </div>
                </div> {{--PENANGGUNGJAWAB IZIN--}}

                <div class="form-group"><label class="col-lg-4 control-label">Jenis Izin *</label>
                    <div class="col-lg-8">

                        <select class="select2_demo_2 form-control" name="jns_izin_id" id="jns_izin_id"
                                multiple="multiple" required>
                            @foreach($dropdown as $d)
                                <option value="{{$d->id}}">{{$d->nama_izin}}</option>
                            @endforeach
                        </select>

                    </div>
                </div> {{--JENIS IZIN--}}

                <div class="form-group"><label class="col-lg-4 control-label">Dus *</label>
                    <div class="col-lg-8"><input placeholder="Kode Dus" name="dus" id="dus" class="form-control" required></div>
                </div>

                <div class="form-group"><label class="col-lg-4 control-label">Lemari *</label>
                    <div class="col-lg-8">

                        <select class="select2_demo_2 form-control" name="lemari" id="lemari" multiple="multiple" required>
                            @foreach($dropdown2 as $d2)
                                <option value="{{$d2->id}}">{{$d2->kode_lemari}}</option>
                            @endforeach
                        </select>

                    </div>
                </div>

                <div class="form-group"><label class="col-lg-4 control-label">Saf *</label>
                    <div class="col-lg-8"><input placeholder="Saf" name="saf" id="saf" class="form-control" required></div>
                </div>

                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-sm btn-white" type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
