<div>
    <div class="col-md-3">
        <label for="client" >{{__('Client') }}</label>
    </div> 
        <div class="col-md-9">
            <select wire:model="selectedClient" style="width:100%;margin-bottom:10px;" class="js-example-basic-single" name="client_name">
                <option value="" selected>Sélectionner un client</option>
                @foreach($clients as $client)
                    <option value="{{ $client->id_client }}">{{ $client->clientname }}</option>
                @endforeach
            </select>
        </div> 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <script>
    document.addEventListener('livewire:load', function () {
        $('.js-example-basic-single').select2();
        $('.js-example-basic-single').on('change', function (e) {
            @this.set('selectedClient', e.target.value);
        });
    });
    </script>
    @if (!is_null($selectedClient))
        <div class="col-md-3">
            <label for="equipement">{{ __('Equipement') }}</label>
        </div>
            <div class="col-md-9">
                <select wire:model="selectedEquipement" style="width:100%;margin-bottom:10px;" class="form-control" name="equipement_name">
                    <option value="" selected>Sélectionner un équipement</option>
                    @foreach($equipements as $equipement)
                        <option value="{{ $equipement->id_equipement }}">{{ $equipement->modele.'--'.$equipement->numserie }} </option>
                    @endforeach
                </select>
            </div>
        
    @endif

    @if (!is_null($selectedEquipement))
        <div class="col-md-3">
            <label for="sousequipement">{{ __('Sousequipement') }}</label>
        </div>
            <div class="col-md-9">
                <select wire:model="selectedSousequipement" style="width:100%;margin-bottom:10px;" class="form-control" name="souseq_name" >
                    <option value="" selected>Sélectionner un sousequipement</option>
                    @foreach($sousequipements as $sousequipement)
                        <option value="{{ $sousequipement->id_sousequipement }}">{{ $sousequipement->designation }}</option>
                    @endforeach
                </select>
            </div>
        
    @endif
</div>
