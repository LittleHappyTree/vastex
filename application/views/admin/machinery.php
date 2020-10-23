<link rel="stylesheet" href="<?=base_url() ?>assets/admin/summernote/summernote.css">
<script src="<?=base_url() ?>assets/admin/summernote/summernote.js"></script>
<section class="content-header">
    <h1>Machinery</h1>
</section>


<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"> <?=$retVal = ($id=='') ? 'Add' : 'Edit' ;?> Machinery</h3>
                </div>    
                <div class="box-body">
                    <form action="<?=base_url()?>admin/save/machinery" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?=$id?>">
                        <div class="box-body">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" name="judul_service" required value="<?=$judul_service?>" placeholder="Enter title">
                            </div>
                            <div class="form-group">
                                <label>Service Description</label>
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
                    <h3 class="box-title"> List Machinery</h3>
                </div>    
                <div class="box-body">
                <table id="mytable1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Last Modified</th>
                            <th>User Modified</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; foreach ($load as $key):?>
                        <tr>
                            <td><?=$i?></td>
                            <td><?=$key->judul_service?></td>
                            <td><?=substr(strip_tags($key->deskripsi),0,30)?>...</td>
                            <td><?=$key->last_modified?></td>
                            <td><?=$key->user_modified?></td>
                            <td><a href="<?=base_url()?>admin/machinery/<?=$key->id?>" class="btn btn-xs btn-primary">Edit</a> &nbsp; 
                                <a href="<?=base_url()?>admin/delete/machinery/<?=$key->id?>" data-toggle="tooltip" title="Delete" onclick="var c = confirm('Are you sure want to Delete this item?'); if(!c) return false" class="btn btn-danger btn-xs"><i class="icon fa fa-trash"></i></a>
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

<script>
var baseUrl = '<?=base_url()?>';
</script>
<script src="<?=base_url() ?>assets/admin/js/summernote-upload.js"></script>