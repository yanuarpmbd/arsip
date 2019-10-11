
@extends('master.master')
@section('content')

    @include('yanjin.pinjam.edit-pinjam')

@endsection

@section('js')
    <script>
        function myFunction() {
            var copyText = document.getElementById("kode_arsip");
            copyText.select();
            document.execCommand("copy");
            alert("Copied the text: " + copyText.value);
        }
    </script>
@endsection
