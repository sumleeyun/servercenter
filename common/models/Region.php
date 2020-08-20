<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace common\models;
use yii;

class Region extends \yii\db\ActiveRecord
{
    
    public static function itemsAlias($key){

  $items = [
    'sex'=>[
      self::SEX_MEN => 'ชาย',
      self::SEX_WOMEN => 'หญิง'
    ],
    'title'=>[
      1 => 'นาย',
      2 => 'นางสาว',
      3 => 'นาง'
    ],
    'work'=>[
      1 => 'กำลังดำเนินการ',
      2 => 'รอติดต่อจากเจ้าของงาน',
      3 => 'ปิดงาน',
      4 => 'อื่นๆๆ'
    ],
    'server'=>[
      1 => 'ต่ำกว่ามัธยมศึกษาตอนต้น',
      2 => 'มัธยมศึกษาตอนต้น',
      3 => 'ปวช',
      4 => 'มัธยมศึกษาตอนปลาย',
      5 => 'ปวส',
      6 => 'อนุปริญญา',
      7 => 'ปริญญาตรี',
      8 => 'ปริญญาโท',
      9 => 'ปริญญาเอก'
    ],
    'web'=>[
      'php' => 'PHP',
      'js' => 'JavaScript',
      'css' => 'CSS',
      'html5' => 'Html5',
      'angularjs' => 'AngularJs',
      'node.js' => 'Node.Js',
      'reactjs' => 'ReactJs',
      'go'=>'Go',
      'ruby'=>'ruby on rails',
      'swiff' => 'Swiff',
      'android' => 'Android',
  ]
];
  return ArrayHelper::getValue($items,$key,[]);
  //return array_key_exists($key, $items) ? $items[$key] : [];
}
    
}