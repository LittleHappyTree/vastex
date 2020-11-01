<article>
  <div class="row">
    <div class="span8">
      <div class="post-image">
        <div class="post-heading">
          <h3><a href="<?=base_url()?>id/product">Our Product</a></h3>
        </div>
      </div>
    </div>
  </div>
</article>
  <?php foreach ($master_product_inside as $key):?>
<article style="margin-top:-70px">
  <div class="row">
    <div class="span8">
      <div class="post-image">
        <div class="post-heading">
          <h4><a href="<?=base_url()?>id/product/<?=$key->slug?>"><?=$key->nama_master?></a></h4>
        </div>
        <div class="aligncenter">
        <img src="<?=base_url()?>assets/img/<?=$key->thumbnail_img?>" alt="" />
        </div>
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
      <?php $counter=0; foreach ($detail_product as $detail): $counter += ($detail->id_master==$key->id) ? 1 : 0 ; endforeach; ?>
      <?php if ($counter > 0):?>
      This Product also contain:<br>
        <?php foreach ($detail_product as $detail):
                if ($detail->id_master==$key->id):?>
                  <a href="<?=base_url()?>id/product/<?=$key->slug?>/<?=$detail->slug?>" class="btn btn-default" style="margin-top:10px; text-transform:none;"><?=$detail->nama_produk?></a>
        <?php   endif; 
              endforeach; ?>
      <?php endif; ?>
      <br>
      <br>
      <?php if (empty($id)):?>
      <a href="<?=base_url()?>id/product/<?=$key->slug?>" class="btn btn-theme">Read More</a>
      <?php endif; ?>
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