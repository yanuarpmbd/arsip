
<div>

    <h3>Pinjam Arsip</h3>
    <p>Isi form peminjaman arsip dibawah ini </p>
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
    <form class="m-t" role="form" action="{{route('pinjam.submit')}}" method="post">
        @csrf
{{--        <div class="form-group">
            <input type="text" class="form-control" placeholder="Nama*" name="nama" required="">

        </div>--}}
        <div class="form-group">
                <select class="select2_demo_2 form-control" name="nama" id="nama_pj" multiple="multiple" required>
                    @foreach($dropdown3 as $d3)
                        <option value="{{$d3->nama_pj}}">{{$d3->nama_pj}}</option>
                    @endforeach
                </select>

        </div>
        <div class="form-group">
                    <select class="select2_demo_3 form-control" name="search" id="search" multiple="multiple" required>
                        <option value="" disabled>Pilih Arsip ...</option>
                        @foreach($dropdown as $d)
                            <option value="{{$d->unique_id}}">{{$d->nama_pt}} - {{$d->no_sk}} - {{$d->unique_id}}</option>
                        @endforeach
                    </select>
        </div>
        <button type="submit" class="btn btn-primary block full-width m-b">Submit</button>

    </form>
    <p class="m-t"> <small>Arsip Perizinan DPMPTSP Provinsi Jawa Tengah &copy; 2019</small> </p>
</div>
