<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\StationService;

class StationController extends Controller
{
  protected $stationService;

  public function __construct(StationService $stationService){
     $this->stationService = $stationService;
  }

  /*
  *To get All Stations
  *
  */
  public function getAllStations(Request $request){
      $line_id = $request->get('line_id');
      $stations ;
      if($line_id)
        $stations =  $this->stationService->getAllStationsByLine();
      else
        $stations =  $this->stationService->getAllStations();
      return response()->json(["status"=>"success" , "data"=>$stations]);
  }

  /*
  *To get All Lines
  *
  */
  public function getAllLines(){
      $lines =  $this->stationService->getAllLines();
      return response()->json(["status"=>"success" , "data"=>$lines]);
  }
}
