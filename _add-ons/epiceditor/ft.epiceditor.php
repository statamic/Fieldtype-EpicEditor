<?php
class Fieldtype_epiceditor extends Fieldtype {

  var $meta = array(
    'name'       => 'Epic Editor',
    'version'    => '0.0.1',
    'author'     => 'Statamic',
    'author_url' => 'http://statamic.com'
  );

  static $field_settings;

  function render() {

    self::$field_settings = $this->field_config;
    
    $height = isset($this->field_config['height']) ? $this->field_config['height'].'px' : '300px';

    $html = "
    <div class='epiceditor-container'>
      <div id='epiceditor' tabindex='{$this->tabindex}' style='height:{$height}'></div>
      <textarea style='display:none' name='{$this->fieldname}'>{$this->field_data}</textarea>
    </div>";
    return $html;
  }

  public static function get_field_settings() {
    return self::$field_settings;
  }

  function process() {  
    return trim($this->field_data);
  }

}