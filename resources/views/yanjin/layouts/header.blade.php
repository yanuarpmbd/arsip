

    <ul class="nav navbar-top-links navbar-right">


    <li class="dropdown">

        <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
            <i class="fa fa-bell"></i>
            @foreach($p as $pw)
                <span class="label label-primary">

            {{$pw->jml}}

            </span>
            @endforeach
        </a>

        <ul class="dropdown-menu dropdown-alerts">
            <?php
            $i = 0;
            ?>
            @foreach($peminjam as $p2)

                @if($p2->tanggal_kembali == null)


                    <li>
                        <a href="{{route('edit.peminjam', $p2->id)}}">
                            <div>
                                <i class="fa fa-bullhorn fa-fw"></i> {{$p2->nama}}
                                <span class="pull-right text-muted small">{{$p2->created_at->diffForHumans()}}</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <?php
                    $i++;
                    ?>
                    @if( $i == 5)
                        @break
                    @endif

                @endif
            @endforeach
            <li>
                <div class="text-center link-block">
                    <a href="{{route('get.peminjam')}}">
                        <strong>Lihat Semua Peminjaman</strong>
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
            </li>
        </ul>

    </li>

        <li>
            <a href="{{route('admin.logout')}}">
                <i class="fa fa-sign-out"></i> Log out
            </a>
        </li>
    </ul>

