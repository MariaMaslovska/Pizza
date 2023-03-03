import"./../css/admin.scss";var Insights=require("./components/insights/insights.js");import FaqGroups from"./components/faq/faq_groups.js";var StyleSettings=require("./settings/styles.js");import popupModal from"./components/Modal";import FaqGroupSettingsApp from"./svelte/faq-group-settings.svelte";import FAQGroupStore from"./svelte/store.js";var Admin={init:function(){this.nonce=helpie_faq_object.nonce,this.eventhandlers(),Insights.init(),popupModal.init(),StyleSettings.init(),this.initFaqGroupSettingsApp()},eventhandlers:function(){var e=this,t=document.getElementById("helpie_faq_delete");null!==t&&(t.onclick=function(){confirm("Are you sure you want to reset all Insights?")&&e.resetInsights()}),jQuery(".helpie-faq__settings").on("click",".helpie-disabled",(function(){e.showFAQPurchaseModalNotice()})),jQuery(".csf--switcher").on("click",(function(t){return!jQuery(this).closest(".csf-field-switcher").hasClass("helpie-disabled")||(t.stopImmediatePropagation(),e.showFAQPurchaseModalNotice(),!1)})),this.updateSubmenuLinks(),this.noticeEvents()},updateSubmenuLinks:function(){let e=jQuery("#menu-posts-helpie_faq").find('a[href="edit.php?post_type=helpie_faq&page=helpie-docs-page"]');e.attr("href","https://helpiewp.com/helpie-docs/"),e.attr("target","_blank")},noticeEvents:function(){jQuery(".helpiefaq-notice__featureLinkButton").on("click",(function(e){let t=jQuery(this).closest(".helpiefaq-notice--feature");jQuery.post(helpie_faq_object.ajax_url,{action:"update_feature_notice_dismissal_data_via_ajax",nonce:helpie_faq_object.nonce,dataType:"JSON"},(function(e){"success"==e.status&&t.hide()}))}))},resetInsights:function(){var e={action:"helpie_faq_reset_insights",nonce:this.nonce};jQuery.post(helpie_faq_object.ajax_url,e,(function(e){location.reload()}))},showFAQPurchaseModalNotice:function(){popupModal.load()},getStore:e=>new FAQGroupStore(e),getPropsForSvelte(){const e=window.helpie_faq,t=e.faq_group.page_action;let i={products:e.faq_group.products,tagID:e.faq_group.tag_ID,settings:e.faq_group.settings,pageAction:t,productCategories:e.faq_group.product_categories,post_types:e.faq_group.post_types,faq_group_edit_url:e.faq_group_edit_url};return i.store=this.faq_group_store,i},isFAQGroupEditPage:function(){let e=!1;return 1==jQuery("#svelte-faqs-group-settings").length&&(e=!0),e},initFaqGroupSettingsApp:function(){if(FaqGroups.init(),!this.isFAQGroupEditPage())return;let e=this.getPropsForSvelte();this.faq_group_store=this.getStore(e),FaqGroups.initStore(this.faq_group_store);let t=document.getElementById("svelte-faqs-group-settings");const i=window.helpie_faq;if(!t||void 0===i)return;e=this.getPropsForSvelte(),jQuery("#svelte-faqs-group-settings").remove();const s="create"==e.pageAction?jQuery("#addtag"):jQuery("#edittag");s.wrapAll("<div class='helpiefaq__groupContainer'></div>"),jQuery("<div id='svelte-faqs-group-settings'></div>").insertBefore(s),t=document.getElementById("svelte-faqs-group-settings"),new FaqGroupSettingsApp({target:t,props:e})}};jQuery(document).ready((function(){Admin.init()}));