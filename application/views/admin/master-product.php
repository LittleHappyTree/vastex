<section class="content-header">
    <h1>Master Product</h1>
</section>


<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Entry Master Poduct</h3>
                </div>    
                <div class="box-body">
                <form action="<?=base_url()?>admin/save/product/master/" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?=$id?>">
                    <div class="box-body">
                        <div class="form-group">
                            <label>Product Name</label>
                            <input type="text" class="form-control" name="nama" value="<?=$nama_produk?>" placeholder="Enter product name">
                        </div>
                        <div class="form-group">
                            <label>Product Description</label>
                            <textarea class="form-control" name="desc" cols="30" rows="10"><?=$deskripsi?></textarea>
                        </div>
                    </div>
                    <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                    <h3 class="box-title">Master Poduct List</h3>
                </div>    
                <div class="box-body">
                <form>
                    <div class="box-body">
                        <table id="mytable1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Product Name</th>
                                <th>Product Description</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i=1; foreach ($load as $key) { ?>
                            <tr>
                                <td><?=$i?></td>
                                <td><?=$key->nama_master?></td>
                                <td><?=substr($key->deskripsi,0,25)?>...</td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modal-master<?=$key->id?>">
                                        Action
                                    </button>&nbsp;
                                    <a href="<?=base_url()?>admin/delete/master/<?=$key->id?>" data-toggle="tooltip" title="Delete" onclick="var c = confirm('Are you sure want to Delete this item?'); if(!c) return false" class="btn btn-danger btn-xs"><i class="icon fa fa-trash"></i></a>&nbsp;
                                    <a href="<?=base_url()?>admin/product/detail/add/<?=$key->id?>" data-toggle="tooltip" title="Add Detail Product" class="btn btn-success btn-xs"><i class="icon fa fa-plus"></i></a>
                                </td>
                            </tr>
                            <?php $i++; } ?>
                            </tbody>
                        </table>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php foreach ($load as $key) { ?>
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
<?php } ?>