<?php if (isset($_POST["sub_section"]) && ($_POST["sub_section"]=="body_left")) { ?>

    <?php if ($debug) echo "Sub Section: Body Left"; ?>
    <?php require_once "body_left/body_left.php"; ?>

<?php } ?>

<?php if (isset($_POST["sub_section"]) && ($_POST["sub_section"]=="body_right")) { ?>
    <?php if ($debug) echo "Sub Section: Body Right"; ?>
    <?php require_once "body_right/body_right.php"; ?>
<?php } ?>