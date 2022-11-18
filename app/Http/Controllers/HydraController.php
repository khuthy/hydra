<?php

namespace App\Http\Controllers;

class HydraController extends Controller {
    public function hydra() {
        return response([
            'message' => 'Welcome to Scorecard System. The main purpose of this Scorecard System is to chart the way for the development of a CS System that integrates with the Corporate Performance Management System of the CGS. ',
        ]);
    }

    public function version() {
        return response([
            'version' => config('hydra.version'),
        ]);
    }
}
