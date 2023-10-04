<div>
    <div class="form-group row">
        <label for="client" class="col-md-4 col-form-label text-md-right">{{ __('Client') }}</label>

        <div class="col-md-6">
            <select wire:model="selectedClient" class="form-control">
                <option value="" selected>Choose client</option>
                @foreach($clients as $client)
                    <option value="{{ $client->id_client }}">{{ $client->clientname }}</option>
                @endforeach
            </select>
        </div>
    </div>

    @if (!is_null($selectedClient))
        <div class="form-group row">
            <label for="equipement" class="col-md-4 col-form-label text-md-right">{{ __('Equipement') }}</label>

            <div class="col-md-6">
                <select wire:model="selectedEquipement" class="form-control">
                    <option value="" selected>Choose equipement</option>
                    @foreach($equipements as $equipement)
                        <option value="{{ $equipement->id_equipement }}">{{ $equipement->modele}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    @endif

    @if (!is_null($selectedEquipement))
        <div class="form-group row">
            <label for="sousequipement" class="col-md-4 col-form-label text-md-right">{{ __('Sousequipement') }}</label>

            <div class="col-md-6">
                <select wire:model="selectedSousequipement" class="form-control" name="sousequipement_id">
                    <option value="" selected>Choose sousequipement</option>
                    @foreach($sousequipements as $sousequipement)
                        <option value="{{ $sousequipement->id_sousequipement }}">{{ $sousequipement->designation }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    @endif
</div>
