<?php include 'config.php';?>
<?php include 'header.php';?>
<div class="container">
<div class="row">
<div class="col-lg-8 col-12" id="idx">
<div id="loading-image">
<img class="loading_images" src="jy-adm/uploads/ajax-loader.gif" />
</div>
<div id="main_content">
<script type="text/javascript">
$(function() {
$("#search").bind('submit',function() {
  $('#main_content').hide();
  $("#loading-image").show();
  var value1 = $('#q').val();
   $.post('/cari/cari_index.php',{keywordc:value1}, function(data){
   $("#main_content").html(data);
   $("#loading-image").hide();
   $('#main_content').fadeIn("slow");
   });
   return false;
});
});
</script>
<div class="Search_form border_index">
<form id='search' name="search" style="margin: 0;" action="">
<div class="row row_index">
<div class="filter-query-form-group col-md-10 col-12">
<input class='form-control filter-query-form-control-eps text-center' TYPE='text' id='q' name='q' placeholder='Cari (Contoh: Doctor 01 atau Doctor)' />
</div>
<div class="filter-submit-form-group col-md-2 col-12">
<button type='submit' id='search_now' class='btn btn-light filter-refresh-form-control' style="width: 100%"><i class="fas fa-search"></i></button>
</div>
</div>
</form>
</div>
<div class="row popular_row" id="load_data_table">
<?php foreach ($dramas as $drama) : ?>
<div class="col-md-3 col-12 text-center popular_column">
<div class="popular_this_week_2" style="margin-bottom: 10px;">
<a href="https://anikyou.com/<?php echo slugify($drama->title); ?>-eps-<?php echo $drama->total_episode; ?>-sub-indo/<?php echo $drama->id; ?>">
<img src="<?php echo $drama->poster; ?>" width="100%" height="250px" alt="<?php echo $drama->title; ?> Subtitle Indonesia">
<div class="latest_category_dlm_cat"><?php echo $drama->type; ?></div>
<div class="status_dlm_cat"><?php echo $drama->status; ?></div>
<div class="latest_episodes_dlm_cat">8.76</div>
<div class="topcontenttitle text-center">
<h6 class="popular_this_week_items"><?php echo $drama->title; ?></h6>
<div class="hoverother">
<span class="popular_this_week_kualitas">Stream</span>
<span class="popular_this_week_kualitas">Indonesia</span>
</div>
</div>
</a>
</div>
</div>
<?php endforeach ?>

<div id="remove_row" class="col-12 popular_column">
<button data-vid="651" id="btn_more_data" class="show_more_button_in_view_1 btn">Lihat Lagi ▼</button>
</div>
</div>
<script>  
  $(document).ready(function(){  
    $(document).on('click', '#btn_more_data', function(){  
       var last_ep_id = $(this).data("vid");  
       $('#btn_more_data').html("Loading...").prop("disabled", true);
       $.ajax({  
          url:"/load_more/index.php",  
          method:"POST",  
          data:{last_ep_id:last_ep_id},  
          dataType:"text",
          success:function(data)  
          {  
             if(data != '')  
             {  
                $('#remove_row').remove();  
                $('#load_data_table').append(data);
             }  
             else  
             {  
                $('#btn_more_data').html("Sudah Semuanya");  
             }  
          }  
       });  
    });  
  });  
</script> </div>
</div>
<?php include 'sidebar.php';?>
<?php include 'footer.php';?>