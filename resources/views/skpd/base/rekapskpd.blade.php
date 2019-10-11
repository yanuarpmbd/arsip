@extends('master.master-skpd')
@section('header')
    @include('skpd.layouts.header')
@endsection
@section('content')
    @include('skpd.content.rekapskpd')
@endsection

@section('js')
 {{--   <script>
        $("#table2excelsektor").click(function(){
            $("#table2excelsektor").table2excel({
                // exclude CSS class
                exclude: ".noExl",
                name: "Worksheet Name",
                filename: "Rekap Dinas Teknis | ARSIP DPMPTSP Prov Jateng" //do not include extension
            });
        });
    </script>--}}
 <script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>


 <script>
     var $rows = $('#table2excelsektor tr');
     $('#myInput').keyup(debounce(function() {
         var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

         $rows.show().filter(function() {
             var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
             return !~text.indexOf(val);
         }).hide();
     }, 300));

     function debounce(func, wait, immediate) {
         var timeout;
         return function() {
             var context = this, args = arguments;
             var later = function() {
                 timeout = null;
                 if (!immediate) func.apply(context, args);
             };
             var callNow = immediate && !timeout;
             clearTimeout(timeout);
             timeout = setTimeout(later, wait);
             if (callNow) func.apply(context, args);
         };
     };
 </script>
@endsection
