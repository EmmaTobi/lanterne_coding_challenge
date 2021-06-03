<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Station;

class LoadCsvFile extends Seeder
{

    private $defaultFilePath;

    private const LIST_FLAG =  ["Central", "Northern", "Piccadilly", "Hammersmith & City", "District", "Circle", "Metropolitan", "Jubilee", "Waterloo & City", "Victoria", "Bakerloo"];
    private const STATION_FLAG = "London Underground";
    private $lastPositionWhileReadCsvFile ;
    

    function __construct(){
        $this->defaultFilePath = env("DEFAULT_CSV_DATA_FILE_PATH");
        $this->lastPositionWhileReadCsvFile =  env("LAST_POSITION_WHILE_READ_CSV_FILE");

    }

    /**
     * Run the database seeds.
     *Helps to reac the csv files
     * @return void
     */
    public function run()
    {
        $lastPosition = file_get_contents(LAST_POSITION_WHILE_READ_CSV_FILE);
        $fh = fopen($this->defaultFilePath, 'r');
        fseek($fh, $lastPosition);
        $maxLines = 1000;
        $count = 0;

        while ($maxLines > 0 && $columns = fgetcsv($fh)) {

            $doesNetworkContainsLondonUnderground = strpos($columns[6], LoadCsvFile::STATION_FLAG) !== false; 
            $doesLinesContainsLineFlag = LoadCsvFile::filterLines( explode(",", $columns[5] ));

            if( ($count <= 0) || !$doesNetworkContainsLondonUnderground || $doesLinesContainsLineFlag  ) {
                ++$count;
                continue;
            }

            $maxLines--;
            file_put_contents('last_position.txt', ftell($fh));
            Station::create([
                "fid" => $columns[0],
                "objectid"    => $columns[1],
                 "name"    =>$columns[2],
                 "lines"    =>$columns[5],
                 "network"    =>$columns[6],
                 "northing"    =>$columns[4],
                 "easting"    =>$columns[3],
                 "zone"    =>$columns[7],
                 "x"    =>$columns[8],
                 "y"    =>$columns[9]
            ]);
        }
    }

    /*
    *function to help filer lines from lines column
    */
    private static function filterLines(array $lines)
    {
        $matches = [];
        foreach($lines as $line){
            $matched = in_array( $line, LoadCsvFile::LIST_FLAG);
            $matched ? array_push($matches, $line) : false;
        }
        return implode(",", $matches);
    }
}
