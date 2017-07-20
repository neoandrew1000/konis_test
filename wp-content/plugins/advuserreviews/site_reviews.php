<div class="clear" style="margin-bottom:90px"></div>
<div class="otzuv_page form_block">
  <form action="/otzyivyi/" method="post" class="ajax">
    <p>Оставить отзыв</p>
    
    <div class="inpdiv inp1">
      <label for="review_user_name">Ваше имя</label>
      <input type="text" name="review_user_name" id="review_user_name">
    </div>
    
    <div class="inpdiv">
      <label for="review_user_email">Ваш телефон</label>
      <input type="text" name="review_user_email" id="review_user_email" placeholder="+7 (___) ___-__-__">
    </div>
    
    <label for="review_text">Ваш отзыв</label>
    <textarea name="review_text" id="review_text"></textarea>
    <input type="submit" class="inpsubm"  value="Оставить отзыв">
    <input type="hidden" name="action" value="add-review">
  </form>
</div>

<?php 
$i=1;
foreach ($this->data['reviews'] as $key => $record){ ?>

      <div class="otzuv_page <?if($i==1){echo'otz_left';$i++;}else{echo'otz_right';$i--;}?>">
          <div class="data_rev">
              <img src="/wp-content/plugins/advuserreviews/1.jpg">
              <span class="name_otz"><?php echo $record['review_user_name'] ?></span>
              <p class="text_rev_page"><?php echo $record['review_text'] ?></p>
              <div class="clear"></div>
          </div>
      </div>
    
<?php } ?>
<div class="clear"></div>
<?php if($this->data['rev_count'] > 1) { ?>
  <div class="navigation">
  <?php if($this->data['page'] > 1) { ?> <a class="page-numbers prev" href="/otzyivyi/?pr=<?=$this->data['page']-1?>"><</a> <?php } ?>
  <?php for($i=1; $i<=$this->data['rev_count']; $i++){ ?>
    <a class="page-numbers <?=($this->data['page'] == $i)? 'current' : '' ?>" href="/otzyivyi/?pr=<?=$i?>"><?=$i?></a>
    
  <?php } ?>
  <?php if($this->data['page'] < $i-1) { ?> <a class="page-numbers next" href="/otzyivyi/?pr=<?=$this->data['page']+1?>">></a> <?php } ?>
  </div>
<?php } ?>