<?php
class Hooks_epiceditor extends Hooks {

  function add_to_control_panel_head() {
    return self::include_js('epiceditor.min.js');
  }

}