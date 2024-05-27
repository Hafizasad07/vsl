
<?php  
$info2 = base64_decode($_GET["info"]);
$info2 = json_decode($info2,true);
$reason_for_buying = "Not Provided";
//ecommerce pixel //
if(isset($info2["upsell_price"])){
    $dbpamount = $info2["upsell_price"];
}

if(isset($info2["upsell_order_id"])){
    $order_id = $info2["upsell_order_id"];
}

if(isset($info2["reason_for_buying"]) && !empty($info2["reason_for_buying"]))
{
    $reason_for_buying = $info2["reason_for_buying"];
}

?>
<?php if(!empty($order_id) && $order_id != null): ?>
<script>
  /*
window.dataLayer = window.dataLayer || [];
window.dataLayer.push({ ecommerce: null });  // Clear the previous ecommerce object.
window.dataLayer.push({
  event: "ga4_purchase",
  ecommerce: {
      transaction_id: "<?= $order_id ?>",
      value: <?= $dbpamount ?>,
      currency: "USD",
      reason_for_buying:"<?= $reason_for_buying ?>",
      items: [
       {
        item_id: <?= $info2["purchased_product_id"] ?>,
        item_name: "<?= $info2['purchased_product'] ?>",
        price: <?= $dbpamount ?>,
        quantity: 1
      }
      <?php if($info2["is_trial_checked"] && strpos(strtolower($_SERVER['REQUEST_URI']),"automator") !== false): ?>
      ,{
        item_id: 15,
        item_name:"SMC Trial",
        price:0,
        quantity:1
        }<?php endif; ?>
    
    
    ]
  }
});
*/

</script>
<?php endif; ?>