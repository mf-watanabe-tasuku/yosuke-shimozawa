<?php

/**
 * ページビルダーウィジェット登録
 */
add_page_builder_widget(array(
	'id' => 'pb-widget-staff-list',
	'form' => 'form_page_builder_widget_staff_list',
	'form_rightbar' => 'form_rightbar_page_builder_widget', // 標準右サイドバー
	'save' => 'save_page_builder_repeater',
	'display' => 'display_page_builder_widget_staff_list',
	'title' => __('Staff list', 'tcd-w'),
	'description' => '',
	'additional_class' => 'pb-repeater-widget',
	'priority' => 54
));

/**
 * リピーター行 デフォルト値
 */
function get_page_builder_widget_staff_list_default_row_values() {
	$default_row_values = array(
		'repeater_label' => '',
		'image' => '',
		'position' => '',
		'name' => '',
		'name2' => '',
		'description' => '',
		'career_label' => __('Career', 'tcd-w'),
		'career' => '',
		'facebook_url' => '',
		'twitter_url' => '',
		'instagram_url' => '',
		'rss_url' => ''
	);

	return apply_filters('get_page_builder_widget_staff_list_default_row_values', $default_row_values);
}

/**
 * フォーム
 */
function form_page_builder_widget_staff_list($values = array()) {
	// デフォルト値
	$default_values = apply_filters('page_builder_widget_staff_list_default_values', array(
		'widget_index' => '',
		'repeater' => array()
	), 'form');

	// デフォルト値に入力値をマージ
	$values = array_merge($default_values, (array) $values);

	// リピーター行の並び
	$repeater_indexes = array();
	if (!empty($values['repeater_index']) && is_array($values['repeater_index'])) {
		$repeater_indexes = $values['repeater_index'];

		// リピーター行データが無ければ削除
		foreach($repeater_indexes as $key => $repeater_index) {
			if (empty($values['repeater'][$repeater_index])) {
				unset($repeater_indexes[$key]);
			}
		}
	} elseif (!empty($values['repeater']) && is_array($values['repeater'])) {
		$repeater_indexes = array_keys($values['repeater']);
	}

	// リピーター行 最大インデックス
	$repeater_index_max = 0;
	if ($repeater_indexes) {
		$repeater_indexes = array_map('intval', $repeater_indexes);
		$repeater_index_max = max($repeater_indexes);
	}

	echo '<div class="pb_repeater_wrap" data-rows="'.$repeater_index_max.'">'."\n";
	echo '	<div class="pb_repeater_sortable">'."\n";

	// リピーター行あり
	if ($repeater_indexes) {
		// リピーター行ループ
		foreach($repeater_indexes as $repeater_index) {
			// リピーター行データあり
			if (!empty($values['repeater'][$repeater_index])) {
				// リピーター行出力
				form_page_builder_widget_staff_list_repeater_row(
					array(
						'widget_index' => $values['widget_index'],
						'repeater_index' => $repeater_index
					),
					$values['repeater'][$repeater_index]
				);
			}
		}
	}

	echo '	</div>'."\n"; // .pb_repeater_sortable

	// 項目の追加ボタン
	echo '<div class="form-field">';
	echo '<a href="#" class="pb_add_repeater button-primary">'.__('Add item', 'tcd-w').'</a>';
	echo '</div>'."\n";

	// 追加ボタン時に差し込むHTML
	echo '<div class="add_pb_repeater_clone hidden" style="display:none">'."\n";

	// 行出力
	form_page_builder_widget_staff_list_repeater_row(
		array(
			'widget_index' => $values['widget_index'],
			'repeater_index' => 'pb_repeater_add_index'
		)
	);

	echo '</div>'."\n"; // .add_pb_repeater_clone

	echo '</div>'."\n"; // .pb_repeater_wrap
}

/**
 * リピーター行出力
 */
function form_page_builder_widget_staff_list_repeater_row($values = array(), $row_values = array()) {
	// デフォルト値に入力値をマージ
	$values = array_merge(
		array(
			'widget_index' => '',
			'repeater_index' => ''
		),
		(array) $values
	);

	// 行デフォルト値
	$default_row_values = apply_filters('page_builder_widget_staff_list_default_row_values', get_page_builder_widget_staff_list_default_row_values());

	// 行デフォルト値に行の値をマージ
	$row_values = array_merge(
		$default_row_values,
		(array) $row_values
	);

	// リピーター表示名
	if (!$row_values['repeater_label']) {
		$row_values['repeater_label'] = $row_values['name'];
	}
?>

<div id="pb_staff_list-<?php echo esc_attr($values['widget_index'].'-'.$values['repeater_index']); ?>" class="pb_repeater pb_repeater-<?php echo esc_attr($values['repeater_index']); ?>">
	<input type="hidden" name="pagebuilder[widget][<?php echo esc_attr($values['widget_index']); ?>][repeater_index][]" value="<?php echo esc_attr($values['repeater_index']); ?>" />
	<ul class="pb_repeater_button pb_repeater_cf">
		<li><span class="pb_repeater_move"><?php _e('Move', 'tcd-w'); ?></span></li>
		<li><span class="pb_repeater_delete" data-confirm="<?php _e('Are you sure you want to delete this item?', 'tcd-w'); ?>"><?php _e('Delete', 'tcd-w'); ?></span></li>
	</ul>
	<div class="pb_repeater_content">
		<h3 class="pb_repeater_headline"><span class="index_label" data-empty="<?php _e('New item', 'tcd-w'); ?>"><?php echo esc_html($row_values['repeater_label']); ?></span><a href="#"><?php _e('Open', 'tcd-w'); ?></a></h3>
		<div class="pb_repeater_field">
			<div class="form-field">
				<h4><?php _e('Image', 'tcd-w'); ?></h4>
				<?php
					$input_name = 'pagebuilder[widget]['.$values['widget_index'].'][repeater]['.$values['repeater_index'].'][image]';
					$media_id = $row_values['image'];
					pb_media_form($input_name, $media_id);
				?>
				<p class="pb-description"><?php printf(__('Recommend image size. Width:%dpx, Height:%dpx', 'tcd-w'), 250, 310); ?></p>
			</div>

			<div class="form-field">
				<h4><?php _e('Name', 'tcd-w'); ?></h4>
				<input type="text" name="pagebuilder[widget][<?php echo esc_attr($values['widget_index']); ?>][repeater][<?php echo esc_attr($values['repeater_index']); ?>][name]" value="<?php echo esc_attr($row_values['name']); ?>" class="index_label pb-input-overview" />
			</div>

			<div class="form-field">
				<h4><?php _e('Other name', 'tcd-w'); ?></h4>
				<input type="text" name="pagebuilder[widget][<?php echo esc_attr($values['widget_index']); ?>][repeater][<?php echo esc_attr($values['repeater_index']); ?>][name2]" value="<?php echo esc_attr($row_values['name2']); ?>" />
			</div>

			<div class="form-field">
				<h4><?php _e('Position', 'tcd-w'); ?></h4>
				<input type="text" name="pagebuilder[widget][<?php echo esc_attr($values['widget_index']); ?>][repeater][<?php echo esc_attr($values['repeater_index']); ?>][position]" value="<?php echo esc_attr($row_values['position']); ?>" />
			</div>

			<div class="form-field">
				<h4><?php _e('Description', 'tcd-w'); ?></h4>
				<textarea name="pagebuilder[widget][<?php echo esc_attr($values['widget_index']); ?>][repeater][<?php echo esc_attr($values['repeater_index']); ?>][description]" rows="4"><?php echo esc_html($row_values['description']); ?></textarea>
			</div>

			<div class="form-field">
				<h4><?php _e('Career label', 'tcd-w'); ?></h4>
				<input type="text" name="pagebuilder[widget][<?php echo esc_attr($values['widget_index']); ?>][repeater][<?php echo esc_attr($values['repeater_index']); ?>][career_label]" value="<?php echo esc_attr($row_values['career_label']); ?>" />
			</div>

			<div class="form-field">
				<h4><?php _e('Career', 'tcd-w'); ?></h4>
				<textarea name="pagebuilder[widget][<?php echo esc_attr($values['widget_index']); ?>][repeater][<?php echo esc_attr($values['repeater_index']); ?>][career]" rows="4"><?php echo esc_html($row_values['career']); ?></textarea>
			</div>

			<div class="form-field">
				<h4><?php _e('Facebook URL', 'tcd-w'); ?></h4>
				<input type="text" name="pagebuilder[widget][<?php echo esc_attr($values['widget_index']); ?>][repeater][<?php echo esc_attr($values['repeater_index']); ?>][facebook_url]" value="<?php echo esc_attr($row_values['facebook_url']); ?>" />
			</div>

			<div class="form-field">
				<h4><?php _e('Twitter URL', 'tcd-w'); ?></h4>
				<input type="text" name="pagebuilder[widget][<?php echo esc_attr($values['widget_index']); ?>][repeater][<?php echo esc_attr($values['repeater_index']); ?>][twitter_url]" value="<?php echo esc_attr($row_values['twitter_url']); ?>" />
			</div>

			<div class="form-field">
				<h4><?php _e('Instagram URL', 'tcd-w'); ?></h4>
				<input type="text" name="pagebuilder[widget][<?php echo esc_attr($values['widget_index']); ?>][repeater][<?php echo esc_attr($values['repeater_index']); ?>][instagram_url]" value="<?php echo esc_attr($row_values['instagram_url']); ?>" />
			</div>

			<div class="form-field">
				<h4><?php _e('RSS URL', 'tcd-w'); ?></h4>
				<input type="text" name="pagebuilder[widget][<?php echo esc_attr($values['widget_index']); ?>][repeater][<?php echo esc_attr($values['repeater_index']); ?>][rss_url]" value="<?php echo esc_attr($row_values['rss_url']); ?>" />
			</div>
		</div>
	</div>
</div>

<?php
}

/**
 * フロント出力
 */
function display_page_builder_widget_staff_list($values = array(), $widget_index = null) {
	// リピーター行の並び
	if (!empty($values['repeater_index']) && is_array($values['repeater_index'])) {
		$repeater_indexes = $values['repeater_index'];

		// リピーター行ループし、行データが無ければ削除
		foreach($repeater_indexes as $key => $repeater_index) {
			if (empty($values['repeater'][$repeater_index])) {
				unset($repeater_indexes[$key]);
			}
		}
	} elseif (!empty($values['repeater']) && is_array($values['repeater'])) {
		$repeater_indexes = array_keys($values['repeater']);
	}

	// リピーター行がなければ終了
	if (empty($repeater_indexes)) return;

	// 行デフォルト値
	$default_row_values = apply_filters('page_builder_widget_staff_list_default_row_values', get_page_builder_widget_staff_list_default_row_values());

	echo '<div class="pb_staff_list">'."\n";

	$i = 0;
	foreach($repeater_indexes as $repeater_index) {
		$i++;
		$repeater_values = $values['repeater'][$repeater_index];
		$repeater_values = array_merge($default_row_values, $repeater_values);

		$image = null;
		if (!empty($repeater_values['image'])) {
			$image = wp_get_attachment_image_src($repeater_values['image'], apply_filters('page_builder_staff_list_image_size', 'full'));
		}

		echo '  <div class="pb_staff_list-item">'."\n";

		if (!empty($image[0])) {
			echo '    <div class="pb_staff_list-item-upside has-image">'."\n";
			echo '      <div class="pb_staff_list-image"><img src="'.esc_attr($image[0]).'" alt="" /></div>'."\n";
			echo '      <div class="pb_staff_list-names">'."\n";
		} else {
			echo '    <div class="pb_staff_list-item-upside">'."\n";
			echo '      <div class="pb_staff_list-names">'."\n";
		}

		if ($repeater_values['position']) {
			echo '        <div class="pb_staff_list-position">'.esc_html($repeater_values['position'])."</div>\n";
		}

		if ($repeater_values['name']) {
			echo '        <div class="pb_staff_list-name">'.esc_html($repeater_values['name'])."</div>\n";
		}

		if ($repeater_values['name2']) {
			echo '        <div class="pb_staff_list-othername">'.esc_html($repeater_values['name2'])."</div>\n";
		}

		if ($repeater_values['facebook_url'] || $repeater_values['twitter_url'] || $repeater_values['instagram_url'] || $repeater_values['rss_url']) {
			echo '        <ul class="pb_staff_list-social">';

			if ($repeater_values['facebook_url']) {
				echo '<li class="pb_staff_list-social-facebook"><a href="'.esc_attr($repeater_values['facebook_url']).'" target="_blank"></a></li>';
			}
			if ($repeater_values['twitter_url']) {
				echo '<li class="pb_staff_list-social-twitter"><a href="'.esc_attr($repeater_values['twitter_url']).'" target="_blank"></a></li>';
			}
			if ($repeater_values['instagram_url']) {
				echo '<li class="pb_staff_list-social-instagram"><a href="'.esc_attr($repeater_values['instagram_url']).'" target="_blank"></a></li>';
			}
			if ($repeater_values['rss_url']) {
				echo '<li class="pb_staff_list-social-rss"><a href="'.esc_attr($repeater_values['rss_url']).'" target="_blank"></a></li>';
			}

			echo "</ul>\n";
		}

		echo "      </div>\n"; // .pb_staff_list-names
		echo "    </div>\n"; // .pb_staff_list-item-upside

		if ($repeater_values['description']) {
			$repeater_values['description'] = trim($repeater_values['description']);
		}
		if ($repeater_values['description']) {
			echo '    <div class="pb_staff_list-description">'.str_replace(array("\r\n", "\r", "\n"), '<br>', esc_html($repeater_values['description']))."</div>\n";
		}

		if ($repeater_values['career']) {
			$repeater_values['career'] = trim($repeater_values['career']);
		}
		if ($repeater_values['career']) {
			echo '    <div class="pb_staff_list-career">';
			if ($repeater_values['career_label']) {
				echo '<strong class="pb_staff_list-career-heading">'.esc_html($repeater_values['career_label']).'</strong><br>';
			}
			echo str_replace(array("\r\n", "\r", "\n"), '<br>', esc_html($repeater_values['career']))."</div>\n";
		}

		echo "  </div>\n"; // .pb_staff_list-item
	}

	echo "</div>\n";  // .pb_staff_list
}

/**
 * フロント用css
 */

function page_builder_widget_staff_list_styles() {
	wp_enqueue_style('page_builder-staff_list', get_template_directory_uri().'/pagebuilder/assets/css/staff_list.css', false, PAGE_BUILDER_VERSION);
}

function page_builder_widget_staff_list_sctipts_styles() {
	if (is_singular() && is_page_builder() && page_builder_has_widget('pb-widget-staff-list')) {
		add_action('wp_enqueue_scripts', 'page_builder_widget_staff_list_styles', 11);
	}
}
add_action('wp', 'page_builder_widget_staff_list_sctipts_styles');
