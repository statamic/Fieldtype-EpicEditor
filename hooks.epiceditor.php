<?php
class Hooks_Epiceditor extends Hooks {

  public function control_panel__add_to_head()
  {
        if (URL::getCurrent(false) == '/publish') {
            return $this->js->link('epiceditor.min.js');
        }
  }

}