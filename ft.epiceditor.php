<?php
class Fieldtype_epiceditor extends Fieldtype {

  var $meta = array(
    'name'       => 'Epic Editor',
    'version'    => '0.0.2',
    'author'     => 'Statamic',
    'author_url' => 'http://statamic.com'
  );

  static $field_settings;

  function render() {

    self::$field_settings = $this->field_config;
    
    $height = isset($this->field_config['height']) ? $this->field_config['height'].'px' : '300px';

    $html = "
    <div class='epiceditor-container'>
      <div id='epiceditor-{$this->tabindex}' tabindex='{$this->tabindex}' style='height:{$height}'></div>
      <textarea style='display:none;' id='epiceditor-{$this->tabindex}-textarea' name='{$this->fieldname}'>{$this->field_data}</textarea>
    
      <script type='text/javascript'>
      var editor_{$this->tabindex} = new EpicEditor({ 
          container: 'epiceditor-{$this->tabindex}',
          basePath: 'https://raw.github.com/OscarGodson/EpicEditor/develop/epiceditor',
          clientSideStorage: false,
          file: {
            defaultContent: $('#epiceditor-{$this->tabindex}-textarea').val(),
            autoSave: true
          }
        });

        editor_{$this->tabindex}.load(function() {
          $('#epiceditor-{$this->tabindex}-textarea').val(editor_{$this->tabindex}.exportFile());
        });

        editor_{$this->tabindex}.on('save', function () {
          $('#epiceditor-{$this->tabindex}-textarea').val(editor_{$this->tabindex}.exportFile());
        });
      </script>
    </div>
    
    ";
    return $html;
  }

  public static function get_field_settings() {
    return self::$field_settings;
  }

  function process() {  
    return trim($this->field_data);
  }

}