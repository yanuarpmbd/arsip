<div class="row">
    <div class="ibox float-e-margins">

        @include('yanjin.layouts.search')

    </div>
<div class="col-lg-12">
    <div class="tabs-container">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#tab-1"> Lemari </a></li>
            <li class=""><a data-toggle="tab" href="#tab-2">Penanggungjawab</a></li>
            <li class=""><a data-toggle="tab" href="#tab-3">Jenis Izin</a></li>
            <li class=""><a data-toggle="tab" href="#tab-4">Sektor</a></li>
        </ul>
        <div class="tab-content">
            <div id="tab-1" class="tab-pane active">
                <div class="panel-body">
                    <strong>Manajemen Lemari Arsip</strong>
                    @include('yanjin.content.form_lemari')
                </div>
                <div class="space-30">
                </div>
                <div class="ibox float-e-margins">
                    @include('yanjin.content.data_lemari')
                </div>
            </div>

            <div id="tab-2" class="tab-pane">
                <div class="panel-body">
                    <strong>Manajemen Penanggungjawab Izin</strong>
                    @include('yanjin.content.form_pj')
                </div>
                <div class="space-30">
                </div>
                <div class="ibox float-e-margins">
                    @include('yanjin.content.data_pj')
                </div>
            </div>

            <div id="tab-3" class="tab-pane">
                <div class="panel-body">
                    <strong>Manajemen Jenis Izin</strong>
                    @include('yanjin.content.form_izin')
                </div>
                <div class="space-30">
                </div>
                <div class="ibox float-e-margins">
                    @include('yanjin.content.data_izin')
                </div>
            </div>
            <div id="tab-4" class="tab-pane">
                <div class="panel-body">
                    <strong>Manajemen Sektor Perizinan</strong>
                    @include('yanjin.content.form_sektor')
                </div>
                <div class="space-30">
                </div>
                <div class="ibox float-e-margins">
                    @include('yanjin.content.data_sektor')
                </div>
            </div>
        </div>


    </div>
</div>
</div>
