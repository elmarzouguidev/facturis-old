"use strict";var KTPricingGeneral=function(){var t,n,e,a=function(n){[].slice.call(t.querySelectorAll("[data-facturis-plan-price-month]")).map((function(t){var e=t.getAttribute("data-facturis-plan-price-month"),a=t.getAttribute("data-facturis-plan-price-annual");"month"===n?t.innerHTML=e:"annual"===n&&(t.innerHTML=a)}))};return{init:function(){t=document.querySelector("#facturis_id_pricing"),n=t.querySelector('[data-facturis-plan="month"]'),e=t.querySelector('[data-facturis-plan="annual"]'),n.addEventListener("click",(function(t){t.preventDefault(),n.classList.add("active"),e.classList.remove("active"),a("month")})),e.addEventListener("click",(function(t){t.preventDefault(),n.classList.remove("active"),e.classList.add("active"),a("annual")}))}}}();KTUtil.onDOMContentLoaded((function(){KTPricingGeneral.init()}));