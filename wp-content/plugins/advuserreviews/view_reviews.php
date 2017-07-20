<div class="wrap">
<h2>Управление отзывами на сайте</h2>

<div id="center-panel" style="width: 95%; margin: 3px auto 3px auto;">
	 <table class="widefat">
	 
	  <thead>
	    <tr class="table-header">
		 <th>Пользователь</th>
		 <th>Текст отзыва</th>
		 <th>Дата</th>
         <th>Статус</th>
		 <th>Действия</th>
		</tr>
	  </thead>
	  
	  <tbody>
	   <?php if (count($this->data['reviews']) > 0): ?>
	   <?php foreach ($this->data['reviews'] as $key => $record): ?>
		<tr>
		 <td class="name">  
		   <div><strong><?php echo $record['review_user_name'] ?></strong></div>
		 </td>
		 <td class="text">
		  <div><?php echo $record['review_text'] ?></div>
		 </td>
		 <td class="date"><?php echo $record['review_date'] ?></td>
         <td class="status" style="color:#f00"><?= ($record['review_status']==0)?'Отклонено':'' ?></td>
		 <td class="actions">
		  <div><a href="admin.php?page=edit-reviews&action=edit&id=<?php echo $record['ID']; ?>">Изменить</a></div>
		  <div><a onclick="return deleteService(); " href="admin.php?page=edit-reviews&action=delete&id=<?php echo $record['ID'];?>">Удалить</a></div>
		 </td>
		</tr>
	   <?php endforeach; ?>
	   
	   <?php else:?>
	    <tr>
		 <td colspan="4" style="text-align:center">Отзывов нет</td>
		</tr>
	   <?php endif;?>
	  </tbody>

	 </table> 
</div> <!-- /#center-panel -->
</div>

