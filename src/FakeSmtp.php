<?php

namespace Codeception\Module;

use Codeception\Module;

class FakeSmtp extends Module
{
  protected $config = array('dir');
  
  protected $requiredFields = ['dir'];

  public function _initialize()
  {
  }

  function resetEmails()
  {
    $this->cleanDir($this->config['dir']);
  }

  function seeInLastEmail($str)
  {
    if ($handle = opendir($this->config['dir'])) {
        while (false !== ($entry = readdir($handle))) {
          if ($entry != "." && $entry != "..") {
            $this->openFile($this->config['dir'] . "/" . $entry);
            $this->seeInThisFile($str);
          }
        }
        closedir($handle);
    }
  }

}
