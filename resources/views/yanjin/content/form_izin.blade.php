<div class="ibox float-e-margins">

        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif

        <div class="ibox-content">
            <form class="form-horizontal" action="{{route('izin.submit')}}" method="post">
                @csrf
                <div class="form-group"><label class="col-lg-2 control-label">Nama Izin</label>
                    <div class="col-lg-10"><input placeholder="Nama Izin" name="nama_izin" id="nama_izin"
                                                  class="form-control">
                    </div>
                </div>

                <div class="form-group"><label class="col-lg-2 control-label">Sektor</label>
                    <div class="col-md-4">

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
