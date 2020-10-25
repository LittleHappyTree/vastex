<section class="content-header">
    <h1>User List</h1>
</section>


<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><?=$retVal = ($id=='') ? 'Add' : 'Edit' ;?> User</h3>
                </div>    
                <div class="box-body">
                <form action="<?=base_url()?>admin/save/user" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?=$id?>">
                    <div class="box-body">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" required class="form-control" name="uname" value="<?=$username?>" placeholder="Do not use space">
                        </div>
                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" required class="form-control" name="full_name" value="<?=$fname?>" placeholder="User full name">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" <?=$retVal = ($id=='') ? 'required' : '' ;?> class="form-control" name="password" value="" placeholder="Type password">
                            <?=$retVal = ($id!='') ? '<p><i>Type password if you want to change it</i></p>' : '' ;?>
                        </div>
                        <div class="form-group">
                            <label>Role</label>
                            <select class="form-control" name="akses" required>
                                <option value=""></option>
                                <?php if ($akses==0):?>
                                <option value="1" <?=$retVal = ($role==1) ? 'selected' : '' ;?> >Super Admin</option>
                                <?php endif; ?>
                                <option value="2" <?=$retVal = ($role==2) ? 'selected' : '' ;?> >Admin</option>
                            </select>
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
                    <h3 class="box-title">User List</h3>
                </div>    
                <div class="box-body">
                    <form>
                        <div class="box-body">
                            <table id="mytable1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Username / Full Name</th>
                                    <th>Role / Status</th>
                                    <th>Last Modified</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i=1; foreach ($list_user as $key) { ?>
                                <tr>
                                    <td><?=$i?></td>
                                    <td><?=$key->uname?> / <br> <?=$key->full_name?> </td>
                                    <td><?=$key->akses_kata?> / <br> <?=$key->aktif_kata?> </td>
                                    <td><?=$key->last_modified?> by <?=$key->user_modified?> </td>
                                    <td>
                                        <?php $stat = ($key->aktif=='Y') ? 'deactive' : 'active' ;
                                              $title_tool = ($key->aktif=='Y') ? 'Close Account' : 'Open Account' ; 
                                              $lock_icon = ($key->aktif=='Y') ? 'lock' : 'unlock' ;
                                        ?>
                                        <?php if ($akses < $key->akses):?>
                                        <a href="<?=base_url()?>admin/user/<?=$key->id?>" data-toggle="tooltip" title="Delete" class="btn btn-primary btn-xs"><i class="icon fa fa-edit"></i> Edit</a>&nbsp;
                                        <a href="<?=base_url()?>admin/action/user/<?=$stat?>/<?=$key->id?>" data-toggle="tooltip" title="<?=$title_tool?>" onclick="var c = confirm('Are you sure want to <?=ucfirst($stat)?> this user?'); if(!c) return false" class="btn btn-danger btn-xs"><i class="icon fa fa-<?=$lock_icon?>"></i></a>&nbsp;
                                        <?php endif; ?>
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