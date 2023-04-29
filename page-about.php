<?php
/**
 * 关于模板
 *
 * @package custom
 * @author 奈琳雪利
 * @link https://github.com/NailinShirley
 * @version 1.0.2
 */
$this->need('header.php');
?>
<section class="main-hero template-about-me">
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
<main class="main-content custom-about-template">
    <div class="d-flex justify-content-center align-items-center flex-column about-me-home">
        <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5 about-me">
            <div class="about-me__side about-me__side--front">
                <div class="about-me__cont">
                    <span class="blue">System.out.println</span><span>(<span class="red">"Hello World!"</span>);</span>
                </div>
            </div>
            <div class="about-me__side about-me__side--back">
                <!-- Back Content -->
                <div class="about-me__cta">
                    <p>
                        <span class="purple">const</span> aboutMe <span class="cyan">=</span> {
                        <br />
                        <span class="space red">name</span><span class="cyan">:</span> <span class="green">'NailinShirley'</span>,
                        <br/>
                        <span class="space red">email</span><span class="cyan">:</span> <span class="green">'YWRtaW5AbmFpbGluc2hpcmxleS5jb20='</span>,
                        <br/>
                        <span class="space red">position</span><span class="cyan">:</span> <span class="green">'null'</span>,
                        <br/>
                        <span class="space red">website</span><span class="cyan">:</span> <span class="green">'https://blog.nailinshirley.com'</span>
                        <br/> };
                    </p>
                </div>
            </div>
        </div>
    </div>
  <div class="container-sm">
    <div class="row post-content-main">
      <article class="col-12 col-sm-12 px-0 borderbox post-content article-main">
        <?php echo Utils::getContent($this->content) ?>
      </article>
    </div>
  </div>
</main>

<?php $this->need('footer.php'); ?>
