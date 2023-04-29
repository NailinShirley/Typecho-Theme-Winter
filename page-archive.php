<?php
/**
 * 文章归档
 *
 * @package custom
 * @author 奈琳雪利
 * @link https://github.com/NailinShirley
 * @version 1.0.2
 */
$this->need('header.php');
?>
<?php Typecho_Widget::widget('Widget_Stat')->to($stat); ?>
  <body class="page-template page-links spring-body">
  <section class="main-hero">
  <div class="main-hero-bg"
       style="background-image: url('<?= $this->fields->thumbnail ?>')"></div>
  <div class="d-flex flex-column align-content-center justify-content-center main-hero-content">
    <div class="text-center main-hero-content-title"><?= $this->title; ?></div>
  <div class="main-hero-waves-area waves-area">
    <svg class="waves-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
         viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
      <defs>
        <path id="gentle-wave"
              d="M -160 44 c 30 0 58 -18 88 -18 s 58 18 88 18 s 58 -18 88 -18 s 58 18 88 18 v 44 h -352 Z"/>
      </defs>
      <g class="parallax">
        <use xlink:href="#gentle-wave" x="48" y="0"/>
        <use xlink:href="#gentle-wave" x="48" y="3"/>
        <use xlink:href="#gentle-wave" x="48" y="5"/>
        <use xlink:href="#gentle-wave" x="48" y="7"/>
      </g>
    </svg>
  </div>
</section>
  <main class="main-content">
    <div class="container-sm">
      <div class="row post-content-main">
        <article
          class="borderbox post post-content article-main custom-archive-template page post-content-use-blank">
          <div class="archive-page">
            <div class="archive-page-title">截至 <?=date('Y 年 m 月 d 日')?> 共写了 <?php $stat->publishedPostsNum() ?> 篇文章</div>
            <ul class="archive-page-list">
                <?php $this->widget('Widget_Contents_Post_Recent', 'pageSize=10000')->to($archives);   
                    $year=0; $mon=0; $i=0; $j=0;   
                    $output = '<div id="archives">';   
                    while($archives->next()):   
                        $year_tmp = date('Y',$archives->created);   
                        $mon_tmp = date('m',$archives->created);   
                        $y=$year; $m=$mon;   
                        if ($mon != $mon_tmp && $mon > 0) $output .= '</ul></li>';   
                        if ($year != $year_tmp && $year > 0) $output .= '</ul>';   
                        if ($year != $year_tmp) {   
                            $year = $year_tmp;   
                            $output .= '<h3 class="al_year">'. $year .' 年</h3><ul class="al_mon_list">'; //输出年份   
                        }   
                        if ($mon != $mon_tmp) {   
                            $mon = $mon_tmp;   
                            $output .= '<li><span class="al_mon">'. $mon .' 月</span><ul class="al_post_list">'; //输出月份   
                        }   
                        $output .= '<li>'.date('d 日：',$archives->created).'<a href="'.$archives->permalink .'">'. $archives->title .'</a>  </li>'; //输出文章日期和标题   
                        // <em>('. $archives->commentsNum.')</em>
                      
                    endwhile;   
                    $output .= '</ul></li></ul></div>';   
                    echo $output;   
                ?>  
            </ul>
          </div>
        </article>
      </div>
  </main>
  </body>
<?php $this->need('footer.php'); ?>
