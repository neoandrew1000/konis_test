<div class="wrap" id="center-panel">
<h2>Редактирование отзыва</h2>

 <form action="admin.php?page=edit-reviews&action=submit" method="POST">
  <table class="input-table" style="width:100%; margin:0 auto;">
   <tr>
    <td>
	 <dl>
	  <dt><label for="review_user_name">Имя пользователя:</label></dt>
	  <dd><input type="text" name="review_user_name" id="review_user_name" value="<?php echo $this->data['review']['review_user_name'] ?>" /></dd>
	 </dl>
	</td>
	<td style="width:50%;">
	 <dl>
	  <dt><label for="review_user_email">Email пользователя:</label></dt>
	  <dd><input type="text" name="review_user_email" id="review_user_email" value="<?php echo $this->data['review']['review_user_email'] ?>" /></dd>
	 </dl>
	</td>
   </tr>
   <tr>
   <td colspan="2">
	
	<dl>
	 <dt><label for="review_text">Текст отзыва:</label></dt>
	 <dd><textarea name="review_text" id="review_text" rows="10" cols="50"><?php echo $this->data['review']['review_text'] ?></textarea></dd>
	</dl>
   </td>
   </tr>
   <tr>
    <td colspan="2">
      <input type="radio" <?=($this->data['review']['review_status']==1)?'checked="checked"':''?> id="stat1" name="review_status" value="1" />
      <label for="stat1">Одобрено</label><br />
      <input type="radio" <?=($this->data['review']['review_status']==0)?'checked="checked"':''?> id="stat2" name="review_status" value="0" />
      <label for="stat2">Отклонено</label>
    </td>
   </tr>
  </table>
  <div style="text-align:center">
    <input type="hidden" name="id" value="<?php echo $this->data['review']['ID'] ?>" />
	<input type="submit" class="button" name="send" value="Изменить отзыв" />
  </div>
 </form>
</div> <!-- /#center-panel -->
