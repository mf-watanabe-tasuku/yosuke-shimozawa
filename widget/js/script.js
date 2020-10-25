jQuery(document).ready(function($) {
  if($('body').hasClass('widgets-php')) {

    var current_item;
    var target_id;

    $(document).on('click', '.tcd_ad_widget_headline', function(){
      $(this).toggleClass('active');
      $(this).next('.tcd_ad_widget_box').toggleClass('open');
    });

  }

});


//カラーピッカー
(function($){
	function initColorPicker(widget) {
		widget.find('.color-picker').wpColorPicker( {
			change: _.throttle(function() { // For Customizer
				$(this).trigger('change');
			}, 3000 )
		});
	}
	function onFormUpdate(event, widget) {
		initColorPicker(widget);
	}
	$(document).on( 'widget-added widget-updated', onFormUpdate );
	$(document).ready( function() {
		$('#widgets-right .widget:has(.color-picker)').each(function(){
			initColorPicker($(this));
		});
	});
}(jQuery));

