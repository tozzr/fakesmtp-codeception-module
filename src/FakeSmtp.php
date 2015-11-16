<?php

namespace Codeception\Module;

use Codeception\Module;

class FakeSmtp extends Module
{

  function resetEmails()
  {
    $this->cleanDir($this->dir);
  }

  function seeInLastEmail($str)
  {
    if ($handle = opendir($this->dir)) {
        while (false !== ($entry = readdir($handle))) {
          if ($entry != "." && $entry != "..") {
            $this->openFile($this->dir . "/" . $entry);
            $this->seeInThisFile($str);
          }
        }
        closedir($handle);
    }
  }

}
