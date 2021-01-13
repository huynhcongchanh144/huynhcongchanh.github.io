
<?php 
    $sql="SELECT * FROM `products`";
    $bang = connect::ExecuteQuery($sql);
    while($dong=mysqli_fetch_array($bang))
    {
        $src="./images/".$dong["product_image"];
        ?>
            <div class="product">
                <?php
                        ?>                           
                            <a href="#"><img src=<?php echo $src ?> alt=""></a>   
                            <h2 id="product-name"><?php echo $dong["product_name"] ?></h2>                                                      
                            <div class="price-details">
				            <div class="price-number">
							<p><span class="rupees"></span><?php echo $dong["product_price"] ?> đồng</p>
					        </div>
					       		<div class="add-cart">								
									<h4><a href="preview.html">Add to Cart</a></h4>
							     </div>
							 <div class="clear"></div>
					        </div>
                        <?php					    
                    ?>
				</div>
        <?php
    }
?>
				

<style>
    img{
        width: 200px;
        height: 199px;
    }

    .product{
        width: 250px;
        height: 300px;
        float: left;
        margin: 10px;
        margin-right: 20px;
        text-align:center;
        border: 1px solid #ebe8e8;
    }

    .product h2{
        font-size: 14px;
        color: blue
    }
</style>