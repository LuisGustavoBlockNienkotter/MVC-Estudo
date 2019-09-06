<?php

spl_autoload_register(function ($nomeClasse) {
  $folders = array("Model". DIRECTORY_SEPARATOR ."DAO", "Model". DIRECTORY_SEPARATOR ."DTO",
                  "Model". DIRECTORY_SEPARATOR ."DAO". DIRECTORY_SEPARATOR ."MySQL",
                  "Model". DIRECTORY_SEPARATOR ."BO", "controller");
  foreach ($folders as $folder)
    //echo $folder."<br>";
    //echo $nomeClasse."<br>";
    if (file_exists($folder.DIRECTORY_SEPARATOR.$nomeClasse.".class.php"))
      require_once($folder.DIRECTORY_SEPARATOR.$nomeClasse.".class.php");
});

?>
