<dl>
    <?php
		$sql = "SELECT DISTINCT product_origin FROM products";
		$bang = connect::ExecuteQuery($sql);
		while($dong = mysqli_fetch_array($bang))
		{
			?>
            	<dd>
                    <a href="index.php?act=Producer&id=<?php echo $dong["product_origin"]; ?>"><?php echo $dong["product_origin"]; ?></a>
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