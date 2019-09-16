<div class="ibox float-e-margins">

        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif

        <div class="ibox-content">
            <form class="form-horizontal" action="{{route('lemari.submit')}}" method="post">
                @csrf
                <div class="form-group"><label class="col-lg-2 control-label">Kode Lemari</label>
                    <div class="col-lg-10"><input placeholder="Kode Lemari" name="lemari" id="lemari"
                                                  class="form-control">
                    </div>
                </div>

                <div class="form-group"><label class="col-lg-2 control-label">Jenis Izin yg diampu</label>
                    <div class="col-md-4">

                        <select class="select2_demo_2 form-control" name="jns_izin_id" id="jns_izin_id" multiple="multiple">
                            @foreach($dropdown as $d)
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
