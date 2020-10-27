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
                    <form action="<?=base_url()?>admin/save/customer" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?=$id?>">
                        <div class="box-body">
                            <div class="form-group">
                                <label>Customer Name</label>
                                <input type="text" class="form-control" name="client" required value="<?=$client?>" placeholder="Enter customer name">
                            </div>
                            <div class="form-group">
                                <label>Tumbnail Image Product</label>
                                <input type="file" class="form-control" name="thumbnail_img" value="">
                                <?php if (!empty($thumbnail_img)):?>
                                <img src="<?=base_url()?>assets/img/<?=$thumbnail_img?>" style="margin-top:10px;" height="100" alt="">
                                <?php endif;?>
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
                            <th>Customer</th>
                            <th>Thumbnail Image</th>
                            <th>User Modified</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; foreach ($load as $key):?>
                        <tr>
                            <td><?=$i?></td>
                            <td><?=$key->client?></td>
                            <td><img src="<?=base_url()?>assets/img/<?=$key->thumbnail_img?>" height="50" alt=""></td>
                            <td><?=$key->user_modified?></td>
                            <td><a href="<?=base_url()?>admin/customer/<?=$key->id?>" class="btn btn-xs btn-primary">Edit</a> &nbsp; 
                                <a href="<?=base_url()?>admin/delete/customer/<?=$key->id?>" data-toggle="tooltip" title="Delete" onclick="var c = confirm('Are you sure want to Delete this item?'); if(!c) return false" class="btn btn-danger btn-xs"><i class="icon fa fa-trash"></i></a>
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