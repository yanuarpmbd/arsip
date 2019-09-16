<div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Data Peminjam Arsip</h5>
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>
            </div>
        </div>
        <div class="ibox-content">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Kode Arsip</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th style="background: orangered">Aksi</th>
                </tr>
                </thead>
                <tbody>

                <?php $i=0 ?>
                @foreach($peminjam as $p)
                    <?php $i++ ?>
                    <tr>
                        <td>
                            {{$i}}
                        </td>
                        <td>{{$p->nama}}</td>
                        <td>{{$p->kode_arsip}}</td>
                        <td>{{$p->tanggal}}</td>
                        <td>
                            @if($p->tanggal_kembali == null)
                                {{"Arsip Belum Kembali"}}

                            @elseif($p->tanggal_kembali ==! null )
                                {{$p->tanggal_kembali}}
                            @endif
                        </td>
                        <td>
                            <div class="row">
                                <div class="col-sm-4">
                                    <a href="{{route('edit.peminjam', $p->id)}}">
                                        <div class="btn btn-primary" type="submit" id="edit">
                                            <i class="glyphicon glyphicon-edit"></i>
                                        </div>

                                    </a>
                                </div>
                                <div class="col-sm-4">
                                    <a href="{{route('print.tt', $p->id)}}">
                                        <div class="btn btn-default" type="submit" id="print">
                                            <i class="glyphicon glyphicon-print"></i>
                                        </div>

                                    </a>
                                </div>
                               {{-- <div class="col-sm-4">
                                    <form action="{{route('delete.peminjam', $p->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <div class="btn btn-danger" type="submit" id="delete">
                                            <i class="glyphicon glyphicon-erase"></i>
                                        </div>
                                    </form>
                                </div>--}}
                            </div>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
