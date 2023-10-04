<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Input;

use Auth;
// Les modèles
use App\Client;
use App\Equipement;

class ClientEquipementSelect extends Component
{
    public $client_id_client; // L'identifiant du client
    public $equipement_id; // L'identifiant de l'equipement
    public $equipements; // la collection de l'equipements

    public function mount() {
        // On affecte une collection vide 
        $this->equipements = collect();
    }

    // Quand $id_client change, on charge les $equipements de $id_client 
       public function updatedClientIdClient ($newValue) {
        $this->equipements = Equipement::where("client_id_client", $newValue)->get();
    }



    public function render()
    {
        {
            // On récupère les clients
            $clients = Client::select("id_client", "clientname")->get();
    
            // On retourne la vue avec les clients
            return view('livewire.client-equipement-select', [
                'clients' => $clients
            ]);
        }
    }
}
