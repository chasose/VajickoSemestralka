<?php
/** @var Post[] $data */

use App\Model\Post;
?>
<div class="popis">
    <h1>Lorem Ipsum is simply</h1>
    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
</div>
<?php /** @var auth $auth */
if ($auth->isAdminLogged()) {?>
<div>
    <a href="?c=posts&a=create" class="block">Pridaj obrazok</a>
</div>
<?php }?>
<section class="interior">
    <?php
foreach ($data as $post){

     if ($post->getImg()) {
         /** @var App\Auth\DummyAuthenticator $auth */
         if ($auth->isAdminLogged()) {?>
            <div class="tlacidla">
                <img src="<?php echo $post->getImg()?>" alt="">
                <a href="?c=posts&a=delete&id=<?php echo $post->getId()?>" class="btn btn-danger">Zmazat</a>
                <a href="?c=posts&a=edit&id=<?php echo $post->getId()?>" class="btn btn-warning">Upravit</a>
            </div>
        <?php } else {?>
             <img src="<?php echo $post->getImg()?>" alt="">
        <?php }?>
     <?php }?>
<?php }?>
</section>