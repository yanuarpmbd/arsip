<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Status Peminjaman</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">


                <form method="post" class="form-horizontal" action="{{route('update.peminjam', $edit->id)}}">
                    @method('PATCH')
                    @csrf

                    <div class="form-group"><label class="col-sm-2 control-label">Nama</label>

                        <div class="col-sm-10"><input type="text" name="nama" class="form-control" value="{{$edit->nama}}" readonly></div>

                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group"><label class="col-sm-2 control-label">Kode Arsip</label>

                        <div class="col-sm-8">
                            <input type="text" name="kode_arsip" id="kode_arsip" class="form-control" value="{{$edit->kode_arsip}}" readonly>
                        </div>
                        <div class="col-sm-2">
                            <a onclick="myFunction()">Copy text</a>
                        </div>

                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group"><label class="col-sm-2 control-label">Tanggal Pinjam</label>

                        <div class="col-sm-10"><input type="text" name="tanggal" class="form-control" value="{{$edit->tanggal}}" readonly></div>

                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group" id="data_1"><label class="col-lg-2 control-label">Tanggal Kembali</label>
                        <div class="col-lg-10">
                            <div class="input-group date">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                <input type="text" name="tanggal_kembali" id="tanggal_kembali" class="form-control" value="{{$today}}">
                            </div>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-2">
                            <button class="btn btn-primary"><a href="{{route('arsip.form')}}" style="color: white">Cari</a></button>
                            <button class="btn btn-white" type="submit">Cancel</button>
                            <button class="btn btn-primary" type="submit">Save changes</button>
                        </div>
                    </div>
                </form>


            </div>
        </div>
    </div>
</div>
