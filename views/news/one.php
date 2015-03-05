<p>Новость:</p>
<h3><?php echo $item->title; ?></h3>
<p><?php echo $item->text; ?></p>
<a href="index.php?ctrl=Admin&act=Del&id=<?php echo $item->id; ?>"><?php echo $del; ?></a>


