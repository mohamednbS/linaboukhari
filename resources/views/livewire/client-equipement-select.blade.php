<div>
    <div class="col-md-3">
        <label for="client" for="validationDefault01">{{__('Client') }}</label>
    </div> 
        <div class="col-md-9">
            <select wire:model="selectedClient" style="width:100%;margin-bottom:10px;" class="form-control" name="client_name" id="validationDefault01" required>
                <option value="" selected>Sélectionner un client</option>
                @foreach($clients as $client)
                    <option value="{{ $client->id_client }}">{{ $client->clientname }}</option>
                @endforeach
            </select>
        </div>
    

    @if (!is_null($selectedClient))
        <div class="col-md-3">
            <label for="equipement" for="validationDefault02">{{ __('Equipement') }}</label>
        </div>
            <div class="col-md-9">
                <select wire:model="selectedEquipement" style="width:100%;margin-bottom:10px;" class="form-control" name="equipement_name" id="validationDefault02" required>
                    <option value="" selected>Sélectionner un équipement</option>
                    @foreach($equipements as $equipement)
                        <option value="{{ $equipement->id_equipement }}">{{ $equipement->modele}}</option>
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
