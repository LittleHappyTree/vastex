<link rel="stylesheet" href="<?=base_url() ?>assets/admin/summernote/summernote.css">
<script src="<?=base_url() ?>assets/admin/summernote/summernote.js"></script>
<section class="content-header">
    <h1>About Us</h1>
</section>


<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Update About Us</h3>
                </div>    
                <div class="box-body">
                    <form action="<?=base_url()?>admin/save/about" method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            <?php foreach ($load as $key):?>
                            <input type="hidden" name="id" value="<?=$key->id?>">
                            <div class="form-group">
                                <textarea id="summernote" name="description"><?=$key->description?></textarea>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <?php foreach ($load as $key):?>
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">About Us Preview On Web</h3><br>
                    <span><i>Last Modified: <b><?=$key->last_modified?></b> by <b><?=$key->user_modified?></b></i></span>
                </div>    
                <div class="box-body">
                    <?=$key->description?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<script>
var baseUrl = '<?=base_url()?>';
</script>
<script src="<?=base_url() ?>assets/admin/js/summernote-upload.js"></script>