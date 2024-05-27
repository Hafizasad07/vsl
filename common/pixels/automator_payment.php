<?php

$info2 = base64_decode($_GET["info"]);
$info2 = json_decode($info2,true);

$order_id = isset($info2["upsell_order_id"]) ? $info2["upsell_order_id"] : "Not available";
$email = isset($info2["dbemail"]) ? $info2["dbemail"] : "Not available";
$first_name = isset($info2["first_name"]) && !empty($info2["first_name"]) ? $info2["first_name"] :"Not available";
$last_name = isset($info2["last_name"]) && !empty($info2["first_name"]) ? $info2["last_name"] :"Not available";
$billing_country = isset($info2["billing_country"]) ? $info2["billing_country"] : "Not available";
$billing_zip = isset($info2["zip"]) ? $info2["zip"] : "Not available";
$billing_address = isset($info2["billing_address"]) ? $info2["billing_address"] : "Not available";
$billing_city = isset($info2["billing_city"]) ? $info2["billing_city"] : "Not available";
$billing_state = isset($info2["billing_state"]) ? $info2["billing_state"] : "Not available";
$dbpamount = isset($info2["dbpamount"]) ? $info2["dbpamount"] : "Not available";
$conversion_label = "aEejCNiXiaoBEKbynbwD";   
$event = "ec_purchase_automator"; //conversion label code
$is_upsell_bought = isset($info2["is_upsell_bought"]) && $info2["is_upsell_bought"] == 1 ? 1 : 0;
$order_amount = isset($info2["upsell_price"]) ? $info2["upsell_price"] : 49; 
$utm_campaign_id = isset($_GET["utm_campaign_id"]) ? $_GET["utm_campaign_id"] : "";
$tokens = explode("-",$utm_campaign_id);
$utm_campaign_id = isset($tokens[0]) ? $tokens[0] : "";
$blacklist_campaign_ids = [];//11694353451,20748865416
?>
<?php if(!in_array($utm_campaign_id,$blacklist_campaign_ids)): ?>
<?php if($is_upsell_bought == 1): ?>
<?php  if(!empty($billing_address) && $billing_address != "Not available"): ?>
<script>
    window.dataLayer = window.dataLayer || [];
     window.dataLayer.push({
  'event':'<?= $event ?>',
  'order_value':'<?= $order_amount ?>',
  'order_id':'<?= $order_id ?>',
  'enhanced_conversion_data': {
   "email": '<?= $email ?>',
   "first_name": '<?= $first_name ?>',
   "last_name": '<?= $last_name ?>',
   "street": '<?= $billing_address ?>',
   "city": '<?= $billing_city ?>',
   "region": '<?= $billing_state ?>',
   "postal_code": '<?= $billing_zip ?>',
   "country": 'US'
  }
 })
</script>
<?php else: ?>

<script>
     window.dataLayer = window.dataLayer || [];
 window.dataLayer.push({
  'event':'<?= $event ?>',
  'order_value':'<?= $order_amount ?>',
  'order_id':'<?= $order_id ?>',
  'enhanced_conversion_data': {
   "email": '<?= $email ?>',
  }
 })
</script>

<?php endif; ?>
<?php endif; ?>
<?php endif; ?>
