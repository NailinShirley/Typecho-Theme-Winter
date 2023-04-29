<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<section class="main-hero">
  <div class="main-hero-bg"
       style="background-image: url('<?= $this->fields->thumbnail ?>')"></div>
  <div class="d-flex flex-column align-content-center justify-content-center main-hero-content">
    <div class="text-center main-hero-content-title"><?= $this->title; ?></div>
    <div class="text-center main-hero-content-description"><?php $this->author(); ?>
      / <?= date('Y-m-d', $this->created) ?>
      / <?= getCategory($this)['category'] ?> <br> 阅读量 <?php get_post_view($this) ?> / 本文字数 <?php echo word_count($this->cid); ?>
</div>
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
      <!--- 过时提醒 --->
    <?php
        $days_publish = round ((time() - $this->date->timeStamp) / 86400);
        $days_modified = round ((time() - $this->modified) / 86400);
        if($days_publish >= 30):
    ?>
        <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
  <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
</svg>
            <strong>提醒：</strong>本文创作于 <?=$days_publish?> 天前，最后编辑于 <?=$days_modified?> 天前，部分内容可能不具备时效性，请您注意。
        </div>
    <?php endif; ?>
    <nav class="d-none d-md-block post-content-main-breadcrumb" aria-label="breadcrumb">
      <ol class="px-3 py-0 px-md-0 breadcrumb">
        <li class="breadcrumb-item"><a href="<?= $this->options->siteUrl() ?>"><?php $this->options->title(); ?></a>
        </li>
        <li class="breadcrumb-item"><a href="<?= getCategory($this)['url'] ?>"><?= getCategory($this)['category'] ?></a>
        </li>
        <li class="breadcrumb-item active" aria-current="page"><?= $this->title; ?></li>
      </ol>
    </nav>
    <div class="row post-content-main">
      <article class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9 px-0 borderbox post-content article-main">
        <?= Utils::getContent($this->content); ?>
      </article>
      <div class="d-none d-md-block col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 px-0 article-toc-area">
        <nav id="site-toc" data-toggle="toc" class="sticky-top article-toc-nav">
        </nav>
      </div>
    </div>
    <section class="post-tools text-center w-100">
      <button
        type="button"
        class="btn site-popover btn-tools-item btn-share btn-share-popover"
        data-container=".site-wrapper"
        data-toggle="popover"
        data-placement="bottom"
        data-trigger="focus"
        title="分享"
        data-content="
        <ul class='d-flex justify-content-center align-items-center site-popover-wrapper-share'>
            <li><a class='share-weibo'
                   href='https://service.weibo.com/share/share.php?title=<?= $this->title; ?>&url=<?= $this->permalink; ?>&pic=<?= $this->fields->thumbnail ?>'
                   title='分享到微博' target='_blank' rel='nofollow noopener'><i class='fab fa-weibo'></i></a></li>
            <li>
                <a class='share-qq'
                   href='https://connect.qq.com/widget/shareqq/index.html?url=<?= $this->permalink; ?>&title=<?= $this->title; ?>&summary=<?= htmlspecialchars(excerpt($this->content)); ?>&pics=<?= $this->fields->thumbnail ?>&site=<?= $this->options->title ?>'
                   title='分享到QQ' target='_blank' rel='nofollow noopener'><i class='fab fa-qq'></i></a></li>
            <li><a class='share-wechat' title='分享到微信'><i class='fab fa-weixin'></i></a>
                <div class='post-share-wechat-qr' id='wechat-qr-code-img'></div>
            </li>
            <li><a class='share-twitter' href='https://twitter.com/share?text=<?= $this->title; ?>&url=<?= $this->permalink; ?>'
                   title='分享到推特' target='_blank' rel='nofollow noopener'><i class='fab fa-twitter'></i></a></li>
        </ul>"
        >
        <i class="fas fa-share-alt"></i>
      </button>
      <button
        type="button"
        class="btn btn-tools-item btn-donation"
        data-toggle="collapse"
        data-target="#collapseDonation"
        aria-expanded="false"
        aria-controls="collapseDonation"
        title="赞赏"
      >
        <i class="fas fa-coffee"></i>
      </button>
      <div class="collapse collapse-donation" id="collapseDonation">
        <div class="card card-body card-collapse">
          <div class="row">
            <?php if ($this->options->alipay != null): ?>
              <div class="col-sm">
                <figure class="figure">
                  <img src="<?= $this->options->alipay; ?>" alt="支付宝赞赏" title="请使用支付宝扫一扫进行赞赏">
                  <figcaption class="figure-caption">请使用支付宝扫一扫进行赞赏</figcaption>
                </figure>
              </div>
            <?php endif ?>
            <?php if ($this->options->wpay != null): ?>
              <div class="col-sm">
                <figure class="figure">
                  <img src="<?= $this->options->wpay; ?>" alt="微信赞赏" title="请使用微信扫一扫进行赞赏">
                  <figcaption class="figure-caption">请使用微信扫一扫进行赞赏</figcaption>
                </figure>
              </div>
            <?php endif ?>
            <?php if ($this->options->ecny != null): ?>
              <div class="col-sm">
                <figure class="figure">
                  <img src="<?= $this->options->ecny; ?>" alt="数字人民币赞赏" title="请使用数字人民币扫一扫进行赞赏">
                  <figcaption class="figure-caption">请使用数字人民币扫一扫进行赞赏</figcaption>
                </figure>
              </div>
            <?php endif ?>
          </div>
        </div>
      </div>
    </section>
    <ul class="post-copyright">
      <li class="post-copyright-author">
        <strong>文章作者： </strong>
        <?php $this->author(); ?>
      </li>
      <li class="post-copyright-link" style="word-wrap:break-word; word-break:break-all;">
        <strong>文章链接：</strong>
        <a href="<?= $this->permalink; ?>" title="<?= $this->title; ?>"><?= $this->permalink; ?></a>
      </li>
      <li class="post-copyright-license">
        <strong>版权声明： </strong>本博客所有文章除特别声明外，均采用 <a href="https://creativecommons.org/licenses/by-nc-sa/4.0/deed.zh"
                                                    rel="external nofollow" target="_blank">CC BY-NC-SA 4.0</a>
        许可协议。转载请注明出处！
      </li>
    </ul>
    <section class="d-flex justify-content-between align-items-center post-author-footer">
      <section class="author-card d-flex justify-content-between align-items-center">
        <?php echo $this->author->gravatar(320, 'G', NULL, 'author-profile-image') ?>
        <section class="author-card-content">
          <h4 class="author-card-name">
            <a href="<?= $this->author->permalink; ?>"><?php $this->author(); ?></a>
          </h4>
          <div class="author-card-social">
            <a class="site-popover author-card-social-links"
               href="#"
               data-container=".site-wrapper"
               data-toggle="popover"
               data-placement="top"
               data-trigger="hover"
               data-content="<div class='hero-social-wechat'><img src='<?php if ($this->options->wpay != null) {
                 echo $this->options->wpay;
               } else {
                 echo '#';
               } ?>' alt='微信二维码'/></div>"
            >
              <i class="fab fa-weixin"></i>
            </a>
            <a class="site-tooltip author-card-social-links" target="_blank" rel="noreferrer noopener nofollow"
               href="<?= $this->options->weibo ?>" data-toggle="tooltip" data-placement="top" title="WeiBo">
              <i class="fab fa-weibo"></i>
            </a>
            <a class="site-tooltip author-card-social-links" target="_blank" rel="noreferrer noopener nofollow"
               href="<?= $this->options->github ?>" data-toggle="tooltip" data-placement="top" title="Github">
              <i class="fab fa-github"></i>
            </a>
          </div>
          <p><?= Utils::getAuthor($this->author->url)['bio'] ?></p>
        </section>
      </section>
      <div class="post-footer-right">
        <a class="author-card-button" href="<?= $this->author->permalink; ?>">更多文章</a>
      </div>
    </section>
    <?php if (posts($this) != false || thePrev($this) != false || theNext($this) != false): ?>
      <aside class="post-read-more">
        <div class="row read-next-feed">
          <div class="col-lg px-0 px-sm-3 d-flex min-h-300 post-read-more-item">
            <article class="read-next-card"
                     style="background-image: url(https://cdn.nailinshirley.com/wallpaper/main-bg.jpg)">
              <header class="read-next-card-header">
                <small class="read-next-card-header-sitetitle">&mdash; <?php $this->author(); ?> &mdash;</small>
                <h3 class="read-next-card-header-title">
                  <a href="<?= getCategory($this)['url']; ?>"><?= getCategory($this)['category']; ?></a>
                </h3>
              </header>
              <div class="read-next-divider">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                  <path
                    d="M13 14.5s2 3 5 3 5.5-2.463 5.5-5.5S21 6.5 18 6.5c-5 0-7 11-12 11C2.962 17.5.5 15.037.5 12S3 6.5 6 6.5s4.5 3.5 4.5 3.5"></path>
                </svg>
              </div>
              <div class="read-next-card-content">
                <ul>
                  <?php if (posts($this) != false): ?>
                    <?php foreach (posts($this) as $v) { ?>
                      <li><a href="<?= $v['url'] ?>"><?= $v['title'] ?></a></li>
                    <?php } ?>
                  <?php endif; ?>
                </ul>
              </div>
              <footer class="read-next-card-footer">
                <a href="https://blog.nailinshirley.com/archives">查看归档 →</a>
              </footer>
            </article>
          </div>
          <?php if (thePrev($this) != false): ?>
            <div class="col-lg px-0 px-sm-3 d-flex min-h-300 post-read-more-item">
              <article class="post-read-next">
                <a class="post-read-next-image-link" href="<?= thePrev($this)['url']; ?>">
                  <img class="post-read-next-image" src="<?php if (!empty(thePrev($this)['thumbnail'])) {
                    echo thePrev($this)['thumbnail'];
                  } else {
                    echo 'https://cdn.nailinshirley.com/wallpaper/main-bg.jpg';
                  } ?>"
                       alt="#">
                </a>
                <div class="post-read-next-content">
                  <a class="post-read-next-content-link" href="<?= thePrev($this)['url']; ?>">
                    <header class="post-read-next-header">
                      <span class="post-read-next-tags"><?= thePrev($this)['category']; ?></span>
                      <h2 class="post-read-next-title"><?= thePrev($this)['title']; ?></h2>
                    </header>
                    <section class="post-read-next-excerpt">
                      <p><?= thePrev($this)['content']; ?></p>
                    </section>
                  </a>
                  <footer class="post-read-next-meta">
                    <ul class="author-list">
                      <li class="author-list-item">
                        <a href="<?= thePrev($this)['url']; ?>" class="static-avatar">
                          <?php echo $this->author->gravatar(320, 'G', NULL, 'author-profile-image') ?>
                          <span class="author-profile-name"><?php $this->author(); ?></span>
                        </a>
                      </li>
                    </ul>
                    <span class="reading-time"><?= thePrev($this)['rate'] ?>分钟阅读</span>
                  </footer>
                </div>
              </article>
            </div>
          <?php endif; ?>
          <?php if (theNext($this) != false): ?>
            <div class="col-xl px-0 px-sm-3 d-flex min-h-300 post-read-more-item">
              <article class="post-read-next">
                <a class="post-read-next-image-link" href="<?= theNext($this)['url']; ?>">
                  <img class="post-read-next-image" src="<?php if (!empty(theNext($this)['thumbnail'])) {
                    echo theNext($this)['thumbnail'];
                  } else {
                    echo 'https://cdn.nailinshirley.com/wallpaper/main-bg.jpg';
                  } ?>"
                       alt="#">
                </a>
                <div class="post-read-next-content">
                  <a class="post-read-next-content-link" href="<?= theNext($this)['url']; ?>">
                    <header class="post-read-next-header">
                      <span class="post-read-next-tags"><?= theNext($this)['category']; ?></span>
                      <h2 class="post-read-next-title"><?= theNext($this)['title']; ?></h2>
                    </header>
                    <section class="post-read-next-excerpt">
                      <p><?= theNext($this)['content']; ?></p>
                    </section>
                  </a>
                  <footer class="post-read-next-meta">
                    <ul class="author-list">
                      <li class="author-list-item">
                        <a href="<?= theNext($this)['url']; ?>" class="static-avatar">
                          <?php echo $this->author->gravatar(320, 'G', NULL, 'author-profile-image') ?>
                          <span class="author-profile-name"><?php $this->author(); ?></span>
                        </a>
                      </li>
                    </ul>
                    <span class="reading-time"><?= theNext($this)['rate'] ?>分钟阅读</span>
                  </footer>
                </div>
              </article>
            </div>
          <?php endif; ?>
        </div>
      </aside>
    <?php endif; ?>
    <div id="comments" class="w-100 post-comments">
      <!-- 这里放置评论框 -->
      <?php if (Utils::isEnabled('enableComments', 'JConfig')): ?>
        <?php $this->need('comments.php'); ?>
      <?php else: ?>
        <div id="vcomments" class="v">
        </div>
      <?php endif ?>
    </div>
  </div>
</main>
<?php $this->need('footer.php'); ?>
