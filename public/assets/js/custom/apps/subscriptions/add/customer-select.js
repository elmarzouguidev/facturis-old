"use strict";var KTModalCustomerSelect=function(){var e,t,n,o,s,a,c=function(e){setTimeout((function(){var s=KTUtil.getRandomInt(1,6);t.classList.add("d-none"),3===s?(n.classList.add("d-none"),o.classList.remove("d-none")):(n.classList.remove("d-none"),o.classList.add("d-none")),e.complete()}),1500)},r=function(e){t.classList.remove("d-none"),n.classList.add("d-none"),o.classList.add("d-none")};return{init:function(){e=document.querySelector("#facturis_id_modal_customer_search_handler"),a=new bootstrap.Modal(document.querySelector("#facturis_id_modal_customer_search")),e&&(e.querySelector('[data-facturis-search-element="wrapper"]'),t=e.querySelector('[data-facturis-search-element="suggestions"]'),n=e.querySelector('[data-facturis-search-element="results"]'),o=e.querySelector('[data-facturis-search-element="empty"]'),(s=new KTSearch(e)).on("kt.search.process",c),s.on("kt.search.clear",r),KTUtil.on(e,'[data-facturis-search-element="customer"]',"click",(function(){a.hide()})))}}}();KTUtil.onDOMContentLoaded((function(){KTModalCustomerSelect.init()}));