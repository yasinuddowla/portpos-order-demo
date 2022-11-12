<?php
include_once('database/connect.php');
include_once('models/BaseModel.php');
include_once('models/Auth.php');
// include all classes from controllers directory

foreach (glob("controllers/*.php") as $filename) {
    include_once($filename);
}
