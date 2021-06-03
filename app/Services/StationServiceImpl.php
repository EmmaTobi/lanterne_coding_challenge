<?php

namespace App\Services;
use App\Models\Station;

class StationServiceImpl implements StationService 
{

 /*
  * Service To get All stations
  *
  */
    public function getAllStations()
    {
        $stations = Station::all();
        return $stations;
    }
   /*
  * Service To get All Lines
  *
  */
    public function getAllLines()
    {
        $lines = Station::pluck("lines");
        return $lines;
    }

/*
  *Service To get All Stations by lines
  *
  */
    public function getAllStationsByLine(){

    }
}


?>