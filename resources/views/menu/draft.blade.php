	<!-- TASKS -->
    <div class="panel">
        <div class="panel-heading">
            <div class="therichpost-container" style="margin-left:10px;">
            <h4>Liste des Maintenances</h4>

        </div>
        <div class="panel-body">
            <ul class="list-unstyled task-list">
                <li>
                    <p class="text-primary" class="therichpost-grey">Liste des Maintenances Non Consultées <span class="label-percent">{{ $diperc }} %</span></p>
                    <div class="progress progress-xs">
                        <div class="therichpost-container therichpost-center therichpost-padding therichpost-green" aria-valuenow="{{ $diperc }}" aria-valuemin="0" aria-valuemax="100" style="width:{{ $diperc }}%">
                            <span class="sr-only">{{ $diperc }} % Complete</span>
                        </div>
                    </div>
                </li>
                <li>
                    <p class="text-danger" class="therichpost-grey"> Liste des Maintenances Reportées <span class="label-percent">{{ $dirperc }} %</span></p>
                    <div class="progress progress-xs">
                        <div class="therichpost-container therichpost-center therichpost-padding therichpost-orange"  aria-valuenow="{{ $dirperc }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $dirperc }}%">
                            <span class="sr-only">{{ $dirperc }} % Complete</span>
                        </div>
                    </div>
                </li>
                <li>
                    <p class="text-warning" class="therichpost-grey">Liste des Maintenances en Cours <span class="label-percent">{{ $diecperc }} %</span></p>
                    <div class="progress progress-xs">
                        <div class="therichpost-container therichpost-center therichpost-padding therichpost-red" aria-valuenow="{{ $diecperc }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $diecperc }}%">
                            <span class="sr-only">Success</span>
                        </div>
                    </div>
                </li>
                <li>
                    <p class="text-success"  class="therichpost-grey">Liste des Maintenances Terminées<span class="label-percent">{{ $ditperc }}%</span></p>
                    <div class="progress progress-xs">
                        <div class="therichpost-container therichpost-center therichpost-padding therichpost-red" aria-valuenow="{{ $ditperc }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $ditperc }}%">
                            <span class="sr-only">45% Complete</span>
                        </div>
                    </div>
                </li>
            </div>
            </ul>
        </div>
    </div>
    <!-- END TASKS -->
</div>
<div class="col-md-5">
    <!-- TIMELINE -->
    <div class="panel panel-scrolling">
        <div class="panel-heading">
            <h4 class="text-dark" class="panel-title">Les Activitées Récentes des Utilisateurs</h4>

        </div>
        <div class="panel-body">
            <ul class="list-unstyled activity-list">
                @foreach ( $activities as $activity )
                <li>
                    @foreach ($users as $user )
                    @if ( $user->id == $activity->iduser )
                    @if ($user->avatar == NULL )
                    <img src=" {{ asset('img/user.png') }}" class="img-circle pull-left avatar" alt="Avatar">
                    @else
                    <img src="{{ asset('uploads/profile/'.$user->avatar) }}" alt="Avatar" class="img-circle pull-left avatar">
                    @endif

                    <p> <a href="#">

                            {{ $user->name }}
                            @endif
                            @endforeach
                        </a>
                        {{ $activity->description }} <span class="timestamp">{{ Carbon\Carbon::parse($activity->created_at)->diffForHumans(Carbon\Carbon::now()) }}</span></p>
                </li>
                @endforeach

            </ul>

        </div>
    </div>
    <!-- END TIMELINE -->
</div>
</div>

</div>
</div>
<!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->
@include('menu.footer')
</div>
<!-- END WRAPPER -->

@endsection
@endif
