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

  public static function assignarMantenimentFiltro (){
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
             assign_emp_atraccions.id_empleat
          FROM
             assign_emp_atraccions
          WHERE
             ( assign_emp_atraccions.data_inici <= "$data_inici_global" AND assign_emp_atraccions.data_fi >= "$data_fi_global")
             OR
             ( assign_emp_atraccions.data_inici >= "$data_inici_global" AND assign_emp_atraccions.data_fi <= "$data_fi_global")
           )');
           return $user;
  }

}
