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

<?php foreach ($gallery_view as $key):?>
<article style="margin-top:-40px">
  <div class="row">
    <div class="span8">
      <div class="post-image">
        <div class="post-heading">
          <h4><a href="<?=base_url()?>id/gallery/<?=$key->slug;?>"><?=$key->judul?></a></h4>
        </div>
        <?php if (!empty($key->thumbnail_img)):?>
        <div class="aligncenter">
          <img style="height:400px;" src="<?=base_url()?>assets/img/<?=$key->thumbnail_img?>" alt="" />
        </div>
        <?php endif; ?>
      </div>
      <p>
        <?php if (empty($id)):?>
          <?php if ( strlen(strip_tags($key->deskripsi)) < 400):?>
          <?=strip_tags($key->deskripsi)?>
          <?php else: ?>
          <?=substr(strip_tags($key->deskripsi),0,400)?>...
          <?php endif; ?>
        <?php else: ?>
        <?=$key->deskripsi?>
        <?php endif; ?>
      </p>
      <?php if (empty($id)):?>
      <div class="bottom-article">
        <ul class="meta-post">
          <li><i class="icon-calendar"></i><a href="#"> <?=date('l, j F Y', strtotime($key->date_added))?></a></li>
        </ul>
        <a href="<?=base_url()?>id/gallery/<?=$key->slug;?>" class="pull-right">Continue reading <i class="icon-angle-right"></i></a>
      </div>
      <?php else: ?>
      <br>
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
      <?php endif; ?>
    </div>
  </div>
</article>
<?php endforeach; ?>