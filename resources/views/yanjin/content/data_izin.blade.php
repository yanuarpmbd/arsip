<div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Data Sektor</h5>
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>
            </div>
        </div>
        <div class="ibox-content">

            <table class="table table-hover">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Izin</th>
                    <th>Sektor</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $x=0 ?>
                @foreach($izin as $i)
                    <?php $x++ ?>
                    <tr>
                        <td>
                            {{$x}}
                        </td>
                        <td>{{$i->nama_izin}}</td>
                        <td>Sektor</td>
                        <td>
                            <div class="row">
                                <div class="col-6">
                                    <a class="btn btn-outline-danger" style="color: blue; font-size: 20px; background: transparent"  href="{{route('izin.edit', $i->id)}}">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                </div>
                                <div class="col-6">
                                    <form action="{{route('izin.delete', $i->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <div class="form-group" style="padding: 0; margin-top: 0">
                                            <button class="btn btn-outline-danger" style="color: red; font-size: 20px; background: transparent" type="submit" ><i class="fa fa-eraser"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
