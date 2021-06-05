<article>
  <div class="row">
    <div class="span8">
      <div class="post-image">
        <div class="post-heading">
          <h3><a href="#">About Us</a></h3>
        </div>
      </div>
      <?php foreach ($about as $key):?>
			<?=$key->description?>
			<?php endforeach; ?>
    </div>
  </div>
</article>
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
      <table>
        <?php foreach ($contact as $key):?>
        <tr>
          <td width="15%"><?=$retVal = (empty($key->icon)) ? $key->title : '<i class="fa '.str_replace('fa-','icon-',$key->icon).'"></i>' ;?></td>
          <td width="5%">:</td>
          <td><?=$key->description?></td>
        </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</article>