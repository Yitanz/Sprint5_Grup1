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

  public static function assignarMantenimentFiltro ($data_inici, $data_fi, $id){
   
   
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

}
