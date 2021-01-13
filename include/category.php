<dl>
    <?php
		$sql = "SELECT * FROM categories";
		$bang = connect::ExecuteQuery($sql);
		while($dong = mysqli_fetch_array($bang))
		{
			?>
            	<dd>
                    <a href="index.php?act=Category&id=<?php echo $dong["cat_id"]; ?>"><?php echo $dong["cat_name"]; ?></a>
                </dd>
            <?php
		}
	?>
</dl>

<style>
    a:hover{
        text-decoration: underline;
    }
</style>