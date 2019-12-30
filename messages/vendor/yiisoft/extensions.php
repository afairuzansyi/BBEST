<?php

$vendorDir = dirname(__DIR__);

return array (
  'mdmsoft/yii2-ar-behaviors' => 
  array (
    'name' => 'mdmsoft/yii2-ar-behaviors',
    'version' => '1.3.0.0',
    'alias' => 
    array (
      '@mdm/behaviors/ar' => $vendorDir . '/mdmsoft/yii2-ar-behaviors',
    ),
    'bootstrap' => 'mdm\\behaviors\\ar\\Bootstrap',
  ),
);
