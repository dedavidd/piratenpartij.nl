timely.define(["jquery_timely","ai1ec_config","libs/utils"],function(e,t,n){var r=function(){e("#ai1ec_input_coordinates:checked").length>0&&e("#ai1ec_table_coordinates input.coordinates").each(function(){this.value=n.convert_comma_to_dot(this.value)})},i=function(t,n){var r=e("<div />",{text:n,"class":"ai1ec-error"});e(t).after(r)},s=function(t,n){t.target.id==="post"&&(t.stopImmediatePropagation(),t.preventDefault(),e("#publish").removeClass("button-primary-disabled"),e("#publish").siblings(".spinner").css("visibility","hidden")),e(n).focus()},o=function(){var t=n.field_has_value("ai1ec_address"),r=!0;return e(".coordinates").each(function(){var e=n.field_has_value(this.id);e||(r=!1)}),t||r},u=function(n){var r=!0,o=!1;return e("#ai1ec_input_coordinates:checked").length>0&&(e("div.ai1ec-error").remove(),e("#ai1ec_table_coordinates input.coordinates").each(function(){var n=e(this).hasClass("latitude"),s=n?t.error_message_not_entered_lat:t.error_message_not_entered_long;this.value===""&&(r=!1,o===!1&&(o=this),i(this,s))})),r===!1&&s(n,o),r},a=function(r){if(e("#ai1ec_input_coordinates:checked").length===1){e("div.ai1ec-error").remove();var o=!0,u=!1,a=!1;return e("#ai1ec_table_coordinates input.coordinates").each(function(){if(this.value===""){a=!0;return}var r=e(this).hasClass("latitude"),s=r?t.error_message_not_valid_lat:t.error_message_not_valid_long;n.is_valid_coordinate(this.value,r)||(o=!1,u===!1&&(u=this),i(this,s))}),o===!1&&s(r,u),a===!0&&(o=!1),o}};return{ai1ec_convert_commas_to_dots_for_coordinates:r,ai1ec_show_error_message_after_element:i,check_if_address_or_coordinates_are_set:o,ai1ec_check_lat_long_fields_filled_when_publishing_event:u,ai1ec_check_lat_long_ok_for_search:a}});