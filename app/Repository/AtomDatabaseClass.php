<?php

namespace App\Repository;

use App\Models\Tender;

class AtomDatabaseClass
{
    public function __construct()
    {
    }

    public function checkIfExistsOldIdTender($idTender, $updated)
    {
        $tender = Tender::where('id_tender', '=', $idTender)
            ->where('updated', '<', $updated)
            ->get();

        if ($tender->isNotEmpty()) return true;
        else return false;
    }

    public function updateTenderByIdTender($idTender, $jsonTender)
    {
        $result = Tender::where('id_tender', '=', $idTender)
            ->update($jsonTender);
    }
}
