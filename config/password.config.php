<?php

return [
  'algo' => env('PASSWORD_ALGO', PASSWORD_BCRYPT),
  'cost' => env('PASSWORD_COST', 10),
  'salt' => env('PASSWORD_SALT', 50)
];