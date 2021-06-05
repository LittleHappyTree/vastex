<article style="margin-bottom:10px;">
  <div class="row">
    <div class="span8">
      <div class="post-image">
        <div class="post-heading">
          <h3><a href="#">Gallery</a></h3>
        </div>
      </div>
    </div>
  </div>
</article>

<article style="margin-top:-40px">
  <div class="row">
    <div class="span8">
        <div class="row">
            <section id="projects">
            <ul id="thumbs" class="portfolio">
                <?php $count=0; foreach ($gallery_picture_in as $key):?>
                <li class="item-thumbs span2 design" data-id="id-<?=$count?>" data-type="web">
                    <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="<?=$key->judul?>" href="<?=base_url()?>assets/img/<?=$key->thumbnail_img?>">
                    <span class="overlay-img"></span>
                    <span class="overlay-img-thumb font-icon-search"></span>
                    </a>
                    <img style="object-fit: cover;max-height:100px;" src="<?=base_url()?>assets/img/<?=$key->thumbnail_img?>" alt="">
                </li>
                <?php $count++; endforeach; ?>
            </ul>
            </section>
        </div>
    </div>
  </div>
</article>