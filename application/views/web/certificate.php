<article>
  <div class="row">
    <div class="span8">
      <div class="post-image">
        <div class="post-heading">
          <h3><a href="<?=base_url()?>id/certificate">Certificate</a></h3>
        </div>
      </div>
    </div>
  </div>
</article>
<?php foreach ($certificate as $key):?>
<article style="margin-top:-70px">
  <div class="row">
    <div class="span8">
      <div class="post-image">
        <div class="post-heading">
          <h4><a href="<?=base_url()?>id/certificate/<?=$key->slug?>"><?=$key->judul?></a></h4>
        </div>
        <div class="aligncenter">
        <img src="<?=base_url()?>assets/img/<?=$key->thumbnail_img?>" alt="" />
        </div>
      </div>
      <br>
      <br>
      <div class="row">
        <div class="span8">
          <div class="solidline">
          </div>
        </div>
      </div>
    </div>
  </div>
</article>
<?php endforeach; ?>