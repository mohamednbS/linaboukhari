<div>
 
    <!-- Les clients -->
    <div class="col-md-3">
    
        <label><label for="client_id_client" >client</label></label>
    </div>
        
        <!-- Data Binding : <select> avec la propriété $client_id_client -->
    <div class="col-md-9">
        <select id="client_id_client" wire:model="client_id_client" style="width:100%;margin-bottom:10px;" class="form-control" >

            <option value="" >Séléctionner un client</option>

            <!-- On parcourt la collection de clients pour afficher chaque clients -->
            @foreach ($clients as $client)
            <option value="{{ $client->id_client }}" >{{ $client->clientname }}</option>
            @endforeach

        </select>
   
    </div>

    <!-- On vérifie si la collection des equipements contient des éléments -->
    @if(!is_null($equipements))
    <div class="col-md-3">
   
        <label for="equipement_id" >Equipement</label>
    </div>
    <div class="col-md-9">
        <!-- Data Binding : <select> avec la propriété $equipement_id -->
        <select id="equipement_id" wire:model="equipement_id" style="width:100%;margin-bottom:10px;" class="form-control" >

            <option value="" >Sélectionnez un équipement</option>

            <!-- On parcourt la collection de equipements pour afficher chaque equipements -->
            @foreach ($equipements as $equipement)
            <option value="{{ $equipement->id_equipement }}" >{{ $equipement->designation.'--'.$equipement->modele }}</option>
            @endforeach
        </select>
   
    </div>
    @endif

</div>
