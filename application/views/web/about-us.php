<article>
	<div class="row">
		<div class="span8">
			<div class="post-image">
				<div class="post-heading">
					<h3><a href="#">About Us</a></h3>
				</div>
			</div>
			<p>
			<?php foreach ($about as $key):?>
			<?php $deskripsi = explode('<h3 align="center">Vision</h3>',$key->description); ?>
			<?=$deskripsi[0]?>
			<?php endforeach; ?>
			</p>
			<a href="<?=base_url()?>id/contact" class="btn btn-theme">Read More</a>
		</div>
	</div>
	<div class="row">
		<div class="span8">
			<div class="solidline">
			</div>
		</div>
	</div>
	<div class="row new-content">
		<div class="span8">
			<h3 class="heading"><strong>Our Product</strong></h3>
			<div class="row">
				<div class="span12">
					<div class="row">
						<?php foreach ($master_product as $key):?>
						<div class="span3">
							<div class="aligncenter">
								<div class="aligncenter icon" style="margin-left:9px;">
									<img src="<?=base_url()?>assets/img/<?=$key->thumbnail_img?>" alt="">
								</div>
								<div class="text">
								<h6><a href="<?=base_url()?>id/product/<?=$key->slug?>"><strong><?=$key->nama_master?></strong></a></h6>
									<div class="product-margin">
										<?php foreach ($detail_product as $detail):?>
										<?php if ($detail->id_master==$key->id):?>
										<a href="<?=base_url()?>id/product/<?=$key->slug?>/<?=$detail->slug?>"><?=$detail->nama_produk?></a><br>
										<?php endif; ?>
										<?php endforeach; ?>
									</div>
								</div>
							</div>
						</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="span8">
			<div class="solidline new-content">
			</div>
		</div>
	</div>
	<div class="row new-content">
		<div class="span8">
			<h3 class="heading"><strong>Our Services</strong></h3>
			<div class="row">
				<div class="span12">
					<?php foreach ($service as $key):?>
					<a href="<?=base_url()?>id/service/<?=$key->slug?>" class="btn btn-theme" style="margin-top:3px;"><?=$key->judul_service?></a>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="span8">
			<div class="solidline new-content">
			</div>
		</div>
	</div>
	<div class="row new-content">
		<div class="span8">
			<h3 class="heading"><strong>Production Facilities</strong></h3>
			<div class="row">
				<div class="span12">
					<?php foreach ($machinery as $key):?>
					<a href="<?=base_url()?>id/machinery/<?=$key->slug?>" class="btn btn-theme" style="margin-top:3px;"><?=$key->judul_service?></a>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="span8">
			<div class="solidline new-content">
			</div>
		</div>
	</div>
	<div class="row new-content">
		<div class="span8">
			<h3 class="heading"><strong>Gallery</strong></h3>
            <div class="row">
              <section id="projects">
                <ul id="thumbs" class="portfolio">
				<?php $count=0; foreach ($gallery_picture as $key):?>
					<li class="item-thumbs span2 design" data-id="id-<?=$count?>" data-type="web">
						<a class="hover-wrap fancybox" data-fancybox-group="gallery" title="<?=$key->judul?>" href="<?=base_url()?>assets/img/<?=$key->thumbnail_img?>">
						<span class="overlay-img"></span>
						<span class="overlay-img-thumb font-icon-search"></span>
						</a>
						<img style="object-fit: cover;max-height:100px;" src="<?=base_url()?>assets/img/<?=$key->thumbnail_img?>" alt="<?=substr(strip_tags($key->deskripsi),0,40)?>... <a href='<?=base_url()?>id/gallery/<?=$key->slug?>'>Read more</a>">
					</li>
				<?php $count++; endforeach; ?>
                </ul>
              </section>
            </div>
		</div>
	</div>
	<div class="row">
		<div class="span8">
			<div class="solidline new-content">
			</div>
		</div>
	</div>
	
</article>