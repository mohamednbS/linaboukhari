<div>
   
    <div>
    <!-- L'état de chargement de données -->
    <p wire:loading >Chargement de données ...</p>

    <!-- Les clients -->
    <p>
        <label for="client_id_client" >Sélectionnez un client</label>
        
        <!-- Data Binding : <select> avec la propriété $client_id_client -->
        <select id="client_id_client" wire:model="client_id_client" >

            <option value="" >Séléctionner un client</option>

            <!-- On parcourt la collection de clients pour afficher chaque clients -->
            @foreach ($clients as $client)
            <option value="{{ $client->id_client }}" >{{ $client->clientname }}</option>
            @endforeach

        </select>
    </p>

    <!-- On vérifie si la collection de villes contient des éléments -->
    @if($equipements->count())
    <p>
        <label for="id_equipement" >Sélectionnez un équipement</label>

        <!-- Data Binding : <select> avec la propriété $equipement_id -->
        <select id="equipement_id" wire:model="equipement_id" >

            <option value="" >Sélectionnez un equipement</option>

            <!-- On parcourt la collection de equipements pour afficher chaque equipements -->
            @foreach ($equipements as $equipement)
            <option value="{{ $equipement->id_equipement }}" >{{ $equipement->modele}}</option>
            @endforeach

        </select>
    </p>
    @endif
</div>
</div>
