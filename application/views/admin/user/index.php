<section>
	<h2>Users</h2>
	<?php echo anchor('admin/user/edit', '<i class="icon-plus">Добавить пользователя</i>'); ?>

	<table class="table table-striped">
		<thead>
			<tr>
				<th>Имя</th>
				<th>Email</th>
				<th>Редактировать</th>
				<th>Удалить</th>
			</tr>
		</thead>
		<tbody>
				<?php if (count($users)): foreach ($users as $user): ?>
						

					<tr>
						<td><?php echo anchor('admin/user/edit/' . $user->id, $user->name); ?></td>
						<td><?php echo anchor('admin/user/edit/' . $user->id, $user->email); ?></td>
						<td><?php echo '<div style="vertical-align: text-top;">' . btn_edit('admin/user/edit/'. $user->id) . '</div>';?></td>
						<td><?php echo btn_delete('admin/user/delete/' . $user->id); ?></td>
						
					</tr>
<?php endforeach; ?>
				<?php else: ?>

					<tr>
						<td colspan="3">Пользователей не найдено!!</td>
					</tr>
						
				<?php endif; ?>	
					
			
		</tbody>
	</table>
</section>