<?php 
    $bg_primary = '#98dffe';
    $bg_secondary = '#28a745';
?>
<style>
    :root {
        --primary-color: {{$bg_primary}};
        --secondary-color: {{$bg_secondary}};
    }
    .slider-arrow .slider-btn:hover{
        background: var(--primary-color) !important;
    }
    /* .btn, .button{
        background: var(--primary-color) !important;
        color: #000000 !important;
    } */
</style>