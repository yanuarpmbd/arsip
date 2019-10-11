<div class="ibox float-e-margins">
    <div class="ibox-content">

        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif

        <div class="ibox-content">
            <form class="form-horizontal" action="{{route('lemari.update', $edit->id)}}" method="post">
                @method('PATCH')
                @csrf
                <div class="form-group"><label class="col-lg-2 control-label">Kode Lemari</label>
                    <div class="col-lg-10">
                        <input placeholder="Kode Lemari" name="lemari" id="lemari" class="form-control" value="{{$edit->kode_lemari}}">
                        <span class="help-block m-b-none"><hr></span>
                    </div>
                </div>

                <div class="form-group"><label class="col-lg-2 control-label">Jenis Izin</label>
                    <div class="col-lg-10">
                        <select class="select2_demo_2 form-control" name="jns_izin_id" id="jns_izin_id" multiple="multiple">
                            @foreach($dropdown2 as $d)
                                <option value="{{$d->id}}">{{$d->nama_izin}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-sm btn-outline-primary" type="submit" name="submit" id="submit">Submit</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
