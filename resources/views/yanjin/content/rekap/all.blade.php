<div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Data Dukung yg berlum terisi</h5>
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
                    <th>Data Dukung</th>
                </tr>
                </thead>
                <tbody>
                <?php $i=0 ?>
                @foreach($record as $t)
                    <?php $i++ ?>
                    <tr>
                        <td>
                            {{$i}}
                        </td>
                        <td>{{$t->lemari->kode_lemari}}</td>
                        <td>{{$t->dus_id}}</td>
                        <td>{{$t->nama_pt}}</td>
                        <td>{{$t->no_sk}}</td>
                        <td>{{$t->jenis->nama_izin}}</td>
                        <td>{{$t->pj->nama_pj}}</td>
                        <td>
                            <div class="col-sm-6">

                                <a href="{{route('edit.all', $t->id)}}">

                                    <div class="btn btn-primary" type="submit" id="edit">
                                        <i class="glyphicon glyphicon-edit"></i>
                                    </div>

                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{$record->appends(request()->input())->links()}}
            <button class="btn btn-danger" style="align-content: center; text-align: center" id="table2excelharian">Save it</button>
        </div>
    </div>
</div>
