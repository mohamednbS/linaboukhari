<div>
 
    <!-- Les clients -->
    <div class="col-md-3">
    
        <label><label for="client_id_client" >Equipement</label></label>
    </div>
        
        <!-- Data Binding : <select> avec la propriété $client_id_client -->
    <div class="col-md-9">
        <select id="equipement_id_equipement" wire:model="equipement_id_equipement" style="width:100%;margin-bottom:10px;" class="form-control" >

            <option value="" >Séléctionner un equipement</option>

            <!-- On parcourt la collection de clients pour afficher chaque clients -->
            @foreach ($equipements as $equipement)
            <option value="{{ $equipement->id_equipement }}" >{{ $equipement->modele }}</option>
            @endforeach

        </select>
   
    </div>

    <!-- On vérifie si la collection des equipements contient des éléments -->
    @if(!is_null($sousequipements))
    <div class="col-md-3">
   
        <label for="sousequipement_id" >Sous Equipement</label>
    </div>
    <div class="col-md-9">
        <!-- Data Binding : <select> avec la propriété $equipement_id -->
        <select id="sousequipement_id" wire:model="sousequipement_id" style="width:100%;margin-bottom:10px;" class="form-control" >

            <option value="" >Sélectionnez un sous équipement</option>

            <!-- On parcourt la collection de equipements pour afficher chaque equipements -->
            @foreach ($sousequipements as $sousequipement)
            <option value="{{ $sousequipement->id_sousequipement }}" >{{ $sousequipement->designation }}</option>
            @endforeach
        </select>
   
    </div>
    @endif

</div>
   