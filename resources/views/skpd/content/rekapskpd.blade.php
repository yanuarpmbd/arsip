<div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Data Arsip SK {{$user}}</h5>
        </div>
        <div class="ibox-content">
            <form action="{{ route('rekap.skpd') }}">
                <div class="form-group" id="data_4">
                    <label class="font-normal">Bulan</label>
                    <div class="input-group date">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" name="bulan" class="form-control">
                    </div>
                    <label class="font-normal">Tahun</label>
                    <select class="select2_demo_2 input-group form-control" name="tahun" id="tahun">
                        @foreach($year as $y)
                            <option value="{{$y->year}}">{{$y->year}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-sm btn-white" type="submit">Submit</button>
                </div>
            </form>
        </div>
        <div class="ibox-content">
            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search.. ">
            <table class="table table-hover" id="table2excelsektor">
                <thead>
                <tr>
                    <th>Nama Pemilik/BU</th>
                    <th>Nomor SK</th>
                    <th>Tanggal SK</th>
                    <th>Jenis Izin</th>
                    <th>Download SK</th>
                </tr>
                </thead>
                <tbody>

                @foreach($record as $t)
                    <tr>
                        <td>{{$t->nama_pt}}</td>
                        <td>{{$t->no_sk}}</td>
                        <td>{{$t->tanggal}}</td>
                        <td>{{$t->jenis->nama_izin}}</td>
                        <td>
                            <form action="{{route('download.sk', $t->id)}}">
                                <button class="btn btn-block btn-outline-success">Download</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                  {{$record->appends(request()->input())->links()}}
                </tbody>

            </table>
          {{--  {{$record->appends(request()->input())->links()}}--}}
           {{-- <button class="btn btn-danger" style="align-content: center; text-align: center" id="table2excelsektor">Save it</button>--}}
        </div>
    </div>
</div>

