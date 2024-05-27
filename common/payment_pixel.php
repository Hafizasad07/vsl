<?php

$info2 = base64_decode($info);
$info2 = json_decode($info2,true);


$order_id = isset($info2["dbtid"]) ? $info2["dbtid"] : "";
$email = isset($info2["dbemail"]) ? $info2["dbemail"] : "";
$first_name = isset($info2["first_name"]) ? $info2["first_name"] :"";
$last_name = isset($info2["last_name"]) ? $info2["last_name"] :"";
$billing_country = isset($info2["billing_country"]) ? $info2["billing_country"] : "";
$billing_zip = isset($info2["zip"]) ? $info2["zip"] : "";
$billing_address = isset($info2["billing_address"]) ? $info2["billing_address"] : "";
$billing_city = isset($info2["billing_city"]) ? $info2["billing_city"] : "";
$billing_state = isset($info2["billing_state"]) ? $info2["billing_state"] : "";
$dbpamount = isset($info2["dbpamount"]) ? $info2["dbpamount"] : "";
$conversion_label = "aEejCNiXiaoBEKbynbwD";   
$event = "ec_purchase"; //conversion label code
if(isset($info2["is_trial_checked"]) && $info2["is_trial_checked"] == 1)
{
    $conversion_label = "fB-pCJzKiaoBEKbynbwD"; 
    $event = "ec_purchase_trial";//if trial flag is 1
}
?>

<input type="hidden" name="conversion_label" value="<?= $conversion_label ?>">

<?php  if(!empty($billing_address)): ?>
<script>
    window.dataLayer = window.dataLayer || [];
     window.dataLayer.push({
  'event':'<?= $event ?>',
  'order_value':'<?= $dbpamount ?>',
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
  'order_value':'<?= $dbpamount ?>',
  'order_id':'<?= $order_id ?>',
  'enhanced_conversion_data': {
   "email": '<?= $email ?>',
  }
 })
</script>

<?php endif; ?>

<?php @require_once("ecommerce_pixel.php"); ?>
