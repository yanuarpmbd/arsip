<div class="ibox float-e-margins">
    <div class="ibox-content">

        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif

        <div class="ibox-content">
            <form class="form-horizontal" action="{{route('izin.update', $edit->id)}}" method="post">
                @method('PATCH')
                @csrf
                <div class="form-group"><label class="col-lg-2 control-label">Nama Jenis Izin</label>
                    <div class="col-lg-10">
                        <input placeholder="Nama Sektor" name="nama_izin" id="izin" class="form-control" value="{{$edit->nama_izin}}">
                        <span class="help-block m-b-none"><hr></span>
                    </div>
                </div>

                <div class="form-group"><label class="col-lg-2 control-label">Kode Sektor</label>
                    <div class="col-lg-10">
                        <select class="select2_demo_2 form-control" name="sektor" id="sektor" multiple="multiple">
                            @foreach($dropdown2 as $d)
                                <option value="{{$d->id}}">{{$d->nama_sektor}}</option>
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
