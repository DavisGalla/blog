<?php require "components/header.php"; ?>
<?php require "components/navbar.php"; ?>



<div >
<h1>Kategorijas</h1>

<form >
<input name='search' />
<button>Meklēt</button>
</form>

<?php if (count($posts) == 0){ ?>
    <p>Nav atrsts</p>
<?php } ?>

<ul>
<?php foreach($posts as $post){ ?>
   <li> <?= $post["category_name"] ?></li>
<?php } ?>
</ul>



</div>

<?php require "components/footer.php" ?>
