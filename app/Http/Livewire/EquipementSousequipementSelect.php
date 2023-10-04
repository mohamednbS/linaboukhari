<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Input;

use Auth;
// Les modèles
use App\Equipement;
use App\Sousequipement;

class EquipementSousequipementSelect extends Component
{
   
    public $equipement_id_equipement; // L'identifiant de l'equipement
    public $sousequipement_id; // L'identifiant de sous-equipement
    public $sousequipements; // la collection des sous-équipements

    public function mount() {
        // On affecte une collection vide 
        $this->sousequipements = collect();
    }

    // Quand $id_client change, on charge les $equipements de $id_client 
       public function updatedEquipementIdEquipement ($newValue) {
        $this->sousequipements = Sousequipement::where("equipement_id_equipement", $newValue)->get();
    }
    
    public function render()
    {
            
        // On récupère les clients
            $equipements = Equipement::select("id_equipement", "modele")->get();
    
        // On retourne la vue avec les clients
            return view('livewire.equipement-sousequipement-select', [
                'equipements' => $equipements
            ]);
        }
    
}
   