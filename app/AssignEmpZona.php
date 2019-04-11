<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class AssignEmpZona extends Model
{
  protected $table = 'serveis_zones';

  protected $fillable = [
      'id_zona',
      'id_empleat',
      'data_inici',
      'data_fi'
  ];

  public static function assignarMantenimentFiltro ($data_inici, $data_fi){
   
   
    $user = DB::select('SELECT
    *
    FROM
       users
    WHERE
        users.id_rol = 3
        AND
       users.id NOT IN
       (
          SELECT
            serveis_zones.id_empleat
          FROM
              serveis_zones
              WHERE
             ( serveis_zones.data_inici <= "'.$data_inici.'" AND serveis_zones.data_fi >= "'.$data_fi.'")
             OR
             ( serveis_zones.data_inici >= "'.$data_inici.'" AND serveis_zones.data_fi <= "'.$data_fi.'")
           )');
    
           return $user;
  }

  public static function llistarEmpassign (){
    
    $Assignacions = DB::select('SELECT 
      serveis_zones.id, zones.nom as nom_zona, users.nom, users.cognom1, serveis_zones.data_inici, serveis_zones.data_fi 
      FROM zones, users, serveis_zones 
      WHERE serveis_zones.id_empleat = users.id 
      AND serveis_zones.id_zona = zones.id');

    return $Assignacions;
 
  }

    public static function assignarNetejaFiltro ($data_inici, $data_fi){
   
   
    $user = DB::select('SELECT
    *
    FROM
       users
    WHERE
        users.id_rol = 4
        AND
       users.id NOT IN
       (
          SELECT
            serveis_zones.id_empleat
          FROM
              serveis_zones
              WHERE
             ( serveis_zones.data_inici <= "'.$data_inici.'" AND serveis_zones.data_fi >= "'.$data_fi.'")
             OR
             ( serveis_zones.data_inici >= "'.$data_inici.'" AND serveis_zones.data_fi <= "'.$data_fi.'")
           )');
    
           return $user;
  }

    public static function assignarAtencioFiltro ($data_inici, $data_fi){
   
   
    $user = DB::select('SELECT
    *
    FROM
       users
    WHERE
        users.id_rol = 6
        AND
       users.id NOT IN
       (
          SELECT
            serveis_zones.id_empleat
          FROM
              serveis_zones
              WHERE
             ( serveis_zones.data_inici <= "'.$data_inici.'" AND serveis_zones.data_fi >= "'.$data_fi.'")
             OR
             ( serveis_zones.data_inici >= "'.$data_inici.'" AND serveis_zones.data_fi <= "'.$data_fi.'")
           )');
    
           return $user;
  }

    public static function assignarSeguretatFiltro ($data_inici, $data_fi){
   
   
    $user = DB::select('SELECT
    *
    FROM
       users
    WHERE
        users.id_rol = 7
        AND
       users.id NOT IN
       (
          SELECT
            serveis_zones.id_empleat
          FROM
              serveis_zones
              WHERE
             ( serveis_zones.data_inici <= "'.$data_inici.'" AND serveis_zones.data_fi >= "'.$data_fi.'")
             OR
             ( serveis_zones.data_inici >= "'.$data_inici.'" AND serveis_zones.data_fi <= "'.$data_fi.'")
           )');
    
           return $user;
  }

    public static function assignarShowFiltro ($data_inici, $data_fi){
   
   
    $user = DB::select('SELECT
    *
    FROM
       users
    WHERE
        users.id_rol = 8
        AND
       users.id NOT IN
       (
          SELECT
            serveis_zones.id_empleat
          FROM
              serveis_zones
              WHERE
             ( serveis_zones.data_inici <= "'.$data_inici.'" AND serveis_zones.data_fi >= "'.$data_fi.'")
             OR
             ( serveis_zones.data_inici >= "'.$data_inici.'" AND serveis_zones.data_fi <= "'.$data_fi.'")
           )');
    
           return $user;
  }

}
