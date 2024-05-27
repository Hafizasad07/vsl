<?php
$order_id = isset($_GET["dbtid"]) ? $_GET["dbtid"] : "";
$email = isset($_GET["dbemail"]) ? $_GET["dbemail"] : "";
$first_name = isset($_GET["first_name"]) ? $_GET["first_name"] :"No Name";
$last_name = isset($_GET["last_name"]) ? $_GET["last_name"] :"No Name";
$billing_country = isset($_GET["billing_country"]) ? $_GET["billing_country"] : "Not Available";
$billing_zip = isset($_GET["billing_zip"]) ? $_GET["billing_zip"] : "Not Available";
$billing_address = isset($_GET["billing_address"]) ? $_GET["billing_address"] : "";
$billing_city = isset($_GET["billing_city"]) ? $_GET["billing_city"] : "Not Available";
$billing_state = isset($_GET["billing_state"]) ? $_GET["billing_state"] : "Not Available";
$dbpamount = isset($_GET["dbpamount"]) ? $_GET["dbpamount"] : "";
?>




<?php  if(!empty($billing_address)): ?>
<script>
    window.dataLayer = window.dataLayer || [];
     window.dataLayer.push({
  'event':'ec_purchase',
  'order_value':'<?= $dbpamount == 0 ? 39 : $dbpamount ?>',
  'order_id':'<?= $order_id == 0 ? uniqid() : $order_id ?>',
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
  'event':'ec_purchase',
  'order_value':'<?= $dbpamount == 0 ? 39 : $dbpamount ?>',
  'order_id':'<?= $order_id == 0 ? uniqid() : $order_id ?>',
  'enhanced_conversion_data': {
   "email": '<?= $email ?>',
  }
 })
</script>

<?php endif; ?>

