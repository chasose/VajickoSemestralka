<?php
/** @var openingHour[] $data */

use App\Model\openingHour;
?>

<div class="popis">
    <h1>Otvaracie hodiny v nasom podniku</h1>
</div>
<div class="menu">
    <div class="opening-hours" style="text-align: center; color: white">
        <h1>Otváracie hodiny</h1>

        <table id="opening-hours" >
        <?php
        foreach ($data as $oneDay){ ?>
            <tr>
                <?php /** @var auth $auth */?>

                <td><?php echo $oneDay->getDay() ?></td>
                <?php if ($auth->isAdminLogged()) {?>
                    <form action="?c=openingHours&a=editSchedule&id=<?php echo $oneDay->getId()?>" method="post">
                    <td><input value="<?php echo $oneDay->getStartTime() ?>" type="time" id="startTime" name="startTime">
                        <input value="<?php echo $oneDay->getEndTime() ?>" type="time" id="endTime" name="endTime"></td>
                    <td><input type="submit" class="btn btn-warning" value="ULOZ"></td>
                    </form>
                <?php } else { ?>
                    <td><?php echo $oneDay->getStartTime(),'&nbsp;-&nbsp' ,$oneDay->getEndTIme() ?></td>
                <?php } ?>
            </tr>
        <?php } ?>
        </table>
    </div>
</div>