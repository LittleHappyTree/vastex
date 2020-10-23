<link rel="stylesheet" href="<?=base_url() ?>assets/admin/summernote/summernote.css">
<script src="<?=base_url() ?>assets/admin/summernote/summernote.js"></script>
<section class="content-header">
    <h1>Address &amp; Contact</h1>
</section>


<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Update Main Address</h3>
                </div>    
                <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <form action="<?=base_url()?>admin/save/address" method="post" enctype="multipart/form-data">
                            <?php foreach ($address as $key):?>
                            <input type="hidden" name="id" value="<?=$key->id?>">
                            <div class="form-group">
                                <textarea class="form-control" id="summernote" name="address" cols="30" rows="10"><?=$key->address?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Maps URL</label>
                                <input type="text" class="form-control" name="maps_location" required value="<?=$key->maps_location?>" placeholder="Enter Google Maps URL">
                            </div>
                            <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            <?php endforeach; ?>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <h5><b>Preview on Website</b></h5>
                        <?php foreach ($address as $key):?>
                        <p style="margin-top:-10px"><i> Last updated on <?=$key->last_modified?> by <?=$key->user_modified?></i></p>
                        <iframe src="<?=$key->maps_location?>" width="100%" height="150" frameborder="0" style="border:0" allowfullscreen></iframe>
                        <p><?=$key->address?></p>
                        <?php endforeach; ?>
                        <p>
                        <?php foreach ($contact as $key):?>
                            <?=$retVal = (empty($key->icon)) ? $key->title.':' : '<span class="fa '.$key->icon.'"></span>' ;?> <?=$key->description?><br>
                        <?php endforeach; ?>
                        </p>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="col-md-12" id="contact">
        <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Contact</h3>
                </div>    
                <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <form action="<?=base_url()?>admin/save/contact" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?=$id?>">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" name="title" required value="<?=$title?>" placeholder="Title ex. Email or Phone or Fax">
                            </div>
                            <div class="form-group">
                                <label>Icon</label>
                                <input type="text" class="form-control" name="icon" value="<?=$icon?>" placeholder="Icon, see icon page for icon name">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <input type="text" class="form-control" name="description" required value="<?=$description?>" placeholder="Description">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <table table id="mytable1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Title (Icon)</th>
                                    <th>Description</th>
                                    <th>Last Modified</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; foreach ($contact as $key):?>
                                <tr>
                                    <td><?=$i?></td>
                                    <td><?=$key->title?> <?=$retVal = (empty($key->icon)) ? '' : '(<span class="fa '.$key->icon.'"></span>)' ;?> </td>
                                    <td><?=$key->description?></td>
                                    <td><?=$key->last_modified?><br><?=$key->user_modified?></td>
                                    <td>
                                        <a href="<?=base_url()?>admin/contact/<?=$key->id?>#contact" class="btn btn-xs btn-primary">edit</a>&nbsp;
                                        <a href="<?=base_url()?>admin/delete/contact/<?=$key->id?>" class="btn btn-xs btn-danger" data-toggle="tooltip" title="Delete" onclick="var c = confirm('Are you sure want to Delete this item?'); if(!c) return false"><span class="fa fa-trash"></span></a>
                                    </td>
                                </tr>
                                <?php $i++; endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
var baseUrl = '<?=base_url()?>';
</script>
<script src="<?=base_url() ?>assets/admin/js/summernote-upload.js"></script>