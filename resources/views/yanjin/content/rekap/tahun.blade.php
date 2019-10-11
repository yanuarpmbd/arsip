<div class="row">
    <form action="{{ route('rekap.tahun') }}">
        <div class="col-sm-4">

        </div>
        <div class="col-sm-4">

            <div class="form-group">
                <div class="col-md-12">
                    <label class="font-normal">Tahun</label>
                    <select class="select2_demo_2 input-group form-control" name="tahun" id="tahun">
                        @foreach($year as $y)
                            <option value="{{$y->year}}">{{$y->year}}</option>
                        @endforeach
                    </select>

                </div>
            </div>

            <div class="space-15">
            </div>
            <div class="form-group" >
                <div style="align-items: center">
                    <button class="btn btn-sm btn-white" type="submit">Submit</button>
                </div>
            </div>
        </div>
        <div class="col-sm-4">

        </div>
    </form>
</div>

<div class="space-30"></div>

<div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Data Per Tahun</h5>
            <div class="ibox-tools">

                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>
            </div>
        </div>
        <div class="ibox-content">

            <table class="table table-hover" id="table2exceltahun">
                <thead>
                <tr>
                    <th>#</th>
                    {{-- <th>Kode Lemari</th>--}}
                    <th>Kode Dus</th>
                    <th>Nama PT</th>
                    <th>Nomor SK</th>
                    <th>Jenis Izin</th>
                    <th>PJ Izin</th>
                </tr>
                </thead>
                <tbody>
                @foreach($record as $index => $t)
                    <tr>
                        <td>
                            {{ $index + $record->firstItem() }}
                        </td>
                        {{--     <td>{{$t->lemari->kode_lemari}}</td>--}}
                        <td>{{$t->dus_id}}</td>
                        <td>{{$t->nama_pt}}</td>
                        <td>{{$t->no_sk}}</td>
                        <td>{{$t->jenis->nama_izin}}</td>
                        <td>{{$t->pj->nama_pj}}</td>
                    </tr>
                @endforeach
                </tbody>

            </table>
            <button class="btn btn-danger" style="align-content: center; text-align: center" id="btntable2exceltahun">Save it</button>
            {{ $record->appends(array_filter(request()->except('page')))->render() }}
        </div>
    </div>
</div>

