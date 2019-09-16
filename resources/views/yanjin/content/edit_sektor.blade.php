<div class="ibox float-e-margins">
    <div class="ibox-content">

        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif

        <div class="ibox-content">
            <form class="form-horizontal" action="{{route('sektor.update', $edit->id)}}" method="post">
                @method('PATCH')
                @csrf
                <div class="form-group"><label class="col-lg-2 control-label">Nama Sektor</label>
                    <div class="col-lg-10">
                        <input placeholder="Nama Sektor" name="sektor" id="sektor" class="form-control" value="{{$edit->nama_sektor}}">
                        <span class="help-block m-b-none"><hr></span>
                    </div>
                </div>

                <div class="form-group"><label class="col-lg-2 control-label">Kode Sektor</label>
                    <div class="col-lg-10">
                        <input placeholder="Kode Sektor" name="kode_sektor" id="kode_sektor" class="form-control" value="{{$edit->kode_sektor}}">
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
