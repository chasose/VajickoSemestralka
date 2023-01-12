<div class="popis">
    <div class="formular">
        <form method="post" action="?c=posts&a=store" enctype="multipart/form-data">
            <?php /** @var \App\Model\Post $data */
            if ($data->getId()) { ?>
            <input type="hidden" name="id" value="<?php echo $data->getId()?>">
            <?php }?>
            <label >
                Vstup:
                <input type="file" name="img" accept="image/*" value="<?php echo $data->getImg() ?>" required>
            </label>
            <br>
            <input type="submit" value="Odoslat" style="margin-top: 20px">
        </form>
    </div>
</div>