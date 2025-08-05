<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

// ✅ هاذم زيدهم إذا كنت بش تستعملهم في الـ controllers اللي يورثو من Controller
use App\Models\Commande;
use App\Models\DetailCommande;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}



=======
abstract class Controller
{
    //
}
>>>>>>> 77b1b4b58e6b52d6a4f5380e614526d692c4638f
