<article>
  <div class="row">
    <div class="span8">
      <div class="post-image">
        <div class="post-heading">
          <h3><a href="#">Get in touch with us</a></h3>
        </div>
      </div>
      <?php foreach ($address as $key):?>
      <iframe src="<?=$key->maps_location?>" width="100%" height="280" frameborder="0" style="border:0" allowfullscreen></iframe>
      <h4><b>Vastex</b></h4>
      <p><?=$key->address?></p>
      <?php endforeach; ?>
      <p>
        <?php foreach ($contact as $key):?>
            <?=$retVal = (empty($key->icon)) ? $key->title.':' : '<i class="fa '.str_replace('fa-','icon-',$key->icon).'"></i>' ;?> <?=$key->description?><br>
        <?php endforeach; ?>
      </p>
    </div>
  </div>
</article>