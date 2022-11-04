<?php

namespace App\Http\Controllers;

use App\Repositories\ClientRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ClientsController extends Controller
{
    private $clientRepo;

    public function __construct(ClientRepository $clientRepository)
    {
        $this->clientRepo = $clientRepository;
    }

    public function index()
    {
        $clients = $this->clientRepo->getByPaginate(10);

        return Inertia::render("Clients", [
            'clients' => $clients
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'app_secret' => 'required',
            'application_ref' => 'required',
            'uid' => 'required'
        ]);

        if ($request->app_secret !== 'ABCDEFGHIJ') {
            return response()->json([
                'message' => 'Unauthorized access'
            ], 401);
        }


        $client = $this->clientRepo->storeByRquest($request);

        if (!$client) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to store'
            ]);
        }

        return response()->json([
            'status' => true,
            'message' => 'Successfully stored'
        ]);
    }
}
