

<form role="search" class="navbar-form-custom" action="{{route('search')}}">
    <div class="cari">
        <input type="text" placeholder="Cari Arsip" class="cari-txt" name="search" id="search" style="color: white">

        <button type="submit" class="cari-btn" style="background-color: transparent; background-repeat: no-repeat; border: none; overflow: hidden; outline: none">
            <i class="fa fa-search"></i>
        </button>
    </div>
</form>

{{--@foreach($cari as $c)
{{$c->dus_id}} <br>
{{$c->nama_pt}} <br>
@endforeach--}}
