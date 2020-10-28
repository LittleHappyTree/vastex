<link rel="stylesheet" href="<?=base_url() ?>assets/admin/summernote/summernote.css">
<script src="<?=base_url() ?>assets/admin/summernote/summernote.js"></script>
<section class="content-header">
    <h1>Service</h1>
</section>


<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"> <?=$retVal = ($id=='') ? 'Add' : 'Edit' ;?> Service</h3>
                </div>
                <div class="box-body">
                    <a href="<?=base_url()?>admin/gallery/" class="btn btn-primary" style="margin-bottom: 20px;"><span class="fa fa-arrow-circle-left"></span> Back to Gallery View</a>
                    <a href="#gallery-picture" class="btn btn-primary" style="margin-bottom: 20px;"><span class="fa fa-plus"></span> Add Gallery Picture</a>
                    <?=$success?>
                    <?=$failed?>
                    <form action="<?=base_url()?>admin/save/gallery" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?=$id?>">
                        <div class="box-body">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" name="judul" required value="<?=$judul?>" placeholder="Enter gallery title">
                            </div>
                            <div class="form-group">
                                <label>Gallery Description</label>
                                <textarea id="summernote" required name="deskripsi"><?=$deskripsi?></textarea>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php if (!empty($id)):?>
        <div class="col-md-12" id="gallery-picture">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Detail Picture Gallery</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="<?=base_url()?>admin/save/gallery_picture" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="gallery_id" value="<?=$id?>">
                                <div class="form-group">
                                    <label>Select Image to Upload</label>
                                    <input type="file" required class="form-control" name="thumbnail_img" value="">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Upload</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <p><b>List Gallery Image</b></p>
                            <table id="mytable1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Image</th>
                                        <th>Date Added</th>
                                        <th>User Added</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; foreach ($load_picture as $key):?>
                                    <tr>
                                        <td><?=$i?></td>
                                        <td><img src="<?=base_url()?>assets/img/<?=$key->thumbnail_img?>" height="50" alt=""></td>
                                        <td><?=$key->date_added?></td>
                                        <td><?=$key->user_added?></td>
                                        <td>
                                            <a href="<?=base_url()?>admin/delete/gallery_picture/<?=$key->id?>/<?=$key->gallery_id?>" data-toggle="tooltip" title="Delete" onclick="var c = confirm('Are you sure want to Delete this item?'); if(!c) return false" class="btn btn-danger btn-xs"><i class="icon fa fa-trash"></i></a>
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
        <?php endif; ?>
    </div>
</section>

<script>
var baseUrl = '<?=base_url()?>';
</script>
<script src="<?=base_url() ?>assets/admin/js/summernote-upload.js"></script>