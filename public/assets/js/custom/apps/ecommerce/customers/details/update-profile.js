"use strict";var KTEcommerceUpdateProfile=function(){var e,t,i;return{init:function(){i=document.querySelector("#facturis_id_ecommerce_customer_profile"),e=i.querySelector("#facturis_id_ecommerce_customer_profile_submit"),t=FormValidation.formValidation(i,{fields:{name:{validators:{notEmpty:{message:"Name is required"}}},gen_email:{validators:{notEmpty:{message:"General Email is required"}}}},plugins:{trigger:new FormValidation.plugins.Trigger,bootstrap:new FormValidation.plugins.Bootstrap5({rowSelector:".fv-row",eleInvalidClass:"",eleValidClass:""})}}),e.addEventListener("click",(function(i){i.preventDefault(),t&&t.validate().then((function(t){console.log("validated!"),"Valid"==t?(e.setAttribute("data-facturis-indicator","on"),e.disabled=!0,setTimeout((function(){e.removeAttribute("data-facturis-indicator"),Swal.fire({text:"Your profile has been saved!",icon:"success",buttonsStyling:!1,confirmButtonText:"Ok, got it!",customClass:{confirmButton:"btn btn-primary"}}).then((function(t){t.isConfirmed&&(e.disabled=!1)}))}),2e3)):Swal.fire({text:"Sorry, looks like there are some errors detected, please try again.",icon:"error",buttonsStyling:!1,confirmButtonText:"Ok, got it!",customClass:{confirmButton:"btn btn-primary"}})}))}))}}}();KTUtil.onDOMContentLoaded((function(){KTEcommerceUpdateProfile.init()}));