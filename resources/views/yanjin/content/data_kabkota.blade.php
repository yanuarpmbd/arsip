<div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Data Kabupaten/Kota</h5>
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
                    <th>#</th>
                    <th>Kabupaten/Kota</th>
                </tr>
                </thead>
                <tbody>

                @foreach($kabkota as $k)
                    <tr>
                        <td>{{$k->id}}</td>
                        <td>{{$k->nama_kabkota}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
