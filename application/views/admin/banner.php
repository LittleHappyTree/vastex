<section class="content-header">
    <h1>Gallery Banner</h1>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12" id="gallery-picture">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Detail Picture Gallery</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="<?=base_url()?>admin/save/gallery_banner" method="post" enctype="multipart/form-data">
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
                                            <a href="<?=base_url()?>admin/delete/gallery_banner/<?=$key->id?>" data-toggle="tooltip" title="Delete" onclick="var c = confirm('Are you sure want to Delete this item?'); if(!c) return false" class="btn btn-danger btn-xs"><i class="icon fa fa-trash"></i></a>
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