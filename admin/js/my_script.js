jQuery(document).ready(function($){

  // color picker
  $('.c-color-picker').wpColorPicker();


  // トップページの並び替え
  $("#theme_option_field_order").sortable({
    placeholder: "theme_option_field_order_placeholder",
    handle: '.theme_option_headline',
    //helper: "clone",
    stop: function (e, ui) {
      ui.item.toggleClass("active");
    },
    forceHelperSize: true,
    forcePlaceholderSize: true
  });


  // Googleマップ
  $("#gmap_marker_type_button_type2").click(function () {
    $("#gmap_marker_type2_area").show();
  });
  $("#gmap_marker_type_button_type1").click(function () {
    $("#gmap_marker_type2_area").hide();
  });
  $("#gmap_custom_marker_type_button_type1").click(function () {
    $("#gmap_custom_marker_type1_area").show();
    $("#gmap_custom_marker_type2_area").hide();
  });
  $("#gmap_custom_marker_type_button_type2").click(function () {
    $("#gmap_custom_marker_type1_area").hide();
    $("#gmap_custom_marker_type2_area").show();
  });


  // ランキング　カスタムフィールド
  $("#tcd_cf_ranking_tab .tab1").click(function () {
    $('#tcd_cf_ranking_tab li').removeClass('active');
    $(this).addClass('active');
    $('.tcd_cf_ranking').hide();
    $('#tcd_cf_ranking1').show();
  });
  $("#tcd_cf_ranking_tab .tab2").click(function () {
    $('#tcd_cf_ranking_tab li').removeClass('active');
    $(this).addClass('active');
    $('.tcd_cf_ranking').hide();
    $('#tcd_cf_ranking2').show();
  });
  $("#tcd_cf_ranking_tab .tab3").click(function () {
    $('#tcd_cf_ranking_tab li').removeClass('active');
    $(this).addClass('active');
    $('.tcd_cf_ranking').hide();
    $('#tcd_cf_ranking3').show();
  });

  // フッターの固定コンテンツ
  $(".fixed_footer_content_type_type1").click(function () {
   $(this).closest('.sub_box_content').find('.fixed_footer_content_type1').show();
   $(this).closest('.sub_box_content').find('.fixed_footer_content_type2').hide();
  });
  $(".fixed_footer_content_type_type2").click(function () {
   $(this).closest('.sub_box_content').find('.fixed_footer_content_type2').show();
   $(this).closest('.sub_box_content').find('.fixed_footer_content_type1').hide();
  });

  $(".fixed_footer_sub_content_type_type1").click(function () {
   $(this).closest('.fixed_footer_content_type1').find('.fixed_footer_sub_content_type1').show();
   $(this).closest('.fixed_footer_content_type1').find('.fixed_footer_sub_content_type2').hide();
  });
  $(".fixed_footer_sub_content_type_type2").click(function () {
   $(this).closest('.fixed_footer_content_type1').find('.fixed_footer_sub_content_type2').show();
   $(this).closest('.fixed_footer_content_type1').find('.fixed_footer_sub_content_type1').hide();
  });
  $("#show_fixed_footer_content input:checkbox").click(function(event) {
   if ($(this).is(":checked")) {
    $('#footer_bar_setting_area').hide();
   } else {
    $('#footer_bar_setting_area').show();
   }
  });


  // ロゴに画像を使うかテキストを使うか選択
  $("#logo_type_select #use_logo_image_no").click(function () {
    $(".logo_text_area").show();
    $(".logo_image_area").hide();
  });
  $("#logo_type_select #use_logo_image_yes").click(function () {
    $(".logo_text_area").hide();
    $(".logo_image_area").show();
  });


  // トップページのスライダータイプ AJAXで追加されたコンテンツはdocument onを使う
  $(document).on('click', '.slider_type_button1', function(){
    $(this).closest('.sub_box_content').find('.index_slider_image_area').show();
    $(this).closest('.sub_box_content').find('.index_slider_animation_area').show();
    $(this).closest('.sub_box_content').find('.index_slider_video_area').hide();
    $(this).closest('.sub_box_content').find('.index_slider_youtube_area').hide();
  });
  $(document).on('click', '.slider_type_button2', function(){
    $(this).closest('.sub_box_content').find('.index_slider_image_area').hide();
    $(this).closest('.sub_box_content').find('.index_slider_animation_area').hide();
    $(this).closest('.sub_box_content').find('.index_slider_video_area').show();
    $(this).closest('.sub_box_content').find('.index_slider_youtube_area').hide();
  });
  $(document).on('click', '.slider_type_button3', function(){
    $(this).closest('.sub_box_content').find('.index_slider_image_area').hide();
    $(this).closest('.sub_box_content').find('.index_slider_animation_area').hide();
    $(this).closest('.sub_box_content').find('.index_slider_video_area').hide();
    $(this).closest('.sub_box_content').find('.index_slider_youtube_area').show();
  });
  $(document).on('click', '.index_slider_show_catch_checkbox input:checkbox', function(event){
    if ($(this).is(":checked")) {
      $(this).closest('.sub_box_content').find('.index_slider_show_catch').show();
    } else {
      $(this).closest('.sub_box_content').find('.index_slider_show_catch').hide();
    }
  });
  $(document).on('click', '.index_slider_show_overlay_checkbox input:checkbox', function(event){
    if ($(this).is(":checked")) {
      $(this).closest('.sub_box_content').find('.index_slider_show_overlay').show();
    } else {
      $(this).closest('.sub_box_content').find('.index_slider_show_overlay').hide();
    }
  });


  // トップページのヘッダースライダー　レティナディスプレイの選択
  $(".index_slider_use_retina_checkbox input:checkbox").click(function(event) {
   if ($(this).is(":checked")) {
    $('.index_slider_retina_image').show();
    $('.index_slider_normal_image').hide();
   } else {
    $('.index_slider_retina_image').hide();
    $('.index_slider_normal_image').show();
   }
  });


  // ロゴに画像を使うかテキストを使うか選択（フッター用）
  $("#footer_logo_type_select #use_footer_logo_image_no").click(function () {
    $(".footer_logo_text_area").show();
    $(".footer_logo_image_area").hide();
  });
  $("#footer_logo_type_select #use_footer_logo_image_yes").click(function () {
    $(".footer_logo_text_area").hide();
    $(".footer_logo_image_area").show();
  });


  // アーカイブページのレティナディスプレイの選択
  $(".archive_blog_use_retina_checkbox:checkbox").click(function(event) {
   if ($(this).is(":checked")) {
    $('.archive_blog_retina_image').show();
    $('.archive_blog_normal_image').hide();
   } else {
    $('.archive_blog_retina_image').hide();
    $('.archive_blog_normal_image').show();
   }
  });

  // アコーディオンの開閉
  $('.sub_box').on('click', '.theme_option_subbox_headline', function(){
   $(this).parents('.sub_box').toggleClass('active');
   return false;
  });


  // テーマオプションの入力エリアの開閉
  $('.theme_option_field_ac').on('click', '.theme_option_headline', function(){
   $(this).parents('.theme_option_field_ac').toggleClass('active');
   return false;
  });
  $('.theme_option_field_ac').on('click', '.close_ac_content', function(){
   $(this).parents('.theme_option_field_ac').toggleClass('active');
   return false;
  });


  // theme option tab
  $('#my_theme_option').cookieTab({
   tabMenuElm: '#theme_tab',
   tabPanelElm: '#tab-panel'
  });


  // rebox
  $("#ml_custom_fields_box1").rebox({
   selector:'a',
   zIndex: 99999,
   loading: '&loz;'
  });


	// radio button for page custom fields
   $("#map_type_type2").click(function () {
    $(".google_map_code_area").hide();
    $(".google_map_code_area2").show();
   });

   $("#map_type_type1").click(function () {
    $(".google_map_code_area").show();
    $(".google_map_code_area2").hide();
   });

   $(".ml_custom_fields_select .template li label").click(function () {
     $(".ml_custom_fields_select .template li label").removeClass('active');
     $(this).addClass('active');
   });

   $(".ml_custom_fields_select .side_content li label").click(function () {
     $(".ml_custom_fields_select .side_content li label").removeClass('active');
     $(this).addClass('active');
   });


  // カスタムフィールド　繰り返しフィールド --------------------------------------------------------------
  // custom field simple repeater add row
  $(".cf_simple_repeater_container a.button-add-row").click(function(){
    var clone = $(this).attr("data-clone");
    var $parent = $(this).closest(".cf_simple_repeater_container");
    if (clone && $parent.length) {
      $parent.find("table.cf_simple_repeater tbody").append(clone);
    }
    return false;
  });

  // custom field simple repeater delete row
  $("table.cf_simple_repeater").on("click", ".button-delete-row", function(){
    var del = true;
    var confirm_message = $(this).closest("table.cf_simple_repeater").attr("data-delete-confirm");
    if (confirm_message) {
      del = confirm(confirm_message);
    }
    if (del) {
      $(this).closest("tr").remove();
    }
    return false;
  });

  // custom field simple repeater sortable
  $('table.cf_simple_repeater-sortable tbody').sortable({
    //helper: "clone",
    forceHelperSize: true,
    forcePlaceholderSize: true,
    distance: 10,
    start: function(event, ui) {
      $(ui.placeholder).height($(ui.helper).height());
    }
  });


  // フッターの固定メニュー --------------------------------------------------------------
  // アコーディオンの開閉
  $(".repeater").on("click", ".theme_option_subbox_headline", function() {
    $(this).parents(".sub_box").toggleClass("active");
    return false;
  });

  // ボタンの並び替え
  $(".sortable").sortable({
    placeholder: "sortable-placeholder",
    handle: '.theme_option_subbox_headline',
    //helper: "clone",
    stop: function (e, ui) {
      ui.item.toggleClass("active");
    },
    forceHelperSize: true,
    forcePlaceholderSize: true
  });

  // 新しいアイテムを追加する
  $(".repeater-wrapper").each(function() {
    var next_index = $(this).find(".repeater-item").last().index();
    $(this).find(".button-add-row").click(function() {
      var clone = $(this).attr("data-clone");
      var $parent = $(this).closest(".repeater-wrapper");
      if (clone && $parent.size()) { 
        next_index++;
        clone = clone.replace(/addindex/g, next_index);
        $parent.find(".repeater").append(clone.replace(/addindex/g, next_index));
      }
      $('.c-color-picker').wpColorPicker();
      return false;
    });
  });

  // アイテムを削除する
  $(".repeater").on("click", ".button-delete-row", function() {
    var del = true;
    var confirm_message = $(this).closest(".repeater").attr("data-delete-confirm");
    if (confirm_message) {
      del = confirm(confirm_message);
    }
    if (del) {
      $(this).closest(".repeater-item").remove();
    }
    return false;
  });

  // ボタンのタイプによって、表示フィールドを切り替える
  $(".repeater").each(function() {
    $(this).on("change", ".footer-bar-type select", function() {
      var sub_box = $(this).parents(".sub_box");
      var target = sub_box.find(".footer-bar-target");
      var url = sub_box.find(".footer-bar-url");
      var number = sub_box.find(".footer-bar-number");
      switch ($(this).val()) {
        case "type1" :
          target.show();
          url.show();
          number.hide();
          break;
        case "type2" :
          target.hide();
          url.hide();
          number.hide();
          break;
        case "type3" :
          target.hide();
          url.hide();
          number.show();
        break;
      }
    });
  });

  // リピーター ボタン名
  $(document).on('change keyup', '.repeater .repeater-label', function(){
    $(this).closest('.repeater-item').find('.theme_option_subbox_headline').text($(this).val());
  });
  // フッターの固定メニューここまで --------------------------------------------------------------

	// 保護ページのラベルを見出し（.theme_option_subbox_headline）に反映する
  $(document).on('change keyup', '.theme_option_subbox_headline_label', function(){
		$(this).closest('.sub_box_content').prev().find('span').text(' : ' + $(this).val());
  });

	// メガメニュー メニュー追加用
	$('#submit-megamenudiv').click(function(e){
		e.preventDefault();
		e.stopPropagation();

		// Show the ajax spinner
		$( '.megamenudiv .spinner' ).addClass( 'is-active' );

		// wpNavMenu api
		var api = wpNavMenu;

		// add menu item
		api.addItemToMenu({
			'-1': {
				'menu-item-type': 'custom',
				'menu-item-url': '#mega-menu',
				'menu-item-title': $('#mega-menu-item-name').val()
			}
		}, api.addMenuItemToBottom, function(){
			// Remove the ajax spinner
			$( '.megamenudiv .spinner' ).removeClass( 'is-active' );
			// Set mega link form back to defaults
			$('#mega-menu-item-name').val('');
		});
	});

	// 固定ページテンプレートで表示メタボックス切替
	$('select#page_template').change(function(){
		if (this.value == 'page-ranking.php' || this.value == 'page-ranking-noside.php') {
			$('#tcd_ranking_template-hide').attr('checked', 'checked');
			$('#tcd_ranking_template').show().removeClass('closed');
			$('#post-body-content #postdivrich').hide();
		} else {
			$('#tcd_ranking_template-hide').removeAttr('checked');
			$('#tcd_ranking_template').hide();
			$('#post-body-content #postdivrich').show();
		}

		if (this.value == 'page-profile.php' || this.value == 'page-profile-noside.php') {
			$('#tcd_profile_template-hide').attr('checked', 'checked');
			$('#tcd_profile_template').show().removeClass('closed');
		} else {
			$('#tcd_profile_template-hide').removeAttr('checked');
			$('#tcd_profile_template').hide();
		}
	}).trigger('change');

	// Saturation
  $(document).on('change', '.range', function() {
    $(this).prev('.range-output').find('span').text($(this).val());
  }); 

});
