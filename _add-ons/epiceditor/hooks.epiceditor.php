<?php
class Hooks_epiceditor extends Hooks {

  function add_to_control_panel_head() {
    return self::include_css('epiceditor.css');
  }

  function add_to_control_panel_foot() {

    $html = self::include_js('epiceditor.min.js');
    
    // $options = Spyc::YAMLLoad('_config/add-ons/redactor.yaml');

    $html .= self::inline_js("

      var editor = new EpicEditor({ 
        basePath: 'https://raw.github.com/OscarGodson/EpicEditor/develop/epiceditor',
        clientSideStorage: false,
        file: {
          defaultContent: $('.epiceditor-container textarea').val(),
          autoSave: true
        }
      });

      editor.load(function() {
        $('.epiceditor-container textarea').val(editor.exportFile());
      });

      editor.on('save', function () {
        $('.epiceditor-container textarea').val(editor.exportFile());
      });

    ");

    return $html;
  }

}