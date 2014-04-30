<?php
  $site_id="demo";
  $site_path="/www/demo/";

  require_once "../../skb-php/current/skb/classes/main.inc.php5";

  $entries;

  $mySKB=SKB_Main::get_instance();
  $req=$mySKB->get_request();
  $req->init_plain();
  $req->activate();
  $red=$mySKB->get_reader("Core.Encoding.DB2Entries");
  $bui=$mySKB->get_builder("Core.Encoding.Entries2Entries");
  $red->set_builder($bui);
  $red->prepare($req);
  $entries['enc_char']=$red->get_entries()->ar;
  ksort($entries['enc_char']);

print_r($entries);
?>