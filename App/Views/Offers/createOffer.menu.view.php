<div class="popis">

    <div style="background-color: white; padding: 20px;border: 2px solid blue;">
        <form method="post" action="?c=offers&a=storeOffer" enctype="multipart/form-data">
            <?php /** @var \App\Model\offer $data */
            if ($data->getId()) { ?>
                <input type="hidden" name="id" value="<?php echo $data->getId()?>">
            <?php }?>
            <label for="image" style="color: blue;">Image:</label><br>
            <input type="file" id="image" name="image" value="<?php echo $data->getImage()?>" style="color: black;"><br>
            <br>
            <label for="title" style="color: blue;">Title:</label><br>
            <input type="text" id="title" name="title" value="<?php echo $data->getTitle()?>" required style="color: black;border: 2px solid black;"><br>
            <br>
            <label for="description" style="color: blue;">Description:</label><br>
            <textarea id="description" name="description" required style="color: black;border: 2px solid black;"><?php echo $data->getDescription()?></textarea><br>
            <br>
            <label for="price" style="color: blue;">Price:</label><br>
            <input type="number" id="price" name="price" value="<?php echo $data->getPrice()?>" required style="color: black;border: 2px solid black;"><br>
            <br>
            <input type="submit" value="Submit" style="color: red;">
        </form>
    </div>
</div>


<script>
    window.onload = function() {
        var imageInput = document.getElementById('image');
        var imageValue = '<?php echo $data->getImage()?>';
        imageInput.required = imageValue.trim() === '';
    };
</script>