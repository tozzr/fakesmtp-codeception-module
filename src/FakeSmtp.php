<?php

namespace Codeception\Module;

use Codeception\Module;

class FakeSmtp extends Module
{
  protected $config = array('dir' => '/home');

  protected $requiredFields = ['dir'];

  public function _initialize()
  {
  }

  function resetEmails()
  {
    $this->getModule('Filesystem')->cleanDir($this->config['dir']);
  }

  function seeInLastEmail($str)
  {
    $fs = $this->getModule('Filesystem');
    if ($handle = opendir($this->config['dir'])) {
        while (false !== ($entry = readdir($handle))) {
          if ($entry != "." && $entry != "..") {
            $fs->openFile($this->config['dir'] . "/" . $entry);
            $fs->seeInThisFile($str);
          }
        }
        closedir($handle);
    }
  }

}
