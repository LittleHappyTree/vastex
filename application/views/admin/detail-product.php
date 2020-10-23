<link rel="stylesheet" href="<?=base_url() ?>assets/admin/summernote/summernote.css">
<script src="<?=base_url() ?>assets/admin/summernote/summernote.js"></script>
<section class="content-header">
    <h1>Detail Product</h1>
</section>


<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"> <?=$retVal = ($id=='') ? 'Add' : 'Edit' ;?> Detail Poduct</h3>
                </div>    
                <div class="box-body">
                    <form action="<?=base_url()?>admin/save/product/detail" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?=$id?>">
                        <div class="box-body">
                            <div class="form-group">
                                <label>Product Master</label>
                                <select class="form-control op-select-1" name="id_master" style="width: 100%;" required>
                                    <option value=""></option>
                                    <?php foreach ($master as $key):?>
                                    <option value="<?=$key->id?>" <?=$selected = ($id_master==$key->id) ? 'selected' : '' ; ?>><?=$key->nama_master?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Detail Product Name</label>
                                <input type="text" class="form-control" name="nama_produk" required value="<?=$nama_produk?>" placeholder="Enter product name">
                            </div>
                            <div class="form-group">
                                <label>Tumbnail Image Product</label>
                                <input type="file" class="form-control" name="thumbnail_img" value="">
                                <?php if (!empty($thumbnail_img)):?>
                                <img src="<?=base_url()?>assets/img/<?=$thumbnail_img?>" style="margin-top:10px;" height="100" alt="">
                                <?php endif;?>
                            </div>
                            <div class="form-group">
                                <label>Product Description</label>
                                <textarea id="summernote" name="deskripsi"><?=$deskripsi?></textarea>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"> List Detail Poduct</h3>
                </div>    
                <div class="box-body">
                <table id="mytable1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Master Product</th>
                            <th>Detail Product</th>
                            <th>Thumbnail</th>
                            <th>Description</th>
                            <th>Date Added</th>
                            <th>User Added</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; foreach ($all as $key):?>
                        <tr>
                            <td><?=$i?></td>
                            <td><?=$key->nama_master?></td>
                            <td><?=$key->nama_produk?></td>
                            <td><img src="<?=base_url()?>assets/img/<?=$key->thumbnail_img?>" height="50" alt=""></td>
                            <td><?=substr(strip_tags($key->deskripsi),0,30)?>...</td>
                            <td><?=$key->date_added?></td>
                            <td><?=$key->user_added?></td>
                            <td><a href="<?=base_url()?>admin/product/detail/<?=$key->id?>" class="btn btn-xs btn-primary">Edit</a> &nbsp; 
                                <a href="<?=base_url()?>admin/delete/detail/<?=$key->id?>" data-toggle="tooltip" title="Delete" onclick="var c = confirm('Are you sure want to Delete this item?'); if(!c) return false" class="btn btn-danger btn-xs"><i class="icon fa fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php $i++; endforeach; ?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- <?php foreach ($load as $key) { ?>
<div class="modal fade" id="modal-master<?=$key->id?>" > 
    <div class="modal-dialog" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"><?=$key->nama_master?></h4>
            </div>
            <div class="modal-body">
            <p><?=$key->deskripsi?></p>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <a href="<?=base_url()?>admin/product/master/<?=$key->id?>" class="btn btn-primary">Edit</a>
            </div>
        </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<?php } ?> -->

<script>
var baseUrl = '<?=base_url()?>';
</script>
<script src="<?=base_url() ?>assets/admin/js/summernote-upload.js"></script>