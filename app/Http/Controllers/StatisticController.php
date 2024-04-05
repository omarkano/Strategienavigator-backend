<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Save;
use App\Models\SharedSave;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatisticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {

        // Tools statistics
        $anzahlAnalysen = Save::count();
        $davonGeteilt = SharedSave::count();
        $davonNutzwertanalyse = Save::where('tool_id', '=', 1)->count();
        $davonSwotAnalyse = Save::where('tool_id', '=', 2)->count();
        $davonPaarweiserVergleich = Save::where('tool_id', '=', '3')->count();
        $davonPortfolioAnalyse = Save::where('tool_id', '=', '4')->count();

        // Tools statistics from last Month
        $anzahlAnalysenVomLetztenMonat = Save::where('created_at', '>=', now()->subMonth())->count();
        $davonGeteiltVomLetztenMonat = SharedSave::where('created_at', '>=', now()->subMonth())->count();
        $davonNutzwertanalyseVomLetztenMonat = Save::where('tool_id', 1)->where('created_at', '>=', now()->subMonth())->count();
        $davonSwotAnalyseVomLetztenMonat = Save::where('tool_id', 2)->where('created_at', '>=', now()->subMonth())->count();
        $davonPaarweiserVergleichVomLetztenMonat = Save::where('tool_id', 3)->where('created_at', '>=', now()->subMonth())->count();
        $davonPortfolioAnalyseVomLetztenMonat = Save::where('tool_id', 4)->where('created_at', '>=', now()->subMonth())->count();

        //User statistics
        $anzahlBenutzerMitKonto= User::where('anonymous', 0)->count();
        $anzahlAnonymeBenutzer = User::where('anonymous', 1)->count();
        $anzahlBenutzerOhneJadeHsAdressen = User::where('email', 'NOT LIKE', '%jade-hs.de%')->count();
        $anzahlNeuerBenutzerMitKontoSeitLetztemMonat = User::where('created_at', '>=', now()->subMonth())->count();
        $anzahlNeuerAnonymenBenutzerSeitLetztemMonat = User::where('anonymous', 1)->where('created_at', '>=', now()->subMonth())->count();
        $anzahlBenutzerOhneJadeHsAdressenSeitLetztemMonat = User::where('email', 'NOT LIKE', '%jade-hs.de%')->where('created_at', '>=', now()->subMonth())->count();


        return view('statistics.index', [
            'anzahlAnalysen' => $anzahlAnalysen,
            'davonGeteilt' => $davonGeteilt,
            'davonNutzwertanalyse' => $davonNutzwertanalyse,
            'davonSwotAnalyse' => $davonSwotAnalyse,
            'davonPaarweiserVergleich' => $davonPaarweiserVergleich,
            'davonPortfolioAnalyse' => $davonPortfolioAnalyse,
            'anzahlAnalysenVomLetztenMonat' =>$anzahlAnalysenVomLetztenMonat,
            'davonGeteiltVomLetztenMonat' =>$davonGeteiltVomLetztenMonat,
            'davonNutzwertanalyseVomLetztenMonat'=>$davonNutzwertanalyseVomLetztenMonat,
            'davonSwotAnalyseVomLetztenMonat'=>$davonSwotAnalyseVomLetztenMonat,
            'davonPaarweiserVergleichVomLetztenMonat'=>$davonPaarweiserVergleichVomLetztenMonat,
            'davonPortfolioAnalyseVomLetztenMonat'=>$davonPortfolioAnalyseVomLetztenMonat,
            'anzahlBenutzerMitKonto'=>$anzahlBenutzerMitKonto,
            'anzahlAnonymeBenutzer'=>$anzahlAnonymeBenutzer,
            'anzahlBenutzerOhneJadeHsAdressen'=>$anzahlBenutzerOhneJadeHsAdressen,
            'anzahlNeuerBenutzerMitKontoSeitLetztemMonat' => $anzahlNeuerBenutzerMitKontoSeitLetztemMonat,
            'anzahlNeuerAnonymenBenutzerSeitLetztemMonat' => $anzahlNeuerAnonymenBenutzerSeitLetztemMonat,
            'anzahlBenutzerOhneJadeHsAdressenSeitLetztemMonat' => $anzahlBenutzerOhneJadeHsAdressenSeitLetztemMonat
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}