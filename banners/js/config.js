var jQ = jQuery.noConflict();
jQ(document).ready(	
    function() {
        jQ(".container").wtRotator({
            width:495, height:185, button_width:24, button_height:24, button_margin:5, auto_start:true, delay:6500, play_once:false, transition:"fade",
            transition_speed:800, auto_center:true, easing:"", cpanel_position:"inside", cpanel_align:"BR", timer_align:"top", display_thumbs:true,
            display_dbuttons:true, display_playbutton:true, display_numbers:true, display_timer:true, mouseover_pause:true, cpanel_mouseover:false,
            text_mouseover:false, text_effect:"fade", text_sync:true, tooltip_type:"image", lock_tooltip:true, shuffle:false, block_size:75,
            vert_size:55, horz_size:50, block_delay:25, vstripe_delay:75, hstripe_delay:180			
    });
});
