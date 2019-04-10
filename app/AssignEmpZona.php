<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class AssignEmpZona extends Model
{
  protected $table = 'empleat_zona';

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
        users.id_rol = "3"
        AND
       users.id NOT IN
       (
          SELECT
             empleat_zona.id_empleat
          FROM
              empleat_zona
              WHERE
             ( empleat_zona.data_inici <= "$data_inici" AND empleat_zona.data_fi >= "$data_fi")
             OR
             ( empleat_zona.data_inici >= "$data_inici" AND empleat_zona.data_fi <= "$data_fi")
           )');
    
           return $user;
  }

}
