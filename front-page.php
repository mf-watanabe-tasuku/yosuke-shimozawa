<?php
get_header();
?>
<div id="index_intro" class="index_content clearfix">
  <h2 class="headline rich_font color_font">INTRODUCTION</h2>
  <p class="desc">自己紹介</p>
  <div class="tcd-pb-widget widget3 pb-widget-staff-list">
    <div class="pb_staff_list">
      <div class="pb_staff_list-item">
        <div class="pb_staff_list-item-upside has-image">
          <div class="pb_staff_list-image"><img src="<?php bloginfo('template_directory'); ?>/img/yshimozawa/yosukeshimozawa_main.jpg" alt="" /></div>
          <div class="pb_staff_list-names">
            <div class="pb_staff_list-position">株式会社アンダライズ 代表取締役社長</div>
            <div class="pb_staff_list-name">下澤 陽輔</div>
            <div class="pb_staff_list-othername">YOSUKE SHIMOZAWA</div>
            <ul class="pb_staff_list-social">
              <li><a href="https://www.facebook.com/yousuke.shimozawa" target="_blank" class="facebook"><i class="fab fa-facebook-square facebook"></i></a></li>
              <li><a href="https://www.instagram.com/shimozawa_cellcare/" target="_blank" class="instagram"><i class="fab fa-instagram instagram"></i></a></li>
              <li><a target="_blank" class="podcast"> <i class="fas fa-podcast podcast"></i></a></li>
              <li><a target="_blank" class="youtube"><i class="fab fa-youtube youtube"></i></a></li>
            </ul>
            <div class="pb_staff_list-description">私は佐渡生まれの佐渡育ち。両親共に佐渡ヶ島は旧羽茂町出身で、生粋の佐渡人です。仕事するなら地元の為になりたい思いで、東京からUターンしました。家族構成が男兄弟だった事もあり、幼い頃からとにかく動き回る事が大好きで、小学生からずっと、バスケットボールに打ち込んでいました。中学時代に、部活動でケガをした事をキッカケにリハビリに興味を持ち、佐渡高校を卒業すると同時に東京へ上京、１８歳で接骨院業界に入りました。修業先で昼間は働きながら、夜間部の医療系専門学校へ通い、国家資格（柔道整復師）（鍼灸師）（按摩・マッサージ・指圧）を取得しました。</div>
            <div class="pb_staff_list-career"><strong class="pb_staff_list-career-heading">経歴</strong><br>2011年4月 故郷の佐渡ヶ島へUターン。<br>2011年5月 「しもざわ鍼灸接骨院」を開院。<br>2015年7月 分院「ひだまり接骨院」を開院。<br>2019年6月 美容専門サロン「Refaire佐渡」を開店。</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div><!-- END #index_intro -->

<div id="index_3box" class="index_content clearfix">
  <div class="box clearfix">
    <div class="image">
      <img src="<?php bloginfo('template_directory'); ?>/img/yshimozawa/yshimozawa_working3.jpg" alt="" title="" />
    </div>
  </div><!-- END .box -->
  <div class="box clearfix">
    <div class="image">
      <img src="<?php bloginfo('template_directory'); ?>/img/yshimozawa/hamochi_beds.jpg" alt="" title="" />
    </div>
  </div><!-- END .box -->
  <div class="box clearfix">
    <div class="image">
      <img src="<?php bloginfo('template_directory'); ?>/img/yshimozawa/yshimozawa_entrance.jpg" alt="" title="" />
    </div>
  </div><!-- END .box -->
</div><!-- END #index_3box -->

<div id="index_blog">
  <div id="index_blog_inner">
    <h3 class="headline rich_font color_font">BLOG</h3>
    <p class="sub_title">ブログ</p>
    <div class="blog_desc">
      <h4 class="blog_desc--title">「思い」が原因、「人生」は結果</h4>
      <p class="blog_desc--text">やりたいと思った事は、とりあえずやってみる！<br>
        そんな日常で得た体験を、思いのままに書いているブログです</p>
    </div>
    <?php $args = array('post_type' => 'post', 'posts_per_page' => 4, 'ignore_sticky_posts' => 1);
    $blog_list = new WP_Query($args);
    if ($blog_list->have_posts()) {
    ?>
      <div id="index_blog_list" class="clearfix">
        <?php while ($blog_list->have_posts()) : $blog_list->the_post(); ?>
          <article class="item clearfix slick-slide">
            <?php if (has_post_thumbnail()) { ?>
              <a class="image" href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('size3'); ?></a>
            <?php }; ?>
            <div class="title_area">
              <h4 class="title"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
                  <?php if (wp_is_mobile()) {
                    trim_title(26);
                  } else {
                    trim_title(52);
                  }; ?></a></h4>
              <ul class="meta clearfix">
                <li class="date"><time class="entry-date updated" datetime="<?php the_modified_time('c'); ?>"><?php the_time('Y.m.j'); ?></time></li>
                <li class="category"><?php the_category(' '); ?></li>
              </ul>
            </div>
          </article>
        <?php endwhile;
        wp_reset_query(); ?>
      </div><!-- END #index_blog_list -->
    <?php }; ?>
    <div class="button design_button">
      <a href="/blog">ブログ一覧</a>
    </div>
  </div>
</div><!-- END #index_blog -->

<div id=" index_works" class="index_content tcd-pb-row row4">
  <div class="tcd-pb-row-inner clearfix">
    <div class="tcd-pb-col col1">
      <div class="tcd-pb-widget widget1 pb-widget-headline">
        <h3 class="pb_headline rich_font color_font">WORKS</h3>
      </div>
      <div class="tcd-pb-widget widget2 pb-widget-editor">
        <p style="text-align: center;">実績</p>
      </div>
    </div>
  </div>
  <div class="index_content tcd-pb-row row5">
    <div class="tcd-pb-row-inner clearfix">
      <div class="tcd-pb-col col1">
        <div class="tcd-pb-widget widget1 pb-widget-editor">
          <div class="program clearfix">
            <img src="<?php bloginfo('template_directory'); ?>/img/yshimozawa/works_therapy.jpg" alt="" title="" />
            <div class="program_info">
              <h4 class="headline"><span>接骨院事業</span></h4>
              <p class="desc">佐渡市内に「ケガ」「骨盤矯正」や「体質改善」に専門特化した治療院を展開。「アスリート」「高齢者」だけでなく「慢性痛」にお悩みの方も多数来院。「確かな技術」「明確な説明」「科学的根拠」に基づき、他では治らない症状の「最後の駆け込み寺」として地域貢献を目指す。</p>
            </div>
          </div>
        </div>
        <div class="tcd-pb-widget widget2 pb-widget-editor">
          <div class="program clearfix"><img src="<?php bloginfo('template_directory'); ?>/img/yshimozawa/sample_massage3.jpg" alt="" title="" />
            <div class="program_info">
              <h4 class="headline">訪問マッサージ事業</h4>
              <p class="desc">佐渡市内に２カ所の専用事業所を構え、自力通院が難しい患者様の自宅へ訪問し、鍼灸やマッサージ施術を提供。「日常生活動作」の改善や「痛み」の軽減に取り組む。「温もりが伝わる丁寧な施術」をモットーに、佐渡の患者様へ「満面の笑顔」を届けている。</p>
            </div>
          </div>
        </div>
        <div class="tcd-pb-widget widget2 pb-widget-editor">
          <div class="program clearfix">
            <img src="<?php bloginfo('template_directory'); ?>/img/yshimozawa/works_business.jpg" alt="" title="" />
            <div class="program_info">
              <h4 class="headline">マーケティングコンサルタント事業</h4>
              <p class="desc">接骨院経営者様の月商100万超えを支援する「ヒャクゴエ塾」を主宰。「業界20年、１０万人以上の施術経験」を基に机上の理論でなく「100％現場の体験」を伝えることに情熱を注ぐ。「集客・単価UP・リピート数」を分析し、センターピンを狙う戦略を提案。</p>
            </div>
          </div>
        </div>
        <div class="tcd-pb-widget widget3 pb-widget-editor">
          <div class="program clearfix">
            <img src="<?php bloginfo('template_directory'); ?>/img/yshimozawa/works_instruction.jpg" alt="" />
            <div class="program_info">
              <h4 class="headline">柔整キャリア事業</h4>
              <p class="desc">業界経験が浅い「新人柔道整復師・柔整学生」のためのオンライン学習プログラを提供。「守・破・離」の各段階に合わせたステップ別の講座が学べる、第2の専門学校を実現。勤め先や学校以外で更に学習し、柔整師のキャリアを飛躍的に成長させるサポート。</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="index_sns">
  <div id="index_sns_content">
    <div class="sns__text-box">
      <h4 class="headline rich_font color_font">INFORMATION</h4>
      <p class="sub_title">情報発信中</p>
      <p>ここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキストここにテキスト</p>
      <div class="sns-icon-case">
        <a href="https://www.facebook.com/yousuke.shimozawa" target="_blank" class="facebook"><i class="fab fa-facebook-square facebook"></i></a>
        <a href="https://www.instagram.com/shimozawa_cellcare/" target="_blank" class="instagram"><i class="fab fa-instagram instagram"></i></a>
        <a target="_blank" class="podcast"><i class="fas fa-podcast podcast"></i></a>
        <a target="_blank" class="youtube"><i class="fab fa-youtube youtube"></i></a>
      </div>
    </div>
    <div class="sns__movie-box">
      <div class="iframe-case">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/5wpqDcpPNgs" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
    </div>
  </div>
</div>
<div id="index_contact" class="index_content">
  <div class="tcd-pb-row row1">
    <div class="tcd-pb-row-inner clearfix">
      <div class="tcd-pb-col col1">
        <div class="tcd-pb-widget widget1 pb-widget-headline">
          <h3 class="pb_headline rich_font color_font">CONTACT</h3>
        </div>
        <div class="tcd-pb-widget widget2 pb-widget-editor">
          <p class="pb_sub-headline">お問い合わせ</p>
        </div>
        <div class="tcd-pb-widget widget2 pb-widget-editor">
          <p class="mb50 contact__desc">
            上記の事業に関するご質問やご相談は、コチラからのフォームよりお願いします。</p>
        </div>
        <?php echo do_shortcode('[contact-form-7 id="124" title="contact"]'); ?>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>