<<<<<<< HEAD
timely.define(["jquery_timely","domReady","ai1ec_config","libs/utils","scripts/setting/cache/cache_event_handlers","external_libs/bootstrap/button","libs/collapse_helper","external_libs/bootstrap/tab","external_libs/bootstrap/dropdown","external_libs/bootstrap_datepicker","external_libs/bootstrap/tooltip","external_libs/jquery_cookie"],function(e,t,n,r,i){var s=function(){var t=!0;e("#ai1ec-plugins-settings input:text").each(function(){this.value!==""&&(t=!1)}),t===!0&&e("#ai1ec-plugins-settings").remove()},o=function(t){var n=e(this).attr("href");e.cookie("ai1ec_general_settings_active_tab",n)},u=function(){var t=e("#week_view_starts_at"),r=e("#week_view_ends_at"),i=parseInt(t.val(),10),s=parseInt(r.val(),10);if(s<i)return window.alert(n.end_must_be_after_start),r.focus(),!1;var o=s-i;if(o<6)return window.alert(n.show_at_least_six_hours),r.focus(),!1},a=function(){e(".ai1ec-gzip-causes-js-failure").remove()},f=function(){e("#ai1ec_save_settings").on("click",function(t){var r=e("#require_disclaimer").is(":checked"),i=e("#disclaimer").val();!0===r&&""===i&&(alert(n.require_desclaimer),e('#ai1ec-general-settings ul.ai1ec-nav a[href="#ai1ec-advanced"]').tab("show"),e("#disclaimer").focus(),t.preventDefault())})},l=function(){t(function(){f(),a(),r.activate_saved_tab_on_page_load(e.cookie("ai1ec_general_settings_active_tab")),e(document).on("click",'#ai1ec-general-settings .ai1ec-nav a[data-toggle="ai1ec-tab"]',o),e(document).on("click","#disable_standard_filter_menu_toggler",function(e){e.preventDefault()}),e(document).on("click","#ai1ec-button-refresh",i.perform_rescan);var t=e("#exact_date");t.datepicker({autoclose:!0}),s(),e(document).on("click",".ai1ec-admin-view-settings .ai1ec-toggle-view",function(){var t=e(this),n=t.closest("tr"),r=e(".ai1ec-admin-view-settings .ai1ec-toggle-view:checked").length===0,i=n.find(".ai1ec-toggle-default-view:checked").length===1;if(r===!0||i===!0)return!1}),e(document).on("click",".ai1ec-admin-view-settings .ai1ec-toggle-default-view",function(){e(this).closest("tr").find(".ai1ec-toggle-view:first").prop("checked",!0)}),e("#ai1ec_save_settings").on("click",u),e("#show_create_event_button").trigger("ready")})};return{start:l}});
=======
timely.define(["jquery_timely","domReady","ai1ec_config","libs/utils","scripts/setting/cache/cache_event_handlers","external_libs/bootstrap/button","libs/collapse_helper","external_libs/bootstrap/tab","external_libs/bootstrap/dropdown","external_libs/bootstrap_datepicker","external_libs/bootstrap/tooltip","external_libs/jquery_cookie"],function(e,t,n,r,i){var s=function(){var t=!0;e("#ai1ec-plugins-settings input:text").each(function(){this.value!==""&&(t=!1)}),t===!0&&e("#ai1ec-plugins-settings").remove()},o=function(t){var n=e(this).attr("href");e.cookie("ai1ec_general_settings_active_tab",n)},u=function(){var t=e("#week_view_starts_at"),r=e("#week_view_ends_at"),i=parseInt(t.val(),10),s=parseInt(r.val(),10);if(s<i)return window.alert(n.end_must_be_after_start),r.focus(),!1;var o=s-i;if(o<6)return window.alert(n.show_at_least_six_hours),r.focus(),!1},a=function(){e(".ai1ec-gzip-causes-js-failure").remove()},f=function(){e("#ai1ec_save_settings").on("click",function(t){var r=e("#require_disclaimer").is(":checked"),i=e("#disclaimer").val();!0===r&&""===i&&(alert(n.require_desclaimer),e('#ai1ec-general-settings ul.ai1ec-nav a[href="#ai1ec-advanced"]').tab("show"),e("#disclaimer").focus(),t.preventDefault())})},l=function(){t(function(){f(),a(),r.activate_saved_tab_on_page_load(e.cookie("ai1ec_general_settings_active_tab")),e(document).on("click",'#ai1ec-general-settings .ai1ec-nav a[data-toggle="ai1ec-tab"]',o),e(document).on("click","#disable_standard_filter_menu_toggler",function(e){e.preventDefault()}),e(document).on("click","#ai1ec-button-refresh",i.perform_rescan);var t=e("#exact_date");t.datepicker({autoclose:!0}),s(),e(document).on("click",".ai1ec-admin-view-settings .ai1ec-toggle-view",function(){var t=e(this),n=t.closest("tr"),r=e(".ai1ec-admin-view-settings .ai1ec-toggle-view:checked").length===0,i=n.find(".ai1ec-toggle-default-view:checked").length===1;if(r===!0||i===!0)return!1}),e(document).on("click",".ai1ec-admin-view-settings .ai1ec-toggle-default-view",function(){e(this).closest("tr").find(".ai1ec-toggle-view:first").prop("checked",!0)}),e(document).on("click",".ai1ec-autoselect",function(t){if(e(this).data("clicked")&&t.originalEvent.detail<2)return;e(this).data("clicked",!0);var n;document.body.createTextRange?(n=document.body.createTextRange(),n.moveToElementText(this),n.select()):window.getSelection&&(selection=window.getSelection(),n=document.createRange(),n.selectNodeContents(this),selection.removeAllRanges(),selection.addRange(n))}),e("#ai1ec_save_settings").on("click",u),e("#show_create_event_button").trigger("ready")})};return{start:l}});
>>>>>>> 9efb4dcb7bab652eca0d348558c1d99ac49cc27f
