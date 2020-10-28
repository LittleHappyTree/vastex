<section class="content-header">
    <h1>Gallery</h1>
</section>


<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"> List Gallery</h3>
                </div>    
                <div class="box-body">
                    <a href="<?=base_url()?>admin/gallery/add" class="btn btn-primary" style="margin-bottom: 20px;"><span class="fa fa-plus"></span> Add New Gallery</a>
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
                                <td><?=$key->judul?></td>
                                <td><?=substr(strip_tags($key->deskripsi),0,30)?>...</td>
                                <td><?=$key->last_modified?></td>
                                <td><?=$key->user_modified?></td>
                                <td><a href="<?=base_url()?>admin/gallery/edit/<?=$key->id?>" class="btn btn-xs btn-primary">Edit</a> &nbsp; 
                                    <a href="<?=base_url()?>admin/delete/gallery/<?=$key->id?>" data-toggle="tooltip" title="Delete" onclick="var c = confirm('Are you sure want to Delete this item?'); if(!c) return false" class="btn btn-danger btn-xs"><i class="icon fa fa-trash"></i></a>
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