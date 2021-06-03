<?php

namespace App\Services;

interface StationService 
{
   
   public function getAllStations();

   public function getAllLines();

   public function getAllStationsByLine();
}


?>