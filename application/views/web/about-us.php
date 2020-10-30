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
						<div class="span3">
							<div class="aligncenter">
								<div class="aligncenter icon" style="margin-left:9px;">
									<i class="icon-briefcase icon-circled icon-64 active"></i>
								</div>
								<div class="text">
								<h6><strong>SWG</strong></h6>
									<div class="product-margin">
										<a href="">SWG Type-1</a><br>
										<a href="">SWG Type-2</a><br>
										<a href="">SWG Type-3</a>
									</div>
								</div>
							</div>
						</div>
						<div class="span3">
							<div class="aligncenter">
								<div class="aligncenter icon" style="margin-left:9px;">
									<i class="icon-briefcase icon-circled icon-64 active"></i>
								</div>
								<div class="text">
									<h6><strong>Ring Joint</strong></h6>
									<div class="product-margin">
										<a href="">Ring Joint Type-1</a><br>
										<a href="">Ring Joint Type-2</a><br>
										<a href="">Ring Joint Type-3</a>
									</div>
								</div>
							</div>
						</div>
						<div class="span3">
							<div class="aligncenter">
								<div class="aligncenter icon" style="margin-left:9px;">
									<i class="icon-briefcase icon-circled icon-64 active"></i>
								</div>
								<div class="text">
									<h6><strong>Materials</strong></h6>
									<div class="product-margin">
										<a href="">Material 1</a><br>
										<a href="">Material 2</a><br>
										<a href="">Material 3</a>
									</div>
								</div>
							</div>
						</div>
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
			<h3 class="heading"><strong>Machining Industry</strong></h3>
			<div class="row">
				<div class="span12">
					<div class="row">
						<div class="span3">
							<div class="aligncenter">
								<div class="aligncenter icon" style="margin-left:9px;">
									<i class="icon-briefcase icon-circled icon-64 active"></i>
								</div>
								<div class="text">
								<h6><strong>Machine 1</strong></h6>
								</div>
							</div>
						</div>
						<div class="span3">
							<div class="aligncenter">
								<div class="aligncenter icon" style="margin-left:9px;">
									<i class="icon-wrench icon-circled icon-64 active"></i>
								</div>
								<div class="text">
									<h6><strong>Machine 2</strong></h6>
								</div>
							</div>
						</div>
						<div class="span3">
							<div class="aligncenter">
								<div class="aligncenter icon" style="margin-left:9px;">
									<i class="icon-briefcase icon-circled icon-64 active"></i>
								</div>
								<div class="text">
									<h6><strong>Machine 3</strong></h6>
								</div>
							</div>
						</div>
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
			<h3 class="heading"><strong>Oil &amp; Gas</strong></h3>
			<div class="row">
				<div class="span12">
					<div class="row">
						<div class="span3">
							<div class="aligncenter">
								<div class="aligncenter icon" style="margin-left:9px;">
									<i class="icon-briefcase icon-circled icon-64 active"></i>
								</div>
								<div class="text">
								<h6><strong>Oil &amp; Gas</strong></h6>
								</div>
							</div>
						</div>
						<div class="span3">
							<div class="aligncenter">
								<div class="aligncenter icon" style="margin-left:9px;">
									<i class="icon-wrench icon-circled icon-64 active"></i>
								</div>
								<div class="text">
									<h6><strong>Oil &amp; Gas</strong></h6>
								</div>
							</div>
						</div>
						<div class="span3">
							<div class="aligncenter">
								<div class="aligncenter icon" style="margin-left:9px;">
									<i class="icon-briefcase icon-circled icon-64 active"></i>
								</div>
								<div class="text">
									<h6><strong>Oil &amp; Gas</strong></h6>
								</div>
							</div>
						</div>
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
			<h3 class="heading"><strong>Our Customers</strong></h3>
			<ul id="mycarousel" class="jcarousel-skin-tango recent-jcarousel clients">
			<?php foreach ($costumers as $key):?>
			<?php $style = (empty($key->thumbnail_img)) ? 'margin-top:35px;' : '' ; ?>
				<li style="width:250px; height:120px;">
					<div class="aligncenter">
						<?php if (!empty($key->thumbnail_img)):?>
						<img src="<?=base_url()?>assets/img/<?=$key->thumbnail_img?>" style="height:35px;padding-top:10px;" alt="">
						<?php endif; ?>
						<p style="padding-top:10px;<?=$style?>"><?=$key->client?></p>
					</div>
				</li>
			<?php endforeach; ?>
			</ul>
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
                  <!-- Item Project and Filter Name -->
                  <li class="item-thumbs span2 design" data-id="id-0" data-type="web">
                    <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                    <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="The City" href="<?=base_url()?>assets/img/works/full/image-01-full.jpg">
						<span class="overlay-img"></span>
						<span class="overlay-img-thumb font-icon-plus"></span>
						</a>
                    <!-- Thumb Image and Description -->
                    <img src="<?=base_url()?>assets/img/works/thumbs/image-01.jpg" alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis.">
                  </li>
                  <!-- End Item Project -->
                  <!-- Item Project and Filter Name -->
                  <li class="item-thumbs span2 design" data-id="id-1" data-type="icon">
                    <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                    <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="The Office" href="<?=base_url()?>assets/img/works/full/image-02-full.jpg">
						<span class="overlay-img"></span>
						<span class="overlay-img-thumb font-icon-plus"></span>
						</a>
                    <!-- Thumb Image and Description -->
                    <img src="<?=base_url()?>assets/img/works/thumbs/image-02.jpg" alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis.">
                  </li>
                  <!-- End Item Project -->
                  <!-- Item Project and Filter Name -->
                  <li class="item-thumbs span2 photography" data-id="id-2" data-type="illustrator">
                    <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                    <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="The Mountains" href="<?=base_url()?>assets/img/works/full/image-03-full.jpg">
						<span class="overlay-img"></span>
						<span class="overlay-img-thumb font-icon-plus"></span>
						</a>
                    <!-- Thumb Image and Description -->
                    <img src="<?=base_url()?>assets/img/works/thumbs/image-03.jpg" alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis.">
                  </li>
                  <!-- End Item Project -->
                  <!-- Item Project and Filter Name -->
                  <li class="item-thumbs span2 photography" data-id="id-2" data-type="illustrator">
                    <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                    <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="The Mountains" href="<?=base_url()?>assets/img/works/full/image-04-full.jpg">
						<span class="overlay-img"></span>
						<span class="overlay-img-thumb font-icon-plus"></span>
						</a>
                    <!-- Thumb Image and Description -->
                    <img src="<?=base_url()?>assets/img/works/thumbs/image-04.jpg" alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis.">
                  </li>
                  <!-- End Item Project -->
                  <!-- Item Project and Filter Name -->
                  <li class="item-thumbs span2 photography" data-id="id-4" data-type="web">
                    <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                    <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="The Sea" href="<?=base_url()?>assets/img/works/full/image-05-full.jpg">
						<span class="overlay-img"></span>
						<span class="overlay-img-thumb font-icon-plus"></span>
						</a>
                    <!-- Thumb Image and Description -->
                    <img src="<?=base_url()?>assets/img/works/thumbs/image-05.jpg" alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis.">
                  </li>
                  <!-- End Item Project -->
                  <!-- Item Project and Filter Name -->
                  <li class="item-thumbs span2 photography" data-id="id-5" data-type="icon">
                    <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                    <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="Clouds" href="<?=base_url()?>assets/img/works/full/image-06-full.jpg">
						<span class="overlay-img"></span>
						<span class="overlay-img-thumb font-icon-plus"></span>
						</a>
                    <!-- Thumb Image and Description -->
                    <img src="<?=base_url()?>assets/img/works/thumbs/image-06.jpg" alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis.">
                  </li>
                  <!-- End Item Project -->
                  <!-- Item Project and Filter Name -->
                  <li class="item-thumbs span2 photography" data-id="id-2" data-type="illustrator">
                    <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                    <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="The Mountains" href="<?=base_url()?>assets/img/works/full/image-07-full.jpg">
						<span class="overlay-img"></span>
						<span class="overlay-img-thumb font-icon-plus"></span>
						</a>
                    <!-- Thumb Image and Description -->
                    <img src="<?=base_url()?>assets/img/works/thumbs/image-07.jpg" alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis.">
                  </li>
                  <!-- End Item Project -->
                  <!-- Item Project and Filter Name -->
                  <li class="item-thumbs span2 design" data-id="id-0" data-type="web">
                    <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                    <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="The Dark" href="<?=base_url()?>assets/img/works/full/image-08-full.jpg">
						<span class="overlay-img"></span>
						<span class="overlay-img-thumb font-icon-plus"></span>
						</a>
                    <!-- Thumb Image and Description -->
                    <img src="<?=base_url()?>assets/img/works/thumbs/image-08.jpg" alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis.">
                  </li>
                  <!-- End Item Project -->
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