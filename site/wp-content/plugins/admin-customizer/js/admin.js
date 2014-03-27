var image_field;

jQuery(document).ready(function($) {

    $('.adns-select-color').wpColorPicker();

    $('#btn-adns-reset-to-defaults').click(function(e){
      var reset_confirmation = confirm('Are you sure? This cannot be undone!');
      if (!reset_confirmation) {
        return false;
      };

    });




  $(document).on('click', 'input.adns-select-img', function(evt){
    image_field = $(this).siblings('.img');
    tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
    return false;
  });

  window.send_to_editor = function(html) {
    imgurl = $('img', html).attr('src');
    image_field.val(imgurl);
    tb_remove();
  }




  // ///////////////////////////////////////////////////////////////////


    $('#admin-customizer-tab-container').tabs({
      active: $.cookie('activetab'),

      activate: function(event, ui) {

        $.cookie('activetab', ui.newTab.index(), {

          expires: 1

        });

      }

    });

});

