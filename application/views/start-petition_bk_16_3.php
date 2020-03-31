<script src="<?php base_url();?>/assets/ckeditor/ckeditor.js"></script>
<main id="main">
    <section id="about" class="pt-5">
      <div class="container">
        <div class="row">
          <form action="<?php base_url();?>/petition/start-petition" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                    <div class="row pl-4 pr-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Topic<span class="text-danger">*</span></label>
                                    <select id="category_id" name="category_id" class="form-control" required>
                                        <?php if(isset($category)) { foreach($category as $obj) { ?>
                                                <option value="<?php echo $obj->category_id; ?>" <?php //if($obj->selected){echo 'selected';} ?>><?php echo $obj->category_name; ?></option>
                                        <?php }} ?>
                                            </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Title<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control " name="petition_title" value="" id="petition_title" required placeholder="Title" tabindex="2"  maxlength="255">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Target<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control " name="petition_target" value="" id="petition_target" required placeholder="Target" tabindex="3"  maxlength="255">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Logo<span class="text-danger">*</span></label>
                                    <input type="file" class="form-control" name="petition_image" id="petition_image" tabindex="4" required>
                                </div>
                            </div> 
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Url<span class="text-danger"></span></label>
                                    <input type="text" class="form-control " name="petition_url" value="" id="petition_url" placeholder="Url" tabindex="5"  maxlength="255">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Goal<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control " name="petition_goal" value="" id="petition_goal" placeholder="Goal" tabindex="5"  maxlength="10">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Description<span class="text-danger">*</span></label>
                                    <textarea class="form-control" rows="3" id="petition_description" name="petition_description" tabindex="6" placeholder="Description"><?php echo isset($petition_description)?$petition_description:''?></textarea>
                                </div>
                            </div>                  
                    </div>
                    <div class="box-footer pl-4 pr-4">
                        <button type="submit" class="btn btn-primary  mb-0 aqua m-t-xs bottom15-xs btn-round btnSubmit" value="form_submit" name="save" id="save">Submit</button>
                    </div>
                    </form>
    </div>
    </div>
    </section>
  </main>
<script type="text/javascript">
    $(document).ready(function() {
        CKEDITOR.replace(
            'petition_description',
            {
                toolbar: [
                    ['Font','FontSize', 'Bold','Italic','Underline','NumberedList','BulletedList']
                ],
                width:['1150px'],
                height :['150px']
            },
        );
    });
</script>
<style type="text/css">
    input[type=file] {
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    background: #EEE;
    background: linear-gradient(to top, #FFF, #DDD);
    border: thin solid rgba(0,0,0, .5);
    border-radius: .25em;
    box-shadow: inset .25em .25em .25em rgba(255,255,255, .5), inset -.1em -.1em .1em rgba(0,0,0, 0.1);
    cursor: text;
    padding: .25em;
}
</style>
