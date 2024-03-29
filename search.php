<?php
/**
 * 响应式TYPECHO主题
 *
 * @package Winter
 * @author 奈琳雪利
 * @link https://github.com/NailinShirley
 * @version 1.0.2
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php
$this->need('header.php');
$hiddens = '';
$hidden = '';
$prev = $this->_currentPage - 1;
$next = $this->_currentPage + 1;
if ($this->_currentPage == 0 || $this->_currentPage == 1) {
  $hidden = 'hidden';
  $cpage = 1;
} else {
  $cpage = $this->_currentPage;
}
if ($this->_currentPage == ceil($this->getTotal() / $this->parameter->pageSize)) {
  $hiddens = 'hidden';
} elseif (ceil($this->getTotal() / $this->parameter->pageSize) == 1) {
  $hiddens = 'hidden';
  $hidden = 'hidden';
}
?>
<section class="main-hero">
  <div class="main-hero-bg"
       style="background-image: url('https://cdn.nailinshirley.com/wallpaper/search.png')"></div>
  <div class="d-flex flex-column align-content-center justify-content-center main-hero-content">
    <?php if ($this->is('author')): ?>
      <div class="text-center main-hero-content-avatar">
        <img class="main-hero-content-avatar-img"
             src="<?= Utils::getGravatar($this->author->mail) ?>" alt="头像"/>
      </div>
      <div class="text-center main-hero-content-title"><?php $this->author(); ?></div>
      <div class="text-center main-hero-content-description"><?= Utils::getAuthor($this->author->url)['bio'] ?></div>
      <div class="text-center main-hero-content-description">
        <i class="fas fa-poll-h"></i> <?= Utils::getAuthorPosts($this->author->uid) ?> 篇文章
      </div>
      <div class="text-center main-hero-content-social">
        <a
          class="site-popover main-hero-content-social-links"
          href="#"
          data-container=".site-wrapper"
          data-toggle="popover"
          data-placement="bottom"
          data-trigger="hover"
          data-content="<div class='hero-social-wechat'><img src='<?php if ($this->options->wpay != null) {
            echo $this->options->wpay;
          } else {
            echo '#';
          } ?>' alt='微信二维码'/></div>"
        >
          <i class="fab fa-weixin"></i>
        </a>
        <a class="site-tooltip main-hero-content-social-links" target="_blank" rel="noreferrer noopener nofollow"
           href="<?= $this->options->weibo ?>" data-toggle="tooltip" data-placement="bottom" title=""
           data-original-title="访问微博">
          <i class="fab fa-weibo"></i>
        </a>
        <a class="site-tooltip main-hero-content-social-links" target="_blank" rel="noreferrer noopener nofollow"
           href="<?= $this->options->github ?>" data-toggle="tooltip" data-placement="bottom" title=""
           data-original-title="访问Github">
          <i class="fab fa-github"></i>
        </a>
        <a class="site-tooltip main-hero-content-social-links" target="_blank" rel="noreferrer noopener nofollow"
           href="<?= Utils::getAuthor($this->author->url)['site'] ?>" data-toggle="tooltip" data-placement="bottom"
           title=""
           data-original-title="个人地址">
          <i class="fas fa-globe-asia"></i>
        </a>
      </div>
    <?php elseif ($this->is('category')): ?>
      <div class="text-center main-hero-content-title"><?php $this->archiveTitle(array(
          'category' => _t('%s')
        ), '', ''); ?></div>
      <?php if ($this->getDescription() != null): ?>
        <div
          class="text-center main-hero-content-description"><?= Utils::getCategoryCount($this->getDescription())[0] ?></div><?php endif ?>
      <div class="text-center main-hero-content-description">该分类下有 <?= Utils::getCnums($this->category) ?> 篇文章
      </div>
    <?php elseif ($this->is('index')): ?>
      <div class="text-center main-hero-content-title"><?= $this->options->ititle ?></div>
      <div class="text-center main-hero-content-description home-sentence">永恒地运转中</div>
    <?php endif ?>
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
  <div class="container-sm pb-3 pb-lg-0">
    <?php while ($this->next()): ?>
      <article class="row mb-3 my-lg-5 post-card home-post-item">
        <div class="col-12 col-sm-12 col-md-12 col-lg-7 col-xl-6 px-0">
          <div class="post-card-image">
            <div class="post-card-image-shadow"></div>
            <a data-ajax href="<?= $this->permalink; ?>"
               class="post-card-image-link">
              <div class="post-card-image-link-background"
                   style="background-image: url('<?php
                   if ($this->fields->thumbnail) {
                     echo $this->fields->thumbnail;
                   } else {
                     echo Utils::getThumbnail();
                   }
                   ?>')"></div>
            </a>
          </div>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6" style="padding-right: 30px;padding-left: 30px">
          <div class="d-flex flex-column justify-content-center post-card-content">
            <div class="text-center mt-3 mt-lg-0 post-card-content-tag">
              <i class="fas fa-bookmark"></i>
              <?php $this->category('/', false); ?>
            </div>
            <h3 class="post-card-content-title">
              <a data-ajax href="<?= $this->permalink; ?>"
                 class="post-card-content-title-link"><?php $this->title(); ?></a>
            </h3>
            <p class="mb-3 mb-md-5 post-card-content-excerpt">
              <?php
              if ($this->fields->previewContent)
                $this->fields->previewContent();
              else
                $this->excerpt(500, '...');
              ?>
            </p>
            <div class="d-flex align-items-center post-card-content-meta">
              <div class="d-flex align-items-center mr-1 post-card-content-meta-authors">
                <a href="<?= $this->author->permalink; ?>" class="post-card-content-meta-authors-link site-tooltip"
                   data-toggle="tooltip"
                   data-placement="top" title="<?php $this->author(); ?>">
                  <?php echo $this->author->gravatar(320, 'G', NULL, 'img-thumbnail rounded-circle post-card-content-meta-authors-link-avatar') ?>
                </a>
              </div>
              <div class="d-flex flex-column align-items-start ml-1 post-card-content-meta-other">
                <div class="post-card-content-meta-other-date">
                  <i class="icon far fa-clock"></i>
                  <?= date('Y-m-d', $this->created) ?>
                </div>
                <div class="post-card-content-meta-other-readtime">
                  <i class="icon far fa-bookmark"></i>
                  <?= getRate($this->text); ?> 分钟阅读
                </div>
              </div>
            </div>
          </div>
        </div>
      </article>
    <?php endwhile; ?>
  </div>
  <?php if (ceil($this->getTotal() / $this->parameter->pageSize) <> 0): ?>
    <div class="container-sm">
      <div class="py-3 py-md-5 site-pagination">
        <nav aria-label="文章分页">
          <ul class="mb-0 pagination">
            <li class="page-item" <?php echo $hidden ?>>
              <?php $this->pageLink('<span aria-hidden="true"><i class="fas fa-angle-left"></i></span>') ?>
            </li>
            <li class="page-item"><a class="page-link">第 <?= $cpage ?>
                页，共<?php echo ceil($this->getTotal() / $this->parameter->pageSize); ?>页</a></li>
            <li class="page-item" <?php echo $hiddens ?>>
              <?php $this->pageLink('<span aria-hidden="true"><i class="fas fa-angle-right"></i></span>','next')?>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  <?php else: ?>
    <div class="container-sm">
      <p style="text-align: center"><strong>没有找到相关的内容</strong></p>
    </div>
  <?php endif ?>
</main>
<?php $this->need('footer.php'); ?>
