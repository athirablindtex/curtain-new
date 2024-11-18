jQuery((function(o){"use strict";var e=o(".shopengine-comparison-modal"),n=e.children(".se-modal-inner"),t={fadeDuration:250,isAjax:!0};function i(){let o=Cookies.get("shopengine_comparison_id_list");if(o){let e=o.split(",").filter((o=>""!==o&&"0"!==o&&o));return e=e.filter((function(o,n){return e.indexOf(o)===n})),e.map((function(o){return parseInt(o)}))}return[]}function a(){return i().length?i().length:0}function s(o,e){let n=new CustomEvent(o,{detail:e});window.dispatchEvent(n)}n.on("update.se",(function(){e.addClass("se-loaded ajaxLoaded")})),o((function(){a()&&o(".shopengine-comparison-bottom-bar").removeAttr("hidden")})),o(document).on("click",".shopengine_comparison_add_to_list_action",(function(i){i.preventDefault();var a=o(this);e.modal(t);let r=a.data("payload");o.ajax({method:"GET",url:shopEngineComparison.resturl+"shopengine-builder/v1/comparison/comparison_table/",data:r,dataType:"html",success:function(e){n.html(e),a.addClass("active"),s("shopengineComparisonProductAdded",{product_id:r.pid}),n.trigger("update.se"),o(".shopengine-comparison-bottom-bar").removeClass("active")}})})),o(document).on("click","a.shopengine-remove-action.badge-comparison",(function(e){e.preventDefault();let t=o(this).closest("td").index(),i=o(this).closest("tbody").find("tr"),a={pid:o(this).data("pid")},r=o.modal.getCurrent();r.$elm.removeClass("se-loaded ajaxLoaded"),o.ajax({url:shopEngineComparison.resturl+"shopengine-builder/v1/comparison/remove/",method:"POST",data:a,dataType:"html",success:function(e){r.$body.find('.shopengine_comparison_add_to_list_action[data-payload*="'+a.pid+'"]').removeClass("active"),i.find("td:nth-of-type("+t+")").remove(),s("shopengineComparisonProductRemoved",{product_id:a.pid}),n.trigger("update.se"),i.first().find("td").length<1&&o.modal.close()}})})),o(".comparison-page").on("click","a.shopengine-remove-action.badge-comparison",(function(e){e.preventDefault(),e.stopImmediatePropagation();let n=o(this).closest("td").index()+1,t=o(this).closest("tbody").find("tr"),i={pid:o(this).data("pid")},a=!1;1===t.first().find("td").length&&(o(".shopengine-comparison").html('<h1 class="shopengine-no-comparison-product"> No product is added for comparison, please add some product to compare </h1>'),a=!0),t.each((function(){o(this).find("td:nth-child("+n+")").remove()})),o.ajax({url:shopEngineComparison.resturl+"shopengine-builder/v1/comparison/remove/",method:"POST",data:i,dataType:"html",success:function(o){let e=JSON.parse(o);window.history.pushState({path:e.share_url},"",e.share_url),s("shopengineComparisonProductRemoved",{product_id:i.pid})}})})),o(document).on("click",".shopengine-comparison-bar-action",(function(e){e.preventDefault();let n={pid:o(this).data("pid")},t=o(this).closest(".shopengine-comparison-bottom-bar");o.ajax({url:shopEngineComparison.resturl+"shopengine-builder/v1/comparison/remove/",method:"POST",data:n,dataType:"html",beforeSend:function(){t.block({message:null,overlayCSS:{background:"#fff",opacity:.6}})},success:e=>{o(this).closest("div").remove(),t.unblock(),s("shopengineComparisonProductRemoved",{product_id:n.pid})}})})),o(".comparison-bottom-bar-toggle").on("click",(function(e){e.preventDefault();let n=o(this),t=o(".shopengine-comparison-bottom-bar");o(".shopengine-comparison-box");if(n.find("i").remove(),t.length&&t.hasClass("active"))return t.removeClass("active"),!1;o.ajax({url:shopEngineComparison.resturl+"shopengine-builder/v1/comparison/comparison_bar_data",method:"GET",data:{},dataType:"html",beforeSend:function(){n.prepend('<i class="eicon-loading fa-spin"></i>')},success:function(e){e=JSON.parse(e),o("#shopengine-comparison-bottom-content").html(e),t.addClass("active"),o(e).filter("h1.shopengine-no-comparison-product-for-bar").length?t.addClass("no-comparison-found"):t.removeClass("no-comparison-found"),n.find(".eicon-loading").replaceWith('<i class="eicon-close"></i>')}})})),o(".comparison-endpoint-bottom").on("click",(function(e){e.preventDefault();let n=[],t=o(this).attr("data-comparison-url"),i=o(".shopengine-comparison-box");i.length&&(i.find(".comparison-for-bottom-bar-item").each((function(e,t){let i=o(t).find("a").attr("data-pid");n[e]=i})),window.location.href=t+"?product_ids="+n.join(","))})),o(window).on("shopengineComparisonProductAdded shopengineComparisonProductRemoved",(function(e,n){o(".shopengine-comparison-counter").text(a());let t=o(".shopengine-comparison-bottom-bar");a()?t.removeAttr("hidden").removeClass("no-comparison-found"):t.attr("hidden","hidden").removeClass("active").addClass("no-comparison-found"),i().length?o("ul.products > li .shopengine-comparison[data-payload]").each((function(){let e=JSON.parse(o(this).attr("data-payload"));-1===o.inArray(e.pid,i())&&o(this).removeClass("active")})):o("ul.products > li .shopengine-comparison[data-payload]").removeClass("active")})),o(document).on("click touchstart",".copy-comparison-share-url",(function(e){e.preventDefault();let n=o(this),t=n.attr("data-share-url"),i=n.attr("data-message"),a=n.find("span"),s=a.clone();navigator.clipboard.writeText(t),a.html(i),setTimeout((function(){a.html(s.html())}),3e3)}))}))
;