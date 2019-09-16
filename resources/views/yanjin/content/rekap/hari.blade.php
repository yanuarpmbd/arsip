<div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Data HARIAN</h5>
            <div class="ibox-tools">

                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>
            </div>
        </div>
        <div class="ibox-content">

            <table class="table table-hover" id="table2excelharian">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Kode Lemari</th>
                    <th>Kode Dus</th>
                    <th>Nama PT</th>
                    <th>Nomor SK</th>
                    <th>Jenis Izin</th>
                    <th>PJ Izin</th>
                </tr>
                </thead>
                <tbody>
                @foreach($today as $index => $t)
                    <tr>
                        <td>
                            {{ $index + $today->firstItem() }}
                        </td>
                        <td>{{$t->lemari->kode_lemari}}</td>
                        <td>{{$t->dus_id}}</td>
                        <td>{{$t->nama_pt}}</td>
                        <td>{{$t->no_sk}}</td>
                        <td>{{$t->jenis->nama_izin}}</td>
                        <td>{{$t->pj->nama_pj}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <button class="btn btn-danger" style="align-content: center; text-align: center" id="btntable2excelharian">Save it</button>
            {{ $today->appends(array_filter(request()->except('page')))->render() }}
        </div>
    </div>
</div>
