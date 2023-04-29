<?php
/**
 * 动态
 * 
 * @package custom
 * @author 奈琳雪利
 * @link https://github.com/NailinShirley
 * @version 1.0.2
 */
?>
<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>


<section class="main-hero">
  <div class="main-hero-bg" style="background-image: url('<?= $this->fields->thumbnail ?>')"></div>
  <div class="d-flex flex-column align-content-center justify-content-center main-hero-content">
    <div class="text-center main-hero-content-title"><?= $this->title; ?></div>
    <div class="text-center main-hero-content-description"><?php $this->author(); ?></div>
  </div>
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
    <div id="comments" class="w-100 post-comments">
      <?php if (Utils::isEnabled('enableComments', 'JConfig')): ?>
        <?php $this->need('says.php'); ?>
      <?php else: ?>
        <div id="vcomments" class="v">
        </div>
      <?php endif ?>
    </div>
  </div>
</main>

<?php $this->need('footer.php'); ?>