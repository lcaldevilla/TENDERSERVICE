<?php

namespace App\Http\Controllers;

use App\Models\Tender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Repository\AtomDatabaseClass;

class TenderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index()
    {
        return Tender::all();
    }

    /**
     * POST /tenders
     * @param Request $request
     *  @return \Symfony\Component\HttpFoundation\Response
     * Recibe una licitacion y la almacena en la base de datos
     * Es posible que ya exista una licitación y sólo tengamos que actualizarla
     */
    public function store(Request $request)
    {
        $db = new AtomDatabaseClass();

        try {
            $jsonRequest = json_decode($request->getcontent(), true);
            foreach ($jsonRequest as $value) {
                // tenemos que somprobar si ya existe una licitación para actualizarla
                // lo compruebo con el campo id_tender
                $id_tender_received = $value['id_tender'];
                $updated_received = $value['updated'];

                if ($db->checkIfExistsOldIdTender($id_tender_received, $updated_received)) {
                    $db->updateTenderByIdTender($id_tender_received, $value);
                    //Log::debug("existe: " . $id_tender_received . " | " . $db->checkIfExistsOldIdTender($id_tender_received, $updated_received));
                } else {
                    $tender = Tender::create($value);
                    //Log::debug("NO existe: " . $id_tender_received . " | " . $db->checkIfExistsOldIdTender($id_tender_received, $updated_received));
                }
            }
        } catch (\Exception $e) {
            dd(get_class($e));
        }

        return response()->json(['created' => true], 201);
    }

    /**
     * GET /tenders
     * @param Request $request
     *  @return \Symfony\Component\HttpFoundation\Response
     */
    public function getTenders(Request $request)
    {
        try {
            $tenders = Tender::paginate(5);
            $tenders->setPath('home');

            if ($tenders) {
                $result = array("code" => 200, "state" => true, "data" => $tenders, 'pagination' => (string) $tenders->render('pagination::bootstrap-4'));
            }
        } catch (\Exception $e) {
            // dd(get_class($e));
            $result = array("code" => 500, "state" => true, "data" => $e->getMessage());
        }

        if (isset($_GET['page'])) {
            return response()->json($result);
        } else
            return response()->json($result);
    }

    /**
     * GET /tender
     * @param Request $request
     *  @return \Symfony\Component\HttpFoundation\Response
     */
    public function tender(Request $request)
    {
        try {

            $tenders = Tender::where('id_tender', '=', urldecode($_GET['id']))->get();


            if ($tenders) {
                $result = array("code" => 200, "state" => true, "data" => $tenders);
            }
        } catch (Exception $e) {
            dd(get_class($e));
            $result = array("code" => 500, "state" => true, "data" => $e->getMessage());
        }

        if (isset($_GET['page'])) {
            return response()->json($result);
        } else
            return response()->json($result);
    }
}
