<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\DbDumper\Databases\MySql;
use Spatie\DbDumper\DbDumper;

class DumpDBController extends Controller
{
    public function index(){
        $databaseConfig = config('database.connections')[env('DB_CONNECTION')];

        $filename = "dump.sql";
        $file = public_path()."/".$filename;
        if (file_exists($file)) {
            unlink($file);
        }

        MySql::create()
            ->setDbName($databaseConfig['database'])
            ->setUserName($databaseConfig['username'])
            ->setPassword($databaseConfig['password'])
            ->dumpToFile($filename);

        return response()->json([
            'details' => url($filename)
        ]);
    }
}
