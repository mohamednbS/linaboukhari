<?php

namespace App\Http\Livewire;
use Livewire\Component;
use Illuminate\Support\Facades\Input;

use Auth;

use App\Client;
use App\Equipement;
use App\Sousequipement;


class ClientEquipementSelect extends Component
{
    public $clients;
    public $equipements;
    public $sousequipements;

    public $selectedClient = null;
    public $selectedEquipement= null;
    public $selectedSousequipement = null;

    public function mount($selectedSousequipement = null)
    {
        $this->clients = Client::all();
        $this->equipements= collect();
        $this->sousequipements = collect();
        $this->selectedSousequipement = $selectedSousequipement;

        if (!is_null($selectedSousequipement)) {
            $sousequipement = Sousequipement::with('equipement.client')->find($selectedSousequipement);
            if ($sousequipement) {
                $this->sousequipements = Sousequipement::where('equipement_id_equipement', $sousequipement->equipement_id_equipement)->get();
                $this->equipements = Equipement::where('client_id_client', $sousequipement->equipement->client_id_client)->get();
                $this->selectedClinet = $sousequipement->equipement->client_id_client;
                $this->selectedEquipement= $sousequipement->equipement_id;
            }
        }
    }

    public function render()
    {
        return view('livewire.client-equipement-select');
    }

    public function updatedSelectedClient($client)
    {
        $this->equipements = Equipement::where('client_id_client', $client)->get();
        $this->selectedEquipement = $this->selectedEquipement;
    }

    public function updatedSelectedEquipement($equipement)
    {
        if (!is_null($equipement)) {
            $this->sousequipements = Sousequipement::where('equipement_id_equipement', $equipement)->get();
        }
    }


}
