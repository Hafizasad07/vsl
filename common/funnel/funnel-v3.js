var protocol = window.location.protocol;
var domain = window.location.host;
var url = protocol + '//' + domain;
var search = window.location.search;

localStorage.setItem("url_query_params",search);

function isValid(value){
    if(value !== null && typeof value !== 'undefined' && value !== '' && value !== 'null'){
        return true;
    }else{
        return false;
    }
}


if (url == 'http://localhost') {
    devurl = url + "/creditsecrets/wp-content/root/common/funnel/funnel-v4.php";
    processingUrl = url + "/creditsecrets/wp-content/root/common/funnel/funnel-v4.php";
} else if (url == 'https://creditsecrets.local' || url == 'http://creditsecrets.local' ) {
    devurl = url + "/wp-content/root/common/funnel/funnel-v4.php";
    processingUrl = url + "/wp-content/root/common/funnel/funnel-v4.php";
} else {
    devurl = url + "/common/funnel/funnel-v4.php";
    processingUrl = url + "/common/funnel/funnel-v4.php";
}





//listening to signup form
let signupForms = document.getElementsByClassName("signup_from");
for(form of signupForms){
    form.addEventListener("submit",function(e){
        e.preventDefault();
        const formData = new FormData(this);
        const client_cookie = getCookie("_ga","creditsecrets.com");
        const session_cookie = getCookie("_ga_YVX9HJM1JB","creditsecrets.com");
        let rt_variation_id_cookie = getCookie("rt_variation_id","creditsecrets.com");
        let rt_ratotor_id_cookie = getCookie("rt_rotator_id","creditsecrets.com");
       

        if(isValid(client_cookie)){
            client_id = client_cookie.split(".")[2] + "." +  client_cookie.split(".")[3];
            formData.append("ga4_client_id",client_id);
        }

        if(isValid(session_cookie)){
            session_id = session_cookie.split(".")[2];
            formData.append("ga4_session_id",session_id);
        }
       
        if(isValid(rt_variation_id_cookie)){
            formData.append("rt_variation_id",rt_variation_id_cookie);
        }else{
            //second check from local storage
            rt_variation_id_cookie = localStorage.getItem("rt_variation_id");
            if(isValid(rt_variation_id_cookie))
            {
                formData.append("rt_variation_id",rt_variation_id_cookie);
            }else{
                rt_variation_id_cookie = getQueryStringValue("rt_variation_id");
                if(isValid(rt_variation_id_cookie)){
                    formData.append("rt_variation_id",rt_variation_id_cookie);
                    //adding to local storage in case of future use
                    localStorage.setItem("rt_variation_id",rt_variation_id_cookie);
                }
            }   
        }
        //rt_ratotor_id

        if(isValid(rt_ratotor_id_cookie)){
            formData.append("rt_rotator_id",rt_ratotor_id_cookie);
        }else{
            //checking from local storage
            rt_ratotor_id_cookie = localStorage.getItem("rt_rotator_id");
            if(isValid(rt_ratotor_id_cookie))
            {
                formData.append("rt_rotator_id",rt_ratotor_id_cookie);
            }else{
                rt_ratotor_id_cookie = getQueryStringValue("rt_rotator_id");
                if(isValid(rt_ratotor_id_cookie))
                {
                    formData.append("rt_rotator_id",rt_ratotor_id_cookie);
                    //adding in local storage for future user
                    localStorage.setItem("rt_rotator_id",rt_ratotor_id_cookie);
                }
            }
        }    //updated

        if(getQueryStringValue("utm_campaign") != null)
        {
            formData.append("utm_campaign_id",getQueryStringValue("utm_campaign"));
        }

        if(getQueryStringValue("h_ad_id") != null)
        {
            formData.append("h_ad_id",getQueryStringValue("h_ad_id"));
        }
        if(getQueryStringValue("device") != null)
        {
            formData.append("device",getQueryStringValue("device"));
        }else if(localStorage.getItem("rt_device") != null)
        {
            formData.append("device",localStorage.getItem("rt_device"));
        }

        const quiz_answers = localStorage.getItem("quiz_answers");
        
        if(quiz_answers){
            formData.append("quiz_answers",quiz_answers);
        }
        processVslPage(formData);
    });
}

//getting ga4 client id

function getCookie(cookieName, domain) {
    const cookies = document.cookie.split('; ');
  
    for (let i = 0; i < cookies.length; i++) {
      const cookie = cookies[i];
      const [name, value] = cookie.split('=');
  
      if (name === cookieName) {
        // Check if the domain matches the desired domain
        const cookieDomain = document.location.hostname;
        if (domain === cookieDomain) {
          return decodeURIComponent(value);
        }
      }
    }
  
    // If the cookie is not found, return null or handle it as needed
    return null;
  }


// function getClientId() {
//     var cookieValue = document.cookie
//       .split('; ')
//       .find((row) => row.startsWith('_ga='));
  
//     if (cookieValue) {
//       var clientId = cookieValue
//         .split('.')[2] + "." + cookieValue
//         .split('.')[3]; // The client_id is the third part of the _ga cookie
//         console.log("client id is",clientId);
//       return clientId;
//     }
  
//     return null; // If the _ga cookie is not found
// }

//litening to checkout page
let checkoutForm = document.getElementById("db-order-form");
if(checkoutForm)
{
    checkoutForm.addEventListener("submit",function(e){
        e.preventDefault();
        initiateTimer();

        let client_id = null;
        let session_id = null;
        let rt_variation_id = null;

        const formData = new FormData(this);
        const client_cookie = getCookie("_ga","creditsecrets.com");
        const session_cookie = getCookie("_ga_YVX9HJM1JB","creditsecrets.com");
        let rt_variation_id_cookie = getCookie("rt_variation_id","creditsecrets.com");
        let rt_ratotor_id_cookie = getCookie("rt_rotator_id","creditsecrets.com");
       

        if(isValid(client_cookie)){
            client_id = client_cookie.split(".")[2] + "." +  client_cookie.split(".")[3];
            formData.append("ga4_client_id",client_id);
        }

        if(isValid(session_cookie)){
            session_id = session_cookie.split(".")[2];
            formData.append("ga4_session_id",session_id);
        }
       
        if(isValid(rt_variation_id_cookie)){
            formData.append("rt_variation_id",rt_variation_id_cookie);
        }else{
            //second check from local storage
            rt_variation_id_cookie = localStorage.getItem("rt_variation_id");
            if(isValid(rt_variation_id_cookie))
            {
                formData.append("rt_variation_id",rt_variation_id_cookie);
            }else{
                rt_variation_id_cookie = getQueryStringValue("rt_variation_id");
                if(isValid(rt_variation_id_cookie)){
                    formData.append("rt_variation_id",rt_variation_id_cookie);
                    //adding to local storage in case of future use
                    localStorage.setItem("rt_variation_id",rt_variation_id_cookie);
                }
            }    
        }
        //rt_ratotor_id

        if(isValid(rt_ratotor_id_cookie)){
            formData.append("rt_rotator_id",rt_ratotor_id_cookie);
        }else{
            //checking from local storage
            rt_ratotor_id_cookie = localStorage.getItem("rt_rotator_id");
            if(isValid(rt_ratotor_id_cookie))
            {
                formData.append("rt_rotator_id",rt_ratotor_id_cookie);
            }else{
                rt_ratotor_id_cookie = getQueryStringValue("rt_rotator_id");
                if(isValid(rt_ratotor_id_cookie))
                {
                    formData.append("rt_rotator_id",rt_ratotor_id_cookie);
                    //adding in local storage for future user
                    localStorage.setItem("rt_rotator_id",rt_ratotor_id_cookie);
                }
            }
        }  

        if(getQueryStringValue("h_ad_id") != null){
            formData.append("h_ad_id",getQueryStringValue("h_ad_id"));
        }

        if(getQueryStringValue("device") != null)
        {
            formData.append("device",getQueryStringValue("device"));
        }else if(localStorage.getItem("rt_device") != null)
        {
            formData.append("device",localStorage.getItem("rt_device"));
        }

        processCheckoutPage(formData);


    });
}


// Function to serialize a form
function serializeForm(form) {
    const formData = new FormData(form);
    const serializedData = {};

    for (const [name, value] of formData) {
        serializedData[name] = value;
    }

    return serializedData;
}



//processing every form of funnel page
function processLandingPage(){
    initiateTimer();
    const ptype = document.getElementById("ptype").value;
    const cId = document.getElementById("cId").value;
    const fname = document.getElementById("fname").value;
    
    const formData = new FormData();
    formData.append("ptype",ptype);
    formData.append("cId",cId);
    formData.append("fname",fname);

    fetch(processingUrl,{
        body:formData,
        method:"POST"
       }).then(response => {
        response.json().then(data => {
            if(data.next_url && !data.next_url.includes("error") && data.next_url != null){
                let rt_rotator_id = getQueryStringValue("rt_rotator_id");
                let rt_variation_id = getQueryStringValue("rt_variation_id");
                let string = "";
                if(rt_variation_id){
                    string = "&rt_variation_id="+rt_variation_id;
                }
                if(rt_rotator_id){
                    string += "&rt_rotator_id="+rt_rotator_id;
                }
                window.location = data.next_url+string;
            }else{
                const tokens = data.next_url.split("?");
                const error = tokens[1].split("=");
                alert(error[1]);
                if(document.getElementById("app")){
                    document.getElementById("app").style.display = "none";
                }
            }
        })
    })
    return false;
}
function processFunnel(){
    initiateTimer();
    const ptype = document.getElementById("ptype").value;
  
    switch(ptype){
        case 'vsl':
            processVslPage();
            break;
        case 'checkout':
            processCheckoutPage();
            break;
        default:
            break;
    }
    return false;
}
//checkout page processing
function processCheckoutPage(formData){
    // const email = document.getElementById("email").value;
    // const name = document.getElementById("name").value;
    // const crdit_card_number = document.getElementById("crdit_card_number").value.replaceAll(" ","");
    // const offers = document.getElementById("offers").value;
    // const products = document.getElementById("products").value;
    // const cId = document.getElementById("cId").value;
    // const ptype = document.getElementById("ptype").value;
    // const prospectId = document.getElementById("prospectId").value;
    // //const billing_zip = document.getElementById("billing_zip").value;
    // const credit_card_expiry_month = document.getElementById("credit_card_expiry_month").value;
    // const credit_card_expiry_year = document.getElementById("credit_card_expiry_year").value;
    // const cvv = document.getElementById("cvc").value;
    // const formData = new FormData();
    // const discount = document.getElementById("is25percentDiscount").value;
    // const billing_address = document.querySelector('#billing_address') ? document.querySelector("#billing_address").value : '';
    // const billing_city = document.querySelector('#billing_city') ? document.querySelector('#billing_city').value : '';
    // const billing_state = document.querySelector('#billing_state') ? document.querySelector('#billing_state').value : '';
    // const billing_zip = document.querySelector('#billing_zip').value;
    
    // formData.append("discount",discount);
    
    // // console.log(formData);
    // // alert(discount);
    // // return;
    // formData.append("email",(email));
    // formData.append("name",name);
    // formData.append("credit_card",crdit_card_number);
    // formData.append("offers",offers);
    // formData.append("products",products);
    // formData.append("cId",cId);
    
    // formData.append("billing_address",billing_address);
    // formData.append("billing_city",billing_city);
    // formData.append("billing_state",billing_state);
    // formData.append("ptype",ptype);
    // formData.append("prospectId",prospectId);
    // formData.append("billing_zip",billing_zip);
    // formData.append("credit_card_expiry_month",credit_card_expiry_month);
    // formData.append("credit_card_expiry_year",credit_card_expiry_year);
    // formData.append("cvv",cvv);
    processFunnelPage(formData);
}

//process vsl page
function processVslPage(formData){
    initiateTimer();
    //preparing data
//    const email =  document.getElementById("email").value;
//    const cId = document.getElementById("cId").value;
//     const first_name = document.getElementById("first_name").value;
//     const last_name = document.getElementById("last_name").value;
//     const phone = document.getElementById("phone").value;
//     const billing_address = document.getElementById("billing_address").value;
//     const billing_zip = document.getElementById("billing_zip").value;
//     const billing_city =  document.getElementById("billing_city").value;

//    const formData = new FormData();
//     formData.append("email",email);
//     formData.append("cId",cId);
//     formData.append("ptype","vsl");
//     formData.append("first_name",first_name);
//     formData.append("last_name",last_name);
//     formData.append("phone",phone);
//     formData.append("billing_address",billing_address);
//     formData.append("billing_zip",billing_zip);
//     formData.append("billing_city",billing_city);

    //formData.append("reason",reason);
   //process started for funnel page
   processFunnelPage(formData);
    return false;
}

function getQueryParamValue(queryString, paramName) {
    const params = new URLSearchParams(queryString);
    return params.get(paramName);
}

// Function to decode base64 and parse JSON
function decodeBase64ToJson(base64String) {
    try {
      const decodedString = atob(base64String);
      return JSON.parse(decodedString);
    } catch (error) {
      console.error("Error decoding and parsing JSON:", error);
      return null;
    }
  }

  function initiateV1Timer(){
   
    if(document.getElementById("loader_v1")){
        
        document.getElementById("loader_v1").style.display = "block";
    }
    setTimeout(function(){
        document.getElementById("loader_v1").style.display = "none";
        document.getElementById("databot-tracking-loader1").style.display = "block";
    },5000);
}

function hideV1Timer(){
    if(document.getElementById("loader_v1"))
    {
        document.getElementById("loader_v1").style.display = "none";
    }
    if(document.getElementById("databot-tracking-loader1"))
    {
        document.getElementById("databot-tracking-loader1").style.display = "none";
    }
}

function initiateTimer(){
    if(document.getElementById("app")){
        document.getElementById("app").style.display = "block";
        startTimer();
    }else if(document.getElementById("databot-tracking-loader")){
        document.getElementById("databot-tracking-loader").style.display = "block";
    }else if(document.getElementById("loader_v1"))
    {
        initiateV1Timer();
    }
}

function hideLoader(){
    if(document.getElementById("app")){
        document.getElementById("app").style.display = "none";
    }

    if(document.getElementById("databot-tracking-loader"))
    {
        document.getElementById("databot-tracking-loader").style.display = "none";
    }

    if(document.getElementById("loader_v1"))
    {
        hideV1Timer();
    }
}

//controller that controls every funnel page request
function processFunnelPage(formData){
    
    fetch(processingUrl,{
        body:formData,
        method:"POST"
       }).then(response => {
        response.json().then(data => {
            if(data.next_url && !data.next_url.includes("error") && data.next_url != null){
                let timeout = 0;
                let tokens = data.next_url.split("?");
                let queryParam = tokens[1] ? tokens[1] : null;
                let info = queryParam ? getQueryParamValue(queryParam,"info") : null;
                let infoJson = info ? decodeBase64ToJson(info) : null;
                hideLoader();
                if(infoJson && infoJson.is_declined_redirect && infoJson.is_declined_redirect == 1 && data.next_url.includes("automator-2")){
                    let modal = document.getElementById("decline-redirect-modal");
                    if(modal) {
                        modal.style.display = "block";
                        timeout = 15000;
                    }
                    
                    
                }
                setTimeout(function(){
                    let rt_rotator_id = getQueryStringValue("rt_rotator_id");
                    let rt_variation_id = getQueryStringValue("rt_variation_id");
                    let string = "";
                    if(rt_variation_id){
                        string = "&rt_variation_id="+rt_variation_id;
                    }
                    if(rt_rotator_id){
                        string += "&rt_rotator_id="+rt_rotator_id;
                    }
                    window.location = data.next_url+string;
                },timeout);
                
            }else{
                const tokens = data.next_url.split("?");
                const error = tokens[1].split("=");
                alert(error[1]);
                hideLoader();
            }
        })
    })
    return false;
}


//function to process steps
function processStep(){
    initiateTimer();
    const ptype = document.getElementById("ptype").value;
    const orderId = document.getElementById("__tid__").value;
    const customerId = document.getElementById("customerId").value;
    const cId = document.getElementById("cId").value;
    const info = document.getElementById("info").value;
    const formData = new FormData();
    formData.append("ptype",ptype);
    formData.append("cId",cId);
    
    // formData.append("offer",product);
    // formData.append("product",product);
    formData.append("orderId",orderId);
    formData.append("customerId",customerId);
    formData.append("fname",document.getElementById("fname").value);
        const client_cookie = getCookie("_ga","creditsecrets.com");
        const session_cookie = getCookie("_ga_YVX9HJM1JB","creditsecrets.com");
        let rt_variation_id_cookie = getCookie("rt_variation_id","creditsecrets.com");
        let rt_ratotor_id_cookie = getCookie("rt_rotator_id","creditsecrets.com");
       

        if(isValid(client_cookie)){
            client_id = client_cookie.split(".")[2] + "." +  client_cookie.split(".")[3];
            formData.append("ga4_client_id",client_id);
        }

        if(isValid(session_cookie)){
            session_id = session_cookie.split(".")[2];
            formData.append("ga4_session_id",session_id);
        }
       
        if(isValid(rt_variation_id_cookie)){
            formData.append("rt_variation_id",rt_variation_id_cookie);
        }else{
            rt_variation_id_cookie = getQueryStringValue("rt_variation_id");
            if(isValid(rt_variation_id_cookie)){
                formData.append("rt_variation_id",rt_variation_id_cookie);
                //adding to local storage in case of future use
                localStorage.setItem("rt_variation_id",rt_variation_id_cookie);
            }
        } 
        //rt_ratotor_id

        if(isValid(rt_ratotor_id_cookie)){
            formData.append("rt_rotator_id",rt_ratotor_id_cookie);
        }else{
            rt_ratotor_id_cookie = getQueryStringValue("rt_rotator_id");
            if(isValid(rt_ratotor_id_cookie))
            {
                formData.append("rt_rotator_id",rt_ratotor_id_cookie);
                //adding in local storage for future user
                localStorage.setItem("rt_rotator_id",rt_ratotor_id_cookie);
            }
        }
    // formData.append("mmId",mmId);
    formData.append("info",info);
    
    fetch(processingUrl,{
        body: formData,
        method:"POST"
    }).then(response => {
        response.json().then(data => {
           
            if(data.next_url && !data.next_url.includes("error") && data.next_url != null){
                let rt_variation_id = getQueryStringValue("rt_variation_id");
                let rt_rotator_id = getQueryStringValue("rt_rotator_id");
                let string = "";
                if(rt_variation_id){
                    string = "&rt_variation_id="+rt_variation_id;
                }
                if(rt_rotator_id){
                    string += "&rt_rotator_id="+rt_rotator_id;
                }
                window.location = data.next_url+string;
            }else{
                const tokens = data.next_url.split("?");
                const error = tokens[1].split("=");
                alert(error[1]);
                hideLoader();
            }
        })
    });
    return false;
}

function getQueryStringValue(key) {
    // Get the full URL
    var urlString = window.location.href;
  
    // Split the URL into parts using "?" as a separator
    var urlParts = urlString.split("?");
  
    // Check if there is a query string (parameters after "?")
    if (urlParts.length > 1) {
      // Get the query string part and split it into key-value pairs using "&"
      var queryString = urlParts[1];
      var queryParams = queryString.split("&");
  
      // Loop through the key-value pairs to find the desired key
      for (var i = 0; i < queryParams.length; i++) {
        var param = queryParams[i].split("=");
        if (param.length === 2 && param[0] === key) {
          // Return the value if the key matches
          return decodeURIComponent(param[1]).replace(/#/g,"");  //if there is any # in the value
        }
      }
    }
  
    // Return null if the key is not found
    return null;
  }

function addOffer(product){
    
    initiateTimer();
   

    const ptype = document.getElementById("ptype").value;
    const orderId = document.getElementById("__tid__").value;
    const customerId = document.getElementById("customerId").value;
    const cId = document.getElementById("cId").value;
    const offer = document.getElementById("offers").value;
    const mmId = document.getElementById("mmId").value;
    const info = document.getElementById("info").value;
   
    const formData = new FormData();
    formData.append("ptype",ptype);
    formData.append("cId",cId);
    formData.append("offer",product);
    formData.append("product",product);
    formData.append("orderId",orderId);
    formData.append("customerId",customerId);
    formData.append("mmId",mmId);
    formData.append("info",info);
    formData.append("fname",document.getElementById("fname").value);
    if(getQueryStringValue("device") != null)
    {
        formData.append("device",getQueryStringValue("device"));
    }else if(localStorage.getItem("rt_device") != null)
    {
        formData.append("device",localStorage.getItem("rt_device"));
    }
    //checking for utm_campaign_id 
    let utm_campaign_id = getQueryStringValue("utm_campaign_id");
    if(utm_campaign_id)
    {
        formData.append("utm_campaign_id",utm_campaign_id);
    }
    let utm_campaign = document.getElementById("utm_campaign");
    

    if(utm_campaign){
        formData.append("campaign_id",utm_campaign.value);
    }

    let h_ad_id = document.getElementById("h_ad_id");
    if(h_ad_id){
        formData.append("ad_id",h_ad_id.value);
    }
    

    const client_cookie = getCookie("_ga","creditsecrets.com");
    const session_cookie = getCookie("_ga_YVX9HJM1JB","creditsecrets.com");
    let rt_variation_id_cookie = getCookie("rt_variation_id","creditsecrets.com");
    let rt_ratotor_id_cookie = getCookie("rt_rotator_id","creditsecrets.com");
   

    if(isValid(client_cookie)){
        client_id = client_cookie.split(".")[2] + "." +  client_cookie.split(".")[3];
        formData.append("ga4_client_id",client_id);
    }

    if(isValid(session_cookie)){
        session_id = session_cookie.split(".")[2];
        formData.append("ga4_session_id",session_id);
    }
   
    if(isValid(rt_variation_id_cookie)){
        formData.append("rt_variation_id",rt_variation_id_cookie);
    }else{
        //checking from local storage
        rt_variation_id_cookie = localStorage.getItem("rt_variation_id");
        if(isValid(rt_variation_id_cookie))
        {
            formData.append("rt_variation_id",rt_variation_id_cookie);
        }else{
            rt_variation_id_cookie = getQueryStringValue("rt_variation_id");
            if(isValid(rt_variation_id_cookie)){
                formData.append("rt_variation_id",rt_variation_id_cookie);
                //adding for future use in local storage
                localStorage.setItem("rt_variation_id",rt_variation_id_cookie);
            }
        }
    }  
    //rt_ratotor_id

    if(isValid(rt_ratotor_id_cookie)){
        formData.append("rt_rotator_id",rt_ratotor_id_cookie);
    }else{
        //checking from local storage
        rt_ratotor_id_cookie = localStorage.getItem("rt_rotator_id");
        if(isValid(rt_ratotor_id_cookie))
        {
            formData.append("rt_rotator_id",rt_ratotor_id_cookie);
        }else{
            rt_ratotor_id_cookie = getQueryStringValue("rt_rotator_id");
            if(isValid(rt_ratotor_id_cookie))
            {
                formData.append("rt_rotator_id",rt_ratotor_id_cookie);
                //adding in local storage for future user
                localStorage.setItem("rt_rotator_id",rt_ratotor_id_cookie);
            }
        }
    }  
    fetch(processingUrl,{
        body: formData,
        method:"POST"
    }).then(response => {
        response.json().then(data => {
            if(data.next_url && !data.next_url.includes("error") && data.next_url != null){
                //adding rt variation id and rotator id from local storage
                let rt_variation_id = getQueryStringValue("rt_variation_id");
                let rt_rotator_id = getQueryStringValue("rt_rotator_id");
                let string = "";
                if(rt_variation_id){
                    string = "&rt_variation_id="+rt_variation_id;
                }
                if(rt_rotator_id){
                    string += "&rt_rotator_id="+rt_rotator_id;
                }
                let previousUpsell = document.getElementById("previous_upsell");
                if(previousUpsell)
                {
                    let whiteListedProducts = [11,13,14];
                    if(whiteListedProducts.indexOf(parseInt(previousUpsell.value)) !== -1)
                    {
                      let previousUpsePrice = document.getElementById("previous_upsell_price");
                      let previous_price = 0;
                      let previousUpsellEmail = '';
                      if(previousUpsePrice)
                      {
                        previous_price = parseFloat(previousUpsePrice.value);
                      }

                      let previous_upsell_email = document.getElementById("previous_upsell_email");
                      if(previous_upsell_email)
                      {
                        previousUpsellEmail = previous_upsell_email.value;
                      }

                      // Parse the URL parameters
                        let urlParams = new URLSearchParams(data.next_url);

                        // Get the value of the orderId parameter
                        let orderId = urlParams.get("orderId");
                        window.dataLayer = window.dataLayer || [];
                         window.dataLayer.push({
                          'event':'ec_purchase_all_upsells',
                          'order_value':previous_price+67,
                          'order_id':orderId,
                          'enhanced_conversion_data': {
                           "email": previousUpsellEmail,
                          }
                         });
                      
                    }
                }
              
                window.location = data.next_url+string;
            }else{
                const tokens = data.next_url.split("?");
                const error = tokens[1].split("=");
                alert(error[1]);
                hideLoader();
            }
        })
    });
    return false;
}



 // Function to mask credit card number
 function maskCreditCardNumber(cardNumber) {
    // Remove all non-numeric characters
    const numericOnly = cardNumber.replace(/\D/g, "");
    // Insert a space every 4 digits
    const maskedNumber = numericOnly.replace(/(\d{4})(?=\d)/g, '$1 ');
    // Trim to a maximum of 19 characters (16 digits + 3 spaces)
    return maskedNumber.slice(0, 19);
}

// Event listener for the input field
const creditCard = document.getElementById("crdit_card_number");    //updated
if(creditCard !== null){
    creditCard.addEventListener("input", function () {
        // Get the input value
        const inputText = this.value;

        // Mask the credit card number and update the input field
        this.value = maskCreditCardNumber(inputText);
    });
}

//page values initializer
//  setTimeout(function(){
//     const ptype = document.getElementById("ptype").value;
//     //checkout page
//     if(ptype == "checkout"){
//       const offers = [];

//       let required_offer = document.getElementById("required_offer").value;
//       if(parseInt(required_offer) >= 1){
//         offers.push(required_offer);
//       }
//       let basic_offer = document.getElementById("bump_offer").value;
//       if(parseInt(basic_offer) >= 1){
//         offers.push(basic_offer);
//       }
  
//       document.getElementById("offers").value = offers.join(",");
//       console.log("from script offers are",offers.join(","));
//     }
  
//  },3000);

